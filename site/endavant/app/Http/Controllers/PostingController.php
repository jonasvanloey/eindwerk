<?php

namespace App\Http\Controllers;

use App\Filters\JobFilter;
use App\Http\Controllers\Admin\CRUDController;
use App\Http\Requests\PostingRequest;
use App\posting;
use App\Repositories\ChatgroupRepository;
use App\Repositories\MessageRepository;
use App\Repositories\PortfolioRepository;
use App\Repositories\PostingRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TagRepository;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostingController extends CRUDController
{
    public $repository, $chatgrouprepository, $messagerepository, $postingrepository, $studentRepository, $portfolioRepository, $tagRepository;

    public function __construct(PostingRepository $repository, ChatgroupRepository $chatgroupRepository, MessageRepository $messagerepository, StudentRepository $studentRepository, PortfolioRepository $portfolioRepository, TagRepository $tagRepository)
    {
        $this->repository = $repository;
        $this->chatgrouprepository = $chatgroupRepository;
        $this->messagerepository = $messagerepository;
        $this->studentRepository = $studentRepository;
        $this->chatgrouprepository = $chatgroupRepository;
        $this->portfolioRepository = $portfolioRepository;
        $this->tagRepository = $tagRepository;
        $this->viewFolder = 'postings';
        $this->NameOfRoute = 'jobs';
        $this->formRequest = new PostingRequest;
    }

    public function postingIndex(Request $request)
    {
        $title = null;
        $tags = null;
        $zip_code = null;
        $distance = null;
        if ($request->has('title')) {
            if ($request['title'] !== null) {
                $title = $request['title'];
            }
        }
        if ($request->has('tags')) {
            if ($request['tags'] !== null) {
                $tags = $request['tags'];
            }
        }
        if ($request->has('zip-code')) {
            if ($request['zip-code'] !== null) {
                $zip_code = $request['zip-code'];
                $distance = $request['afstand'];
            }
        }

        $data['items'] = $this->repository->findJobs($title, $tags, $zip_code, $distance)->paginate(12);
        $data['favs'] = $this->repository->getfavs();
        $data['tags'] = $this->tagRepository->all();

        return view($this->viewFolder . '.index', $data);
    }

    public function show($id)
    {
        $data['item'] = $this->repository->find($id);
        if ($data['item']->student_id !== null) {
            $student = $this->studentRepository->findWhere(['user_id' => Auth::user()->id]);
            if ($data['item']->student_id === $student[0]->id) {
                Mapper::map($data['item']['company']['latitude'], $data['item']['company']['longtitude'], ['zoom' => 15, 'markers' => ['animation' => 'DROP'], 'mapTypeControl' => false, 'streetViewControl' => false]);
                return view($this->viewFolder . '.detail', $data);
            } else {
                return redirect('jobs');
            }
        } else {
            Mapper::map($data['item']['company']['latitude'], $data['item']['company']['longtitude'], ['zoom' => 15, 'markers' => ['animation' => 'DROP'], 'mapTypeControl' => false, 'streetViewControl' => false]);
            return view($this->viewFolder . '.detail', $data);
        }
    }

    public function showapply($id)
    {
        $data['item'] = $this->repository->find($id);
        if ($data['item']->student_id !== null) {
            return redirect('jobs');

        }

        return view($this->viewFolder . '.apply', $data);
    }

    public function storeapply($id, Request $request)
    {
        $chatgroup = $this->chatgrouprepository->findChatgroup($id);
        if ($chatgroup->isEmpty()) {
            $group = $this->chatgrouprepository->create([
                'posting_id' => $id
            ]);
            $group->users()->attach(Auth::user()->id);
            $group->users()->attach($this->repository->find($id)->company->users()->first()->id);

            $this->messagerepository->sendMessage($request['message'], $group->id);

            return redirect('/inbox');

        } else {
            return redirect('/inbox');
        }
    }

    public function create()
    {
        $data['tags'] = $this->tagRepository->all();
        return view($this->viewFolder . '.create', $data);
    }

    public function edit($id)
    {
        $data['item'] = $this->repository->find($id);
        if (Auth::check() && Auth::user()->hasRole('company')) {
            if ($data['item']->company->users->pluck('id')->contains(Auth::user()->id)) {
                $data['tags'] = $this->tagRepository->all();

                return view($this->viewFolder . '.edit', $data);
            }
        }
        return redirect('jobs');

    }


    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());
        $item = $this->repository->create([
            'title' => $request['title'],
            'reason' => $request['reason'],
            'description' => $request['description'],
            'company_id' => $this->repository->getCompanyId(),
            'postingtype_id' => 1

        ]);
        foreach ($request['tags'] as $tag) {
            $item->tags()->attach($tag);
        }

        return redirect()->route($this->NameOfRoute . '.show', $item->id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->getRules());
        $model = $this->repository->find($id);
        $this->repository->update($model, [
            'title' => $request['title'],
            'reason' => $request['reason'],
            'description' => $request['description'],
            'company_id' => $this->repository->getCompanyId(),
            'postingtype_id' => 1

        ]);
        $item = $this->repository->find($id);
        $item->tags()->sync([]);
        if (isset($request['tags'])) {
            foreach ($request['tags'] as $tag) {
                $item->tags()->attach($tag);
            }
        }
        return redirect()->route('jobs.show', $item->id);
    }

    public function givetouser($id, $user_id)
    {
        $chatgroup = $this->chatgrouprepository->find($id);
        $chatgroupids = $chatgroup->users->pluck('id');
        if ($chatgroupids->contains(Auth::user()->id)) {
            $posting = $this->repository->find($chatgroup->posting_id);
            if ($posting->student_id === null) {
                $groups = $posting->chatgroups;
                $student = $this->studentRepository->findWhere(['user_id' => $user_id])->first();
                foreach ($groups as $group) {
                    if ($group->id === intval($id)) {
                        $message = "Het project is aan jou toegewezen. ";
                        $this->messagerepository->sendMessage($message, $group->id);
                        $this->repository->update($posting, ['student_id' => $student->id]);

                    } else {

                        $message = "Het spijt ons om het je te moeten melden maar we hebben voor iemand anders gekozen om ons project af te werken. We hopen nog met jou te kunnen werken in de toekomst.";
                        $this->messagerepository->sendMessage($message, $group->id);
                        $this->chatgrouprepository->update($this->chatgrouprepository->find($group->id), ['is_active' => 0]);
                    }
                }
                return redirect()->route('showmessage', $id);
            } else {
                return redirect('inbox');
            }

        } else {
            return redirect('inbox');
        }

    }

    public function roundup($id, $posting_id)
    {
        $chatgroup = $this->chatgrouprepository->find($id);
        $chatgroupids = $chatgroup->users->pluck('id');
        if ($chatgroupids->contains(Auth::user()->id)) {
            $message = "Het project is afgelopen.";
            $this->messagerepository->sendMessage($message, $chatgroup->id);
            $this->repository->update($chatgroup, ['is_active' => 0]);
            $posting = $this->repository->find($posting_id);
            $this->portfolioRepository->create([
                'student_id' => $posting->student_id,
                'posting_id' => $posting_id
            ]);
            $this->repository->update($posting, ['is_finished' => 1]);

            return redirect()->route('giveRating', [$posting_id, $posting->student_id]);
        }

    }

    public function destroy($id)
    {
        $data['item'] = $this->repository->find($id);
        if (Auth::check() && Auth::user()->hasRole('company')) {
            if ($data['item']->company->users->pluck('id')->contains(Auth::user()->id)) {
                $this->repository->delete($id);
            }
        }

        return redirect('/jobs');
    }

}

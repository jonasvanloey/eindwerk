<?php
namespace App\Repositories;


use App\company;
use App\favorite;
use App\posting;
use App\student;
use Illuminate\Support\Facades\Auth;
use Spatie\Geocoder\Facades\Geocoder;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class PostingRepository extends AbstractRepository
{
    protected $model = posting::class;


    public function getfavs()
    {
        if (Auth::user()) {
            return favorite::where('student_id', Auth::user()->id)->get()->pluck('posting_id');
        } else {
            return null;
        }

    }

    public function getCompanyId()
    {
        $company_id = company::whereHas('users', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->first();
        return $company_id->id;
    }

    public function findJobs($title, $tags, $zip_code, $distance)
    {
        $query = posting::query();
        if ($tags) {
            $query->join('posting_tags', 'posting_tags.posting_id', '=', 'postings.id')
                ->where(function ($q) use ($tags) {
                    foreach ($tags as $tag) {
                        $q->orWhere('posting_tags.tag_id', '=', $tag);
                    }
                });

        }
        if ($title) {

            $query->where('title', 'LIKE', '%' . $title . '%');
        }
        if ($zip_code) {
            $afterGeo = Geocoder::getCoordinatesForAddress($zip_code);
            if ($distance !== "50+") {
                $query->join('companies', 'companies.id', '=', 'postings.company_id')
                    ->where('companies.latitude', '<', $afterGeo['lat'] + ($distance * 0.012))
                    ->where('companies.latitude', '>', $afterGeo['lat'] - ($distance * 0.012))
                    ->where('companies.longtitude', '>', $afterGeo['lng'] - ($distance * 0.012))
                    ->where('companies.longtitude', '<', $afterGeo['lng'] + ($distance * 0.012));
            }


        }

        return $query->where('student_id', null);
    }
    //TODO delete favorites if posting is deleted

}
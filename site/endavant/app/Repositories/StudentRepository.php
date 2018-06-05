<?php


namespace App\Repositories;


use App\student;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class StudentRepository extends AbstractRepository
{
    protected $model = student::class;

    public function getUserInfo($id)
    {
        $item = student::where('user_id',$id)->with('user')->first();

        return $item;
    }
}
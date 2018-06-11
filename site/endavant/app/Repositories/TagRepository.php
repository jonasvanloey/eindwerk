<?php


namespace App\Repositories;


use App\tag;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class TagRepository extends AbstractRepository
{
    protected $model = tag::class;

}
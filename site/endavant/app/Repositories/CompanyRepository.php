<?php

namespace App\Repositories;

use App\posting;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\company::class;

    public function findPostings($id){
        return posting::where('company_id',$id);
    }
}
<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class CompanyRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\company::class;

}
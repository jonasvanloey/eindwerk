<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class RatingRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\rating::class;

}
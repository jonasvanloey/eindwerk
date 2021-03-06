<?php

namespace App\Repositories;

use Torann\LaravelRepository\Repositories\AbstractRepository;

class UserRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\User::class;

}
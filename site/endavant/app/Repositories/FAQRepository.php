<?php

namespace App\Repositories;

use App\question;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class FAQRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = \App\question::class;

    public function findFAQ($question){
        return  question::where('question', 'LIKE', '%' . $question->question . '%')->get();
    }

}
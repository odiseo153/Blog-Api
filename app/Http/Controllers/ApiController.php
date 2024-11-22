<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;

class ApiController extends Controller
{
    use ApiResponse;

    protected $policyClass;


    /*
    public function isAble($ability, $targetModel)
    {
        return $this->authorize($ability, [$targetModel, $this->policyClass]);
    }
    */
}

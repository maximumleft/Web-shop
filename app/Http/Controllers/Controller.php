<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }
}

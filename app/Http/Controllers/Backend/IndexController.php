<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return inertia('Index/Index');
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}

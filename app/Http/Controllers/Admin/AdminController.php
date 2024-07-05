<?php

namespace App\Http\Controllers\Admin;

class AdminController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('admin/index');
    }

}
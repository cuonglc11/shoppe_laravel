<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $data = [];

    public function index()
    {
        $this->data['title'] = "Home";
        $this->data['post'] = "Dashboard";

        return view("backend.index", $this->data);
    }
}

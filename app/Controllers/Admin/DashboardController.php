<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $title = "Dashboard";
        $top_title = "Dashboard";
        
        return view('admin/dashboard', compact('title','top_title'));
    }
}

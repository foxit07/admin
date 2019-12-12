<?php


namespace Foxit07\Admin\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        return view('admin::dashboard.index');
    }
}
<?php

namespace App\Http\Controllers;

use domain\Facades\HomeFacades;
use domain\Facades\ItemFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $items = HomeFacades::all();
        return view("Pages.home.index", compact('items'));
    }
    public function all()
    {
        return HomeFacades::all();
    }
}

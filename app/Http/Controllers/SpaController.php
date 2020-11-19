<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    public function index() {
        return response(view('spa-index'))->header('Cache-Control', 'no-cache, must-revalidate');
    }
}

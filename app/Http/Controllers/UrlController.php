<?php


namespace App\Http\Controllers;


use App\Url;

class UrlController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $urls = Url::paginate(30);
        return view('index', compact('urls'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function create()
    {
        $url = new Url();

        $urls = Url::paginate(20);

        return view('create', compact('url', 'urls'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|url',
        ]);
        $url = Url::findOrCreateByUrl($request->url);
        $url->save();

        $urls = Url::paginate(20);

        return view('create', compact('url', 'urls'));
    }

    public function redirect($token)
    {
        if (!$url = Url::findModelByToken($token)) {
            return redirect()->route('create');
        }

        $url->addVisit();
        return redirect()->away($url->url);
    }
}

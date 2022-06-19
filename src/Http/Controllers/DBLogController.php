<?php

namespace AkshitArora\DebugTools\Http\Controllers;

use Illuminate\Http\Client\Request;

class DBLogController extends Controller
{
    public function index()
    {
        return view('debugtools::dblogs.index');
    }

    public function enable()
    {
        request()->validate([
            'enable' => 'required|boolean',
        ]);

        if(request()->enable) {
            config()->set('debugtools.log_queries', true);
        }

        return ['enable' => config('debugtools.log_queries')];
    }
}

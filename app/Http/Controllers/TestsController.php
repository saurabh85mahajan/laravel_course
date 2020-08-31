<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestsController extends Controller
{
    //
    public function one()
    {
        return view('tests.one', [
            'foo' => 'bar1',
            'haystack' => 'needle'
        ]);
    }

    public function two()
    {
        return view('tests.two', [
            'foo' => 'bar2',
        ]);
    }
}

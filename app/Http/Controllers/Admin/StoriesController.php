<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Story;

class StoriesController extends Controller
{
    //
    public function index()
    {
        //
        $stories = Story::onlyTrashed()
            ->with('user')
            ->orderBy('id', 'DESC')
            ->paginate(10);
        return view('admin.stories.index', [
            'stories' => $stories
        ]);
    }
}

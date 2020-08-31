<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Story;

class StoriesController extends Controller
{
    //
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(3);
        return view('stories.index', [
            'stories' => $stories
        ]);
    }
}

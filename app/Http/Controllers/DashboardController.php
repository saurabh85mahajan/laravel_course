<?php

namespace App\Http\Controllers;

use App\Models\Story;

class DashboardController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = Story::active();

        $type = request()->input('type');
        if (in_array($type, ['short', 'long'])) {
            $query->where('type', $type);
        }

        $stories = $query->with(['user', 'tags'])
            ->orderBy('id', 'DESC')
            ->paginate(9);
        return view('dashboard.index', [
            'stories' => $stories
        ]);
    }

    public function show(Story $activeStory)
    {
        //
        return view('dashboard.show', [
            'story' => $activeStory
        ]);
    }
}

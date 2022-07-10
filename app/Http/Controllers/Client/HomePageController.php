<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use Inertia\Inertia;

class HomePageController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('search'))
        {
            $search = Episode::where('title', 'like', '%'.$request['search'].'%')
                              ->orWhere('categories', 'like', '%'.$request['search'].'%')
                              ->orWhere('description', 'like', '%'.$request['search'].'%')
                              ->Limit(6)
                              ->get();

            $metaSearch = $request['search'];
        }else
        {
            $search = [];
            $metaSearch = null;
        }
        $bestEpisodes = Episode::query()
                            ->orderBy('evaluation', 'desc')
                            ->limit(6)
                            ->get();

        $actionEpisodes = Episode::where('categories','like', 'action')
                            ->orderBy('evaluation')
                            ->limit(6)
                            ->get();

        $drameEpisodes = Episode::where('categories','like', 'drame')
                            ->orderBy('evaluation')
                            ->limit(6)
                            ->get();

        $bestEpisodes->load([ 'media'])->append(['firstMediaUrl']);
        $actionEpisodes->load([ 'media'])->append(['firstMediaUrl']);
        $drameEpisodes->load([ 'media'])->append(['firstMediaUrl']);


        return view('Client.HomePage', [
            'bestEpisodes' => $bestEpisodes,
            'actionEpisodes' => $actionEpisodes,
            'drameEpisodes' => $drameEpisodes,
            'search' => $search,
            'metaSearch' => $metaSearch
        ]);
    }
}

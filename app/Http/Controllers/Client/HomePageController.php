<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\ContactClient;
use App\Models\Cinema;
use Illuminate\Http\Request;
use App\Models\Episode;
use Illuminate\Support\Facades\Mail;
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

        $comedyEpisodes = Episode::where('categories','like', 'comedy')
                            ->orderBy('evaluation')
                            ->limit(6)
                            ->get();

        $comedyEpisodes->load([ 'media'])->append(['firstMediaUrl']);
        $bestEpisodes->load([ 'media'])->append(['firstMediaUrl']);
        $actionEpisodes->load([ 'media'])->append(['firstMediaUrl']);
        $drameEpisodes->load([ 'media'])->append(['firstMediaUrl']);


        return view('Client.HomePage', [
            'bestEpisodes' => $bestEpisodes,
            'actionEpisodes' => $actionEpisodes,
            'drameEpisodes' => $drameEpisodes,
            'comedyEpisodes' => $comedyEpisodes,
            'search' => $search,
            'metaSearch' => $metaSearch
        ]);
    }

    public function show($id)
    {
        $episode = Episode::findorFail($id);
        $episode->load([ 'media'])->append(['firstMediaUrl']);

        $cinemas = Cinema::whereHas('rooms.offers', function($q) use ($episode){
                return $q->where('episode_id', $episode->id);
        })->get();
        $cinemas->load([ 'media'])->append(['firstMediaUrl']);


        return view('Client.Episode.show',[
            'episode' =>$episode,
            'cinemas' => $cinemas,
        ]);
    }

    public function showCinema($cinema_id, $episode_id)
    {
        $cinema = Cinema::findorFail($cinema_id);
        $episode = Episode::findorFail($episode_id);
        return view('Client.Cinema.show', [
            'cinema' => $cinema,
            'episode' => $episode,
        ]);
    }

    public function contact(Request $request)
    {

        Mail::to($request['email'])->send(new ContactClient($request['fisrt_name'], $request['last-name'], $request['email']));
        return back();
    }
}

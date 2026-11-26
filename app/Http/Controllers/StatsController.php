<?php

namespace App\Http\Controllers;

use App\Models\DeviceStat;
use App\Models\RedirectionStat;
use App\Models\Search;
use Illuminate\Http\Request;
use App\Models\Tracker;

class StatsController extends Controller
{
    public function searchStatics(){
        $searches = Search::query()->orderByDesc('visited_at')->paginate(15);
        return view('stats.searches', compact('searches'));
    }

    public function redirectStatics(){
        $redirects = RedirectionStat::query()->orderByDesc('visited_at')->paginate(15);
        return view('stats.redirects', compact('redirects'));
    }

    public function deviceStatics(){
        $devices = DeviceStat::query()->orderByDesc('visited_at')->paginate(15);
        return view('stats.devices', compact('devices'));
    }


    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');
        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип групування.');
        }
        $rows = Tracker::query()
            ->selectRaw(
                "{$type}, count(*) as hits, max(visited_at) as last_visit"
            )
            ->groupBy($type)
            ->orderByDesc('hits')
            ->get();
        return view('stats.pages', compact('rows', 'type'));
    }

    public function detail(Request $request)
    {
        $type = $request->query('type', 'page');
        $item = $request->query('item');
        if (!in_array($type, ['page', 'ip'], true)) {
            abort(400, 'Невідомий тип фільтрації.');
        }
        $rows = Tracker::query()
            ->when(
                $item,
                fn ($query, $value) =>
                $query->where($type, $value)
            )
            ->orderByDesc('visited_at')
            ->paginate(15)
            ->withQueryString();
        return view(
            'stats.detail',
            compact('rows', 'type', 'item')
        );
    }
}

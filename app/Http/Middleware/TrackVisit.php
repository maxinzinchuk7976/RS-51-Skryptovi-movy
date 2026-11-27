<?php
namespace App\Http\Middleware;
use App\Models\RedirectionStat;
use App\Models\Tracker;
use App\Models\DeviceStat;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        Tracker::create([
            'page' => $request->path(),
            'ip' => $request->ip(),
            'status' => $response->getStatusCode(),
            'visited_at' => now(),
        ]);
        if(!empty($request->userAgent())){
            DeviceStat::upsert(
                [[
                    'ip' => $request->ip(),
                    'agent' => $request->userAgent(),
                    'visited_at' => now(),
                ]],
                ['ip','agent']
            );
        }
        if(!empty($request->query('from'))){
            RedirectionStat::create(
                [
                    'page' => $request->path(),
                    'ip' => $request->ip(),
                    'status' => $response->getStatusCode(),
                    'visited_at' => now(),
                    'token' => $request->query('from')
                ]
            );
        }
        return $response;
    }
}

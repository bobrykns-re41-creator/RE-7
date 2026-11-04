<?php
namespace App\Http\Middleware;
use App\Models\Tracker;
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
            'user_agent' => $request->userAgent() ? substr($request->userAgent(), 0, 255) : null,
            'status' => $response->getStatusCode(),
            'visited_at' => now(),
        ]);
        return $response;
    }
}

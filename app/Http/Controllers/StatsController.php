<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracker;

class StatsController extends Controller
{
    public function pages(Request $request)
    {
        $type = $request->query('type', 'page');
        if (!in_array($type, ['page', 'ip', 'user_agent'], true)) {
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
        if (!in_array($type, ['page', 'ip', 'user_agent'], true)) {
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

    public function popularVinyls()
    {
        // Шукаємо записи, де адреса починається з 'vinyls/' і містить лише цифри (ID)
        $popular = Tracker::query()
            ->where('page', 'regexp', '^vinyls/[0-9]+$')
            ->selectRaw('page, count(*) as hits, count(distinct ip) as unique_visitors, max(visited_at) as last_visit')
            ->groupBy('page')
            ->orderByDesc('hits')
            ->limit(10)
            ->get();

        return view('stats.popular', compact('popular'));
    }
}

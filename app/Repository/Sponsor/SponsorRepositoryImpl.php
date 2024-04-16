<?php

namespace App\Repository\Sponsor;

use App\Models\Sponsor;
use Illuminate\Support\Facades\DB;

class SponsorRepositoryImpl implements SponsorRepository
{
    public function save($data)
    {
        return Sponsor::create($data);
    }

    public function findAll()
    {
        return Sponsor::all();
    }

    public function findById($id)
    {
        return Sponsor::findOrFail($id);
    }

    public function findByEventId($event_id)
    {
        return Sponsor::where('event_id', $event_id)
            ->select('entrepreneur_id', DB::raw('SUM(amount) as total_amount'))
            ->groupBy('entrepreneur_id')
            ->orderBy('total_amount', 'desc')
            ->get();
    }
}
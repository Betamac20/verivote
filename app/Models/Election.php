<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'election_title',
        'department',
        'candidate_role',
        'election_start_date',
        'election_end_date'
    ];

    public function  add_election($add_election) {
        return $this->create($add_election);
    }
}

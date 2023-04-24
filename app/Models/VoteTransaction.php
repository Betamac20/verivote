<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'status',
        'id_number',
        'name',
        'department',
        'election_id',
        'candidate_role',
    ];

    public function  add_vote($add_vote) {
        return $this->create($add_vote);
    }

}

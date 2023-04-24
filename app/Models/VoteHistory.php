<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'name',
        'position',
        'candidate_name',
        'candidate_id_number',
        'election_id',
        'department',
        'candidate_role',
    ];

    public function  add_votehistory($add_votehistory) {
        return $this->create($add_votehistory);
    }
}

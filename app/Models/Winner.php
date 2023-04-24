<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $fillable = [
        'election_id',
        'candidate_id_number',
        'candidate_name',
        'position',
        'department',
        'candidate_role',
    ];

    public function  add_winner($add_winner) {
        return $this->create($add_winner);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position_name',
        'capacity',
        'department',
    ];

    public function  add_position($add_position) {
        return $this->create($add_position);
    }
}

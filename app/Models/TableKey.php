<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'private_key',
        'public_key',

    ];

    public function  add_key($add_key) {
        return $this->create($add_key);
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Candidates extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'id_number',
        'name',
        'department',
        'position',
        'candidate_role',
        'candidate_type',
        'partylist',
        'election_id',
    ];

    public function  store_candidate($store_candidate) {
        return $this->create($store_candidate);
    }



    // public function getCandidateList(){
        
    //     return $this->all()->sortByDesc('updated_at')->forPage(1, 5);
    // }
}

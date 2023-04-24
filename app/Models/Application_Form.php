<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application_Form extends Model
{
    use HasFactory;

    protected $table = 'application_forms';
    protected $fillable = [
        'id_number',
        'id_photo',
        'position',
        'name',
        'birthday',
        'placeofBirth',
        'gender',
        'year_level',
        'section',
        'department',
        'email',
        'last_grade',
        'essay_question',
        'first_semester_grade',
        'second_semester_grade',
        'status',
        'election_id',
        'candidate_role',
    ];

    public function  store_form($store_form) {
        return $this->create($store_form);
    }
}


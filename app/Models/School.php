<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    protected $fillable = [
        'name',
        'faculty',
        'department',
        'graduation_year',
    ];

    public function getAssociation(){
        return Association::where('school_id', $this->id)->first();
    }
}

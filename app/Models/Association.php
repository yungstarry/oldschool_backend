<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $table = 'associations';
    protected $fillable = [
        'name',
        'user_id',
        'school_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'association_user');
    }

    public static function createAssociationForSchool(School $school, $userId){
        $association = new Association();
        $association->school_id = $school->id;
        $association->user_id = $userId;
        $association->name = $school->name . ' Association';
        $association->save();

        return $association;
    }

    
}

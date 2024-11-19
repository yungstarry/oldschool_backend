<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'phone_number',
        'first_name',
        'last_name',
        'terms_accepted_at',
        'association_id'
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function associations()
    {
        return $this->belongsToMany(Association::class, 'association_user');
    }

    public static function getSchoolAndAssociation($user_id)
    {
        return User::select(
            'schools.name as school_name',
            'schools.faculty as school_faculty',
            'schools.department as school_department',
            'schools.graduation_year as school_graduation_year',
            'associations.name as association_name'
        )
            ->join('association_user', 'users.id', '=', 'association_user.user_id')
            ->join('associations', 'associations.id', '=', 'association_user.association_id')
            ->join('schools', 'associations.school_id', '=', 'schools.id')
            ->where('users.id', $user_id)
            ->first();
    }

  
}

/* SELECT S.name, S.faculty, S.department, S.graduation_year, A.name
from users as U 
join associations as A 
on U.id = A.user_id
join schools as S 
on A.school_id = S.id
WHERE U.id = 1

*/
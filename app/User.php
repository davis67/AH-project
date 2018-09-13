<?php

namespace App;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable
{
    use Notifiable;
	protected $dates = ['deleted_at'];
     protected $table = 'users';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'activated',
        'team',
        'is_permitted',
        'assigned_to',
        'employee_no'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated'
    ];

    // User Profile Setup - SHould move these to a trait or interface...

    public function leaves(){

        return $this->hasMany('App\Models\Leave');

    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

 
   
    /**
     * determines if a user has a given permision.
     *
     * @param array $permissions
     *
     * @return bool
     */
    public static function hasPermision($permissions)
    {
        $permision = array_get([
            'Consultant',
            'Manager',
            'Assistant Manager',
            'Director',
            'CEO',
            'Deputy Managing Director',
            'Chief Of Staffs',
            'Managing Director',
            'Admin'
        ],auth()->user()->is_permitted);
        foreach ($permissions as $key => $value) {
            if ($value === $permision) {
                return true;
            }
        }
        return false;
    }
    public function opportunities(){
        return $this->belongsToMany('App\Models\Opportunity');
    }
    public function tasks(){
        return $this->belongsToMany('App\Models\OppsTask');
    }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
}

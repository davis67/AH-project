<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Project extends Model
{
    protected $guarded = [];

     public static function boot(){

        parent::boot();

            static::created(function($project){

                 DB::table('opportunities') 
                ->where('id',$project->opportunity->id)
                ->update([
                   'is_project' => 1
                ]);

            });
        
    }

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
    public function associate(){

        return $this->hasMany(Associate::class);
        
    }
    public function tasks(){

        return $this->hasMany(Task::class);
        
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function project_users(){

        return $this->hasMany(Project_user::class, 'project_users');
    }

    public function project_associates(){

        return $this->hasMany(Project_associate::class, 'associate_project');
    }
}

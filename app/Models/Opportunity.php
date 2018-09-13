<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Opportunity extends Model
{
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    protected $casts = [
        'is_project' => 'boolean'
    ];
    protected $table ='opportunities';
    
    public function latestOmnumber()
    {
        $last = DB::table('opportunities')->latest('id')->first();

        if (null == $last) {
            $latest = 8790;
        } else {
            $latest = $last->OM_number;
        }

        return $latest;
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }

 

    public function users(){
        return $this->belongsToMany('App\User');
    }
}

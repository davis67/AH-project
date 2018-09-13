<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_user extends Model
{
    protected $fillable = ['project_id', 'consultant_name'];
    protected $table = "project_user";
    public function project(){

    	return $this->belongsTo(Project::class);
    }
}

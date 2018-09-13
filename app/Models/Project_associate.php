<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project_associate extends Model
{
    protected $fillable =['project_id', 'associate_name', 'start_date', 'end_date'];
    protected $table ="associate_project";
    public function project(){

    	return $this->belongsTo(project::class);
    	
    }
}

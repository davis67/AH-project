<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = [];
    protected $casts = [
    	'start_date',"end_date"
    ];
    public function project(){

        return $this->belongsTo(Task::class);

    }
}

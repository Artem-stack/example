<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
	public function Task(){
        return $this->hasMany(Task::class);
    }

	public function SubTask(){
        return $this->hasMany(SubTask::class);
    }

	protected $table = 'status';
	
    use HasFactory;

    protected $fillable = [
        'name',    
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{

	public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
	protected $table = 'sub_tasks';

    use HasFactory;

    protected $fillable = [
        'name',
        'status_id', 
        'task_id',
        'term',
        'description',      
    ];

}

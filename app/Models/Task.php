<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	public function status()
    {
        return $this->belongsTo(Status::class);
    }
    
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'term',
        'status_id',      
    ];
}

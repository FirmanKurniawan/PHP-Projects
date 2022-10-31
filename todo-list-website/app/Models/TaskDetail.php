<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    use HasFactory;

    protected $fillable = ['id','id_user','description','deadline'];
    
    public function todo_lists() { 
        $this->hasOne(TodoList::class);
    }
}

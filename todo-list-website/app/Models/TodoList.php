<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    use HasFactory;

    protected $fillable = ['id','id_user','description','deadline'];
    
    public function users() { 
        $this->belongsTo(User::class);
    }
}

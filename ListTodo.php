<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ListTodo extends Model
{
    protected $table = "todo";

    protected $fillable = ['title','description','startdate','enddate','image'];

    public $timestamps = false;

    use HasFactory;
}

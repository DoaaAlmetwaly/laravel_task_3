<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todoUser extends Model
{ protected $tabel = "users";

    protected $fillable = ['name','email','password'];

    public $timestamps = false;
    use HasFactory;
}

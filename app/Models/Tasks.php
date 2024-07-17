<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model {

    public static $wrap = null;

    protected $fillable = ['name', 'status'];

    use HasFactory;

}

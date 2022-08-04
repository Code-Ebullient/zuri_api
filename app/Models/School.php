<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SchoolsController;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'password2',
    ];
}

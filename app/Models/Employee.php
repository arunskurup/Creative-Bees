<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    use HasFactory;

    protected $fillable = [
        'firstname' ,
        'lastname' ,
        'date_of_birth',
        'education_qualificatio',
        'address',
        'email' ,
        'phone',
    ];


}

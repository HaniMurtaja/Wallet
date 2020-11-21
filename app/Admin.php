<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    
    protected $table = 'admin';
 
    protected $fillable = [
        'name', 'email', 'password','Phone' , 'birthdate', 'Total_expenses', 'Total_income', 'Registered_date',
    ];
   
    protected $hidden = [
        'password', 'remember_token',
    ];
}

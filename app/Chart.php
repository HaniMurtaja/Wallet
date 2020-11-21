<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    
    protected $table = 'Chart';
 
    protected $fillable = [
         'Total_expenses', 'Total_income', 'daily' , 'monthly' , 'yearly',
    ];
   
    protected $hidden = [
        'remember_token',
    ];
}

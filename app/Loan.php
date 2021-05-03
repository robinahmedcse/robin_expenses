<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    protected $primaryKey = 'loan_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id', 'loan_amount', 'last_payment_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'remember_token',
    ];

   
  
    //
}

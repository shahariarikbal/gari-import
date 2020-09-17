<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    protected $table = 'online_payments';
    protected $fillable = ['name', 'email', 'mobile', 'amount', 'status'];
}

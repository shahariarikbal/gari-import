<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChassisUrl extends Model
{
    protected $table = 'chassis_urls';

    protected $fillable = [
        'transaction_id', 'url'
    ];

    public function payment(){
        return $this->belongsTo(OnlinePayment::class, 'transaction_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionSheetReport extends Model
{
    protected $table = 'auction_sheet_reports';

    protected $fillable = [
        'url_id', 'payment_id', 'reports'
    ];

    public function payment(){
        return $this->belongsTo(OnlinePayment::class, 'payment_id', 'id');
    }
}

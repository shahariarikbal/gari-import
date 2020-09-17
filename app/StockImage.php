<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockImage extends Model
{
    protected $guarded = [];

    public function stocks()
    {
        return $this->belongsTo(Stock::class, 'stock_id', 'id');
    }

    public function imageInquiry()
    {
        return $this->belongsTo(Inquiry::class, 'stock_id', 'id');
    }
}

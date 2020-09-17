<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(StockImage::class,'stock_id', 'id');
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class, 'inquiry_id', 'id');
    }
}

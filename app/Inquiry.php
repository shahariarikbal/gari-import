<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'inquiry_id', 'id');
    }

    public function stockImages()
    {
        return $this->hasMany(StockImage::class, 'stock_id', 'id');
    }
}

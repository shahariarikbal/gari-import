<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPageSetting extends Model
{
    protected $table = 'cms_page_settings';
    protected $fillable = ['cms_page_id', 'settings_key', 'value', 'status'];
}

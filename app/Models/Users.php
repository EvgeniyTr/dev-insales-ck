<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $inSalesId
 * @property string $urlShop
 * @property string $pass
 */
class Users extends Authenticatable
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    
    protected $table = 'Users';

    protected $fillable = ['insalesId', 'pass', 'lang', 'urlShop', 'widgetId', 'fieldStatusId', 'firstTimeSetup', 'deleted_at'];

    public function getInsalesUriAttribute()
    {
    	return 'https://' . config('local.addId') . ':' . $this->pass . '@' . $this->urlShop;
    }
}

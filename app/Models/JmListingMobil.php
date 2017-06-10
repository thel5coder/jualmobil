<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JmListingMobil extends Model
{
    //
    protected $table = 'jm_listing_mobil';

    public function userPengiklan(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}

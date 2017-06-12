<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JmListingMobil extends Model
{
    //
    protected $table = 'jm_listing_mobil';

    public function userPengiklan(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function merkMobil()
    {
        return $this->belongsTo('App\Models\JmMerk','merk');
    }

    public function modelMobil()
    {
        return $this->belongsTo('App\Models\JmModel','model');
    }

    public function tipeMobil()
    {
        return $this->belongsTo('App\Models\JmTipe','tipe');
    }
}

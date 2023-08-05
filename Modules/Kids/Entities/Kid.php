<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Kid extends Model
{

    protected $table = 'kids';

    public function Customer()
    {
        return $this->belongsTo('App\Models\Customer', 'doctor_id', 'id');
    }

    public function Country()
    {
        return $this->belongsTo('App\Models\Country','country_id','id');
    }

    public function City()
    {
        return $this->belongsTo('App\Models\City','city_id','id');
    }

    public function Dad()
    {
        return $this->hasOne('Modules\Kids\Entities\Dad','kid_id','id');
    }

    public function Mom()
    {
        return $this->hasOne('Modules\Kids\Entities\Mom','kid_id','id');
    }

    public function Family()
    {
        return $this->hasOne('Modules\Kids\Entities\Family','kid_id','id');
    }

    public function Usersessions()
    {
        return $this->hasMany('Modules\Kids\Entities\Usersessions','kid_id','id');
    }
}

<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Mom extends Model
{

    protected $table = 'moms';

    public function Kid()
    {
        return $this->belongsTo('Modules\Kids\Entities\Kid','kid_id','id');
    }



}

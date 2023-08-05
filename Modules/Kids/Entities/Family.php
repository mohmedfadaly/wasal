<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Family extends Model
{

    protected $table = 'family';

    public function Kid()
    {
        return $this->belongsTo('Modules\Kids\Entities\Kid','kid_id','id');
    }



}

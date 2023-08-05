<?php

namespace Modules\Kids\Entities;

use Illuminate\Database\Eloquent\Model;


class Dad extends Model
{

    protected $table = 'dads';

    public function Kid()
    {
        return $this->belongsTo('Modules\Kids\Entities\Kid','kid_id','id');
    }



}

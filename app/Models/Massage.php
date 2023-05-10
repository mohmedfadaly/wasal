<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Massage extends Model
{
    protected $table = 'massages';
    public function senduser()
	{
		return $this->belongsTo('App\Models\User','send_id','id');
	}

	public function Chat()
	{
		return $this->belongsTo('App\Models\Chat','chat_id','id');
	}
   
}

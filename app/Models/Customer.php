<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use URL;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $appends = [
        'name',
        'avatar_url',
    ];

    public function getNameAttribute()
    {
        return $this->name_f.' '.$this->name_l;
    }

    public function getAvatarUrlAttribute()
    {
        return URL::to('uploads/customers/avatar/'.$this->avatar);
    }

    public function City()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function Country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    # Tickets

    public function Tickets (){
        return $this->morphMany('Modules\Tickets\Entities\Ticket', 'ticketable');
    }
    public function Ticketreps (){
        return $this->morphMany('Modules\Tickets\Entities\Ticket_rep', 'ticketable');
    }

    # socity

    public function Chatones (){
        return $this->morphMany('Modules\Society\Entities\Chat', 'oneable');
    }

    public function Chatwos (){
        return $this->morphMany('Modules\Society\Entities\Chat', 'towable');
    }

    public function Posts (){
        return $this->morphMany('Modules\Society\Entities\Post', 'userable');
    }

    public function PostReps (){
        return $this->morphMany('Modules\Society\Entities\Post_Rep', 'userable');
    }


    public function PostLikes (){
        return $this->morphMany('Modules\Society\Entities\Post_Like', 'persnable');
    }

    public function PostDlikes (){
        return $this->morphMany('Modules\Society\Entities\Post_Dlike', 'persnable');
    }

    public function Massagefroms (){
        return $this->morphMany('Modules\Society\Entities\Massage', 'fromable');
    }

    public function Massagetos (){
        return $this->morphMany('Modules\Society\Entities\Massage', 'toable');
    }

    # Services

    public function ServiceComments (){
        return $this->morphMany('Modules\Services\Entities\Service_Comment', 'userable');
    }

    public function ArticleComments (){
        return $this->morphMany('Modules\Articles\Entities\Article_Comment', 'userable');
    }

    public function SallServices (){
        return $this->morphMany('Modules\Services\Entities\Sall_Service', 'userable');
    }

    # chat massage 


    public function ChatPROS()
    {
        return $this->hasMany('Modules\Providers\Entities\Chat_PRO', 'customer_id', 'id');
    }

    public function MassagePROs()
    {
        return $this->hasMany('Modules\Providers\Entities\Massage_PRO', 'customer_id', 'id');
    }


    public function ChatPROtones (){
        return $this->morphMany('Modules\Providers\Entities\Chat_PRO', 'oneable');
    }

    public function ChatPROtwos (){
        return $this->morphMany('Modules\Providers\Entities\Chat_PRO', 'towable');
    }
    public function MassagePROones (){
        return $this->morphMany('Modules\Providers\Entities\Massage_PRO', 'oneable');
    }

    public function MassagePROwos (){
        return $this->morphMany('Modules\Providers\Entities\Massage_PRO', 'towable');
    }

    public function ServiceFavs (){
        return $this->morphMany('Modules\Services\Entities\Service_Fav', 'userable');
    }
}

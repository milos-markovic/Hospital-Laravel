<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "pacijent_dijagnoza";
    protected $primaryKey = 'pacijent_dijagnoza_id';

    public $timestamps = false;

    public function pacijent()
    {
        return $this->belongsTo('App\Pacijent','pacijent_id');
    }

    public function bolesti()
    {
        return $this->hasMany('App\Bolest','pacijent_dijagnoza_id');
    }

    public function doctor(){
        return $this->hasOne('App\User');
    }
}

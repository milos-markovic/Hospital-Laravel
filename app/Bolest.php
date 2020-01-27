<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolest extends Model
{
    protected $table = 'dijagnoza';
    protected $primaryKey = 'dijagnoza_id';

    public $timestamps = false;

    protected $fillable = ['dijagnoza_naziv'];

    public function pacijenti()
    {
        return $this->belongsToMany('App\Pacijent','pacijent_dijagnoza','pacijent_id','dijagnoza_id');
    }

    public function card(){
        return $this->belongsTo('App\Card');
    }

    public function lekovi(){
        return $this->belongsToMany('App\Drug','dijagnoza_lek','dijagnoza_id','lek_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pacijent extends Model
{
    protected $table = 'pacijent';
    protected $primaryKey = 'pacijent_id';

    public $timestamps = false;

    protected $fillable = ['pacijent_ime','pacijent_prezime','pacijent_adresa','pacijent_telefon','pacijent_datum_rodjenja','pacijent_pol','pacijent_krvna_grupa', 'pacijent_broj_knjizice', 'pacijent_broj_kartona', 'korisnik_id'];

    public function doctor(){
        return $this->belongsTo('App\User','korisnik_id');
    }

    public function bolesti(){
        return $this->belongsToMany('App\Bolest','pacijent_dijagnoza','pacijent_id','dijagnoza_id')->withPivot('pacijent_id','dijagnoza_id','lek_id','opis_dijagnoza','datum_posete');
    }

    public function lekovi(){
        return $this->belongsToMany('App\Drug','pacijent_dijagnoza','pacijent_id','lek_id')->withPivot('opis_dijagnoza','datum_posete');

    }

    

}

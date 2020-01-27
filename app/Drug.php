<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    protected $table = 'lek';
    protected $primaryKey = 'lek_id';

    public $timestamps = false;

    protected $fillable = ['lek_naziv', 'lek_stanje_magacin','lek_sifra','lek_kategorija_id'];

    public function CategoryDrug(){
        return $this->belongsTo('App\CategoryDrug','lek_kategorija_id');
    }

    public function bolesti(){
        return $this->belongsToMany('App\Bolest','lek_dijagnoza','lek_id','dijagnoza_id');
    }
}

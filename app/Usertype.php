<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertype extends Model
{
    protected $table = 'vrsta_korisnik';
    protected $primaryKey = 'vrsta_korisnik_id';

    public function users(){
        return $this->hasMany('App\User','vrsta_korisnik_id');
    }

}

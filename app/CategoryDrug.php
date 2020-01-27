<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryDrug extends Model
{
    protected $table = 'lek_kategorija';
    protected $primaryKey = 'lek_kategorija_id';

    public $timestamps = false;

    protected $fillable = ['lek_kategorija_naziv','lek_kategorija_id'];

    public function drugs(){
        return $this->hasMany('App\Drug','lek_kategorija_id');
    }
}

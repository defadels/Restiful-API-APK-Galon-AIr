<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    protected $table = 'depot';

    protected $guarded = [];

    public function pesanan() {
        $this->hasMany('App\Pesanan', 'depot_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $guarded = [];

    public function dibuat() {
        return $this->belongsTo('App\User','dibuat_oleh_id');
    }

    public function depot() {
        return $this->belongsTo('App\User','depot_id');
    }

    public function proses() {
        return $this->belongsTp('App\User','diproses_oleh_id');
    }

}

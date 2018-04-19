<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'jenis_akun';

    public $dates = ['tanggal'];
}

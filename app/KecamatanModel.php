<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KecamatanModel extends Model
{
    protected $table = 'districts';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

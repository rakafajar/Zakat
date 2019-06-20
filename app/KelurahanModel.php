<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KelurahanModel extends Model
{
    protected $table = 'villages';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

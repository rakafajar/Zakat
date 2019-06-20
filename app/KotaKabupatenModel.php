<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KotaKabupatenModel extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

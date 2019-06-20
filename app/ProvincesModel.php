<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvincesModel extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    public $timestamps = false;
}

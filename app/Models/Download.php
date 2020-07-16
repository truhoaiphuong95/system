<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    public $timestamps = true;
    public $table = 'downloads';
    public $fillable = ['name', 'description', 'link', 'sha1'];
}

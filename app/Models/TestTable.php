<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestTable extends Model
{
    protected $fillable = [
        'email',
        'telephone_number'
    ];
}

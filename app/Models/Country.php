<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'capital',
        'description',
        'population',
        'id_continent',
    ];
}

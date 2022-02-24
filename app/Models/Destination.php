<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function Review(){
        return $this->hasMany(review::class , 'id_destination')->orderByDesc('id');
    }

    function Facility(){
        return $this->hasOne(facility::class , 'id_destination');
    }
}

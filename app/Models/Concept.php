<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;
    protected $fillable = [
        'concept',
        'id_account'
    ];

    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
    public function movement()
    {
        return $this->hasMany('App\Models\Movement');
    }
}

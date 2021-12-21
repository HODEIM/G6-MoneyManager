<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
    ];
    public function movement()
    {
        return $this->hasMany('App\Models\Movement');
    }
    public function concept()
    {
        return $this->hasMany('App\Models\Concept');
    }
    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}

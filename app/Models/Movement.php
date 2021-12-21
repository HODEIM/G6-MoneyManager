<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'amount',
        'description',
        'date',
        'id_concept',
        'id_account'
    ];
    public function concept()
    {
        return $this->belongsTo('App\Models\Concept');
    }
    public function account()
    {
        return $this->belongsTo('App\Models\Account');
    }
}

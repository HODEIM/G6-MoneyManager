<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_user extends Model
{
    use HasFactory;
    protected $fillable = [
        'active',
        'id_permission',
    ];

    public function permission(){
        return $this->belongsTo('App\Models\Permission');
    }
}

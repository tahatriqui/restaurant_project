<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    //this function allow you access to all users data
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function meal(){
        return $this->belongsTo(Meal::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // protected $table1='owners';
    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    protected $tables='users';
    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;

    // for reviwe 
    protected $table="reviews";
}
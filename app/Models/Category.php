<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'image',
        
    ];

    public function owner(){
        return $this->hasMany(Owner::class);
    }
    use HasFactory;
}

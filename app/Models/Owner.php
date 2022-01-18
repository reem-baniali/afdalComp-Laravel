<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'owner_name',
        'company_name',
        'owner_email',
        'company_email',
        'password',
        'logo',
        'address',
        'desc',
        'num_of_employees',
         'category_id',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function service(){
        return $this->hasMany(Service::class);
    }
    public function image(){
        return $this->hasMany(Image::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
    
    use HasFactory;
}

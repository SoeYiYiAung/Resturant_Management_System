<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableFood extends Model
{
    use HasFactory;

    protected $fillable = ['name','category_id','price','photo','description','stock'];

    public function getPhotoAttribute($value)
    {
        return asset('photo/'.$value);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    // id	title	description	city	address	created_at	updated_at	when_at	picture
    protected $fillable = ['title', 'description', 'city', 'address', 'when_at', 'picture'];

    public function getPictureAttribute($value)
    {
        return asset('storage/' . $value);
    }
    
}

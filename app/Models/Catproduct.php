<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catproduct extends Model
{
    use HasFactory;
    protected $table = 'catproducts';
    
    protected $guarded = ['id'];

    public function produits()
    {
        return $this->hasMany(Product::class);
    }
}

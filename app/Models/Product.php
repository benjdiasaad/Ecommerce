<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
   
    protected $guarded = ['id'];

    public function getPrix(){
        return number_format($this->prix, 2, ',', ' ').' DH';
    }
    public function category()
    {
        return $this->belongsTo(Catproduct::class);
    }
}

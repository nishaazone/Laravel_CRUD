<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Manage extends Model
{

    protected $table = 'manage_products';
    // public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        "product_name",
        "cateogory",
    ];

    public function tracks(){
        return $this->belongsTo(Manage::class);
    }
}

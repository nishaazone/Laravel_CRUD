<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bill extends Model
{
    // public $timestamps = false;
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'Component_id';


    protected $fillable = [
            'Component_id',
            'component_name',
            'part_number',
            'description',
            'quantity_per_unit',
            'quantity_purchased',
            'quantity',
            'quantity_unit',
            'source',
            'supplier',
            'track_id'
    ];

    public function track()
    {
        return $this->hasMany(Bill::class);
    }
}

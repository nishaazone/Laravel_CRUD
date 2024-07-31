<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Track extends Model
{
    protected $table = 'track_products';

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        "product_id",
        "product_name",
        "quantity_produced",
        "quantity_sold",
        "quantity_produced",
        "quantity_unit",
        "reporting_period",
        "start_date",
        "end_date",
    ];

    public function bill()
    {
        return $this->belongsTo(Track::class);
    }

    public function manages()
    {
        return $this->hasMany(Track::class);
    }

}

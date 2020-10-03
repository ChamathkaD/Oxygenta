<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'user_id', 'image',
    ];

    /**
     * Get the order that owns the prescription.
     */
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}

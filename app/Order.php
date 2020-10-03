<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'nic', 'gender', 'dob', 'state', 'city', 'street', 'zip', 'country', 'phone', 'email'
    ];

    /**
     * Get the prescriptions for the order.
     */
    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $primaryKey = 'donation_id';
    protected $table = 'donations';
    protected $fillable = [
        'donation_id', 'user_id', 'charity_id', 'items', 'contact_person', 'pickup_location', 'mobile','quantity', 'note', 'status'
    ];
}

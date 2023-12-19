<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Address extends Model
{
    protected $fillable = ['user_id', 'street_address', 'region', 'postal_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php
namespace Cornatul\Social\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $fillable = [
        'provider',
        'provider_id',
        'token',
        'refresh_token',
        'expires_at'
    ];

}

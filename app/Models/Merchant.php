<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchant';
    protected $primaryKey = 'merchant_id';
    use HasFactory;
}

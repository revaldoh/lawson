<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterStatus extends Model
{
    protected $table = 'master_status';
    protected $primaryKey = 'status_id';
    use HasFactory;
}

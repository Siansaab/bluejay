<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients'; // Specify table name if different from model name

    protected $fillable = [
        'type',
        'name',
        'designation',
        'organization_name',
        'mobile_no',
        'email',
        'location',
        'official_address',
    ];
}

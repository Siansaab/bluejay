<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\department;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Circular extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}

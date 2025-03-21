<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Employee;
class Category extends Model
{
    public function Employee()
    {
        return $this->hasMany(Employee::class);
    }
}

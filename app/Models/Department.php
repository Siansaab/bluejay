<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Acts;
use App\Models\Format;
use App\Models\Code;
use App\Models\Book;
use App\Models\Circular;
use App\Models\HQI;
use App\Models\Legal;
use App\Models\Procedures;
use App\Models\Technical;
class Department extends Model
{
    use HasFactory;

    public function Acts()
    {
        return $this->hasMany(Acts::class);
    }
    public function Book()
    {
        return $this->hasMany(Acts::class);
    }

    public function Circular()
    {
        return $this->hasMany(Acts::class);
    }

    public function Code()
    {
        return $this->hasMany(Acts::class);
    }

    public function Format()
    {
        return $this->hasMany(Acts::class);
    }
    public function HQI()
    {
        return $this->hasMany(Acts::class);
    }

    public function Legal()
    {
        return $this->hasMany(Acts::class);
    }
    public function Procedures()
    {
        return $this->hasMany(Acts::class);
    }
    public function Technical()
    {
        return $this->hasMany(Acts::class);
    }
}

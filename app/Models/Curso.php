<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;             
use Illuminate\Database\Eloquent\Casts\Attribute;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion',
        'categoria',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucwords($value)
        );
    }

    protected function descripcion(): Attribute
    {
        return Attribute::make(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucwords($value)
        );
    }
}

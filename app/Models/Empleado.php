<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'apellido', 
        'dui', 
        'telefono', 
        'salario', 
        'area'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

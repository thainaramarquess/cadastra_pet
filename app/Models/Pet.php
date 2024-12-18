<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Modelo para representar um animal de estimação
class Pet extends Model {
    use HasFactory;

    protected $fillable = ['nome', 'especie', 'raca', 'genero', 'dono', 'data_nascimento'];
}

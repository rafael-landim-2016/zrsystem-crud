<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cpf_or_cnpj', 'rg', 'birth_date', 'marital_status', 'cep', 'address', 'number', 'complement', 'neighborhood', 'city', 'state', 'phone_type', 'phone_number'];
}

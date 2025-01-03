<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelLivro extends Model
{
    use HasFactory;
    protected $table = 'livros';

    protected $fillable = [
        'titulo',
        'autor',
        'editora',
        'num_pag',
        'qtd',
        'status'
        ];
}

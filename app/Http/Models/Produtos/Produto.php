<?php

namespace App\Http\Models\Produtos;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'qtd', 'unidade', 'categoria'
    ];

    public function getUnidadeAttribute($value){
        if ($value == 0) return 'un';
        if ($value == 1) return 'dz';
        if ($value == 2) return 'ml';
        if ($value == 3) return 'L';
        if ($value == 4) return 'kg';
        if ($value == 5) return 'g';
        if ($value == 6) return 'Caixa';
        if ($value == 7) return 'Embalagem';
        if ($value == 8) return 'Galão';
        if ($value == 9) return 'Garrafa';
        if ($value == 10) return 'Lata';
        if ($value == 11) return 'Pacote';
        if ($value == 12) return 'Fardo';
        if ($value == 13) return 'Profissional';
        if ($value == 14) return 'Eletrodoméstico';
        if ($value == 15) return 'Móvel';
        if ($value == 16) return 'Outro';
        return 'Indefinido';
    }

    public function getCategoriaAttribute($value){
        if ($value == 0) return 'Alimentos';
        if ($value == 1) return 'Vestuários';
        if ($value == 2) return 'Remédios';
        if ($value == 3) return 'Higiene Pessoal';
        if ($value == 4) return 'Material de Limpeza';
        if ($value == 5) return 'Eletrodomésticos';
        if ($value == 6) return 'Móveis';
        if ($value == 7) return 'Brinquedos';
        if ($value == 8) return 'Hositalares';
        if ($value == 9) return 'Terapeuticos';
        if ($value == 10) return 'Recursos Humanos';
        if ($value == 11) return 'Profissionais';
        if ($value == 12) return 'Outro';
        return 'Indefinido';
    }
}

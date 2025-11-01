<?php

namespace App\Models;

use App\Filters\JogadoresFilter;
use App\Http\Resources\V1\JogadoresResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Jogadores extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_jogador', 
        'equipe', 
        'gols',
        'assistencias',
        'partidas'
    ];

    public function filter(Request $request) {
        $queryFilter = (new JogadoresFilter)->filter($request);
        
        if (empty($queryFilter)) {
            // Removido o with() desnecessário
            return JogadoresResource::collection(Jogadores::all());
        }

        // Inicia a query sem with()
        $data = Jogadores::query();

        if (!empty($queryFilter['whereIn'])) {
            foreach ($queryFilter['whereIn'] as $value) {
                $data->whereIn($value[0], $value[1]);
            }
        }

        $resource = $data->where($queryFilter['where'])->get();

        return JogadoresResource::collection($resource);
    }
}
<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JogadoresResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nome_jogador' => $this->nome_jogador,
            'equipe' => $this->equipe,
            'nome_equipe' =>$this->nome_jogador . " " . $this->equipe
        ];
    }
}

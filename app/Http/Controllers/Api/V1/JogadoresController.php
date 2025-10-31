<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Validator;
use App\Models\Jogadores;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\V1\JogadoresResource;
use App\Traits\HttpResponses;

class JogadoresController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JogadoresResource::collection(Jogadores::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome_jogador' => 'required', 
            'equipe' => 'required',
            'gols' => 'required',
            'assistencias' => 'required',
            'partidas' => 'required'
        ]);

        if($validator->fails()) {
            return $this->error('data invalida', 422, $validator->errors());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new JogadoresResource(Jogadores::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

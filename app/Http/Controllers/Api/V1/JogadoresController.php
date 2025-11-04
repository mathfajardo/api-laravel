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
    public function index(Request $request)
    {
        // return JogadoresResource::collection(Jogadores::all());
        return (new Jogadores())->filter($request);
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

        $created = Jogadores::create($validator->validated());

        if ($created) {
            return $this->response('Jogador adicionado', 200, $created);
        }
        return $this->error('Jogador não foi criado', 400);
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
        $validator = Validator::make($request->all(), [
            'nome_jogador' => 'required', 
            'equipe' => 'required',
            'gols' => 'required',
            'assistencias' => 'required',
            'partidas' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->error('validacao deu erro', 422, $validator->errors());
        }

        $validated = $validator->validated();

        $update = Jogadores::find($id)->update([
            'nome_jogador' => $validated['nome_jogador'], 
            'equipe' => $validated['equipe'],
            'gols' => $validated['gols'],
            'assistencias' => $validated['assistencias'],
            'partidas' => $validated['partidas']
        ]);

        if ($update) {
            return $this->response('Jogador atualizado', 200, $request->all());
        }

        return $this->error('Jogador não atualizado', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jogadores $jogador)
    {
        $deleted = $jogador->delete();

        if ($deleted) {
            return $this->response('Jogador deletado', 200);
        }
        return $this->error('Jogador não deletado', 400); 
    }
}

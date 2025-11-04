<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use HttpResponses;

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required', 
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return $this->error('data invalida', 422, $validator->errors());
        }

        $created = User::create($validator->validated());

        if ($created) {
            return $this->response('Usuario criado com sucesso!', 200, $created);
        }
        return $this->error('Usuario não foi criado com sucesso!', 400);
    }
}

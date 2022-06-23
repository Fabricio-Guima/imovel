<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $input = $request->validated();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        return new UserResource($user);
    }

    public function update(User $userId, UserRequest $request)
    {
        $LoggedUser = auth()->user();

        $input = $request->validated();

        $user = User::where('email', $input['email'])->first();

        if ($LoggedUser->id !==  $user->id) {

            return response()->json(['message' => 'não foi possível atualizar o registro']);
        }

        if ($user && $user->email != $input['email']) {

            throw ValidationException::withMessages(['message' => 'E-mail inválido']);
        }

        if ($request->password) {
            $input['password'] = bcrypt($input['password']);
        }

        $userId->fill($input);
        $userId->save();

        return new UserResource($userId);
    }
}

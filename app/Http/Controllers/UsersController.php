<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function get()
{
    $users = Users::all();

    return response()->json([
        "code" => "200",
        "data" => $users,
    ], 200);
}

    public function create(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'user' => 'required|max:30',
            'name' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                "code" => 400,
                "message" => "Error en la validación",
                "errors" => $validator->errors(),
            ], 400);
        }
        try {
            // Creación del usuario con asignación masiva
            $hashedPassword = Hash::make($request->password);
            DB::statement('EXEC users_Create ?, ?, ?, ?, ?, ?, ?', [
                $request->user,
                $request->name,
                $request->lastname,
                $request->email,
                $hashedPassword,
                $request->role,
                $request->status
            ]);
            // Respuesta de éxito
            return response()->json([
                "code" => 201,
                "message" => "Usuario creado correctamente",
            ], 201);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json([
                "code" => 500,
                "message" => "Error al crear el usuario",
            ], 500);
        }
    }

    public function show($id)
    {
        $user = Users::find($id);

        if (!empty($user)) {
            return response()->json($user);
        }else{
            return response()->json([
                "code"=>"404",
                "message"=>"Usuario no encontrado",
            ],404);
        }
    }

    public function update(Request $request, $id)
    {
        if (Users::where('id',$id)->exists()){
            $user= Users::find($id);
            $user->user = is_null($request->user) ? $user->user : $request->user;
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->lastname = is_null($request->lastname) ? $user->lastname : $request->lastname;
            $user->email = is_null($request->email) ? $user->email : $request->email;    
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->role = is_null($request->role) ? $user->role : $request->role;
            $user->status = is_null($request->status) ? $user->status : $request->status;
            $user->updated_at = now();
            $user->save();
            return response()->json([
                "code"=>"202",
                "message"=>"Usuario actualizado correctamente",
            ],202);
        }else{
            return response()->json([
                "code"=>"404",
                "message"=>"Usuario no encontrado",
            ],404);
        }
    }
    public function delete($id){
        if (Users::where('id',$id)->exists()){
            $user = Users::find($id);
            $user->delete();
            return response()->json([
                "code"=>"202",
                "message"=>"Usuario eliminado correctamente",
            ],202);
         }else{
            return response()->json([
                "code"=>"404",
                "message"=>"Usuario no encontrado",
            ],404);
         }
      
    
    }

}

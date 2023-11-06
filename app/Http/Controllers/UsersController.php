<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

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
        $user= new Users;
        $user->user = $request->user;
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();
        return response()->json([
            "code"=>"201",
            "message"=>"Usuario creado correctamente",
        ],201);
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

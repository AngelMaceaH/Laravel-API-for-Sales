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
    $users = Users::all()->map(function ($user) {
        foreach ($user->getAttributes() as $key => $value) {
            if (is_string($value)) {
                $user->$key = trim($value);
            }
        }
        return $user;
    });

    return response()->json([
        "code" => "200",
        "data" => $users,
    ], 200, [], JSON_UNESCAPED_UNICODE);
}


public function create(Request $request)
{
    $result = DB::select('EXEC users.users_Create ?, ?, ?, ?, ?, ?', [
        $request->usern,
        $request->namen,
        $request->lastn,
        $request->email,
        $request->passn,
        $request->rolen
    ]);
    $code = $result[0]->CODE ?? '500';
    $message = $result[0]->MESSAGE ?? 'Database unexpected behavior error';

        return response()->json([
            "code" => $code,
            "message" =>$message
        ], $code);
}


    public function show($id)
    {
        $user = Users::find($id);

        if (!empty($user)) {
                foreach ($user->getAttributes() as $key => $value) {
                    if (is_string($value)) {
                        $user->$key = trim($value);
                    }
                }
                return $user;
            return response()->json([
                "code" => "200",
                "data" => $users,
            ], 200, [], JSON_UNESCAPED_UNICODE);    
        }else{
            return response()->json([
                "code"=>"404",
                "message"=>"Usuario no encontrado",
            ],404);
        }
    }

    public function update(Request $request, $id)
    {

            $result = DB::select('EXEC [users].[users_Update] ?, ?, ?, ?, ?, ?', [
                $id,
                $request->usern,
                $request->namen,
                $request->lastn,
                $request->email,
                $request->rolen
            ]);
            $code = $result[0]->CODE ?? '500';
            $message = $result[0]->MESSAGE ?? 'Database unexpected behavior error';
                return response()->json([
                    "code" => $code,
                    "message" =>$message
                ], $code);
    }
    public function delete($id){
        if (Users::where('id',$id)->exists()){
            $user = Users::find($id);
            $user->delete();
            return response()->json([
                "code"=>"200",
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

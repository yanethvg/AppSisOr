<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRequestUpdate;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(Request $request){
        $users=User::orderby('id','DESC')
                ->with('roles')
                ->filter($request->q)
                ->rol($request->rol)
                ->paginate(10);

        $roles=Role::all();

        return [
            'pagination' => [
                'total'         => $users->total(),
                'current_page'  => $users->currentPage(),
                'per_page'      => $users->perPage(),
                'last_page'     => $users->lastPage(),
                'from'          => $users->firstItem(),
                'to'            => $users->lastItem(),
            ],
            'users' => $users,
            'roles'=>$roles
        ];
    }

    public function index(){

        return view('usuarios.index');
    }



    public function store(UserRequest $request){

        $user=new User;
        $user->usuario=$request->usuario?? $this->generateUsername($request->nombre,$request->rol);
        $user->nombre=$request->nombre;
        $user->email=$request->email;
        $password_created=$this->generatePassword();
        $user->password=Hash::make($password_created);
        $user->save();
        $user->assignRoles($request->rol);

        return response()->json(['usuario'=>$user->usuario, 'password'=>$password_created]);

    }

    public function toggle($id){
        $user=User::findOrFail($id);
        $user->habilitado=!$user->habilitado;
        $user->save();
        $estado=$user->habilitado?"usuario $user->nombre habilitado":"usuario $user->nombre inhabilitado";
        return response()->json(['estado'=>$estado]);
    }

    public function update(UserRequestUpdate $request, $id){
            $user=User::findOrFail($id);
            $user->nombre=$request->nombre;
            $user->email=$request->email;
            $user->usuario=$request->usuario;
            $user->save();
            $user->syncRoles($request->rol);


    }
    private function generateUsername($nombre,$rol){
        $primerasTresLetras=substr($nombre,0,3);
        $username="";
        $username.=$primerasTresLetras;
        $username.="-$rol-";
        $username.=(User::where('nombre','ilike',"$primerasTresLetras%")->count()+1);


        return $username;
    }
    private function generatePassword(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $length=8;

        $randomPassword = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomPassword;
    }
}

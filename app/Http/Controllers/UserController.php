<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
    public function store(Request $request)
    {
        //aqui solo esta mostrando el request 
        //return $request;
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'extension' => $request->file->extension(),
                //aqui se guarda en la bd
                'telefono' => $request->$telefono,
                'img' => $this->encode($request->file), 
                'active' => 1

            ]);
            session()->flash('success','Usuario agregado');
            return back()->withInput();

        } catch (\Throwable $th) {
            response()->json($th, 500);
            session()->flash('danger',$th);
            return back()->withInput();
        }

       /*  return view('users.index', ['users' => $model->paginate(15)]); */
    }

    public function encode($img)
    {
        $contenido=$img->openFile()->fread($img->getSize());
        $imgB64=base64_encode($contenido);
        return $imgB64;
    }


    /* return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]); */
}

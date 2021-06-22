<?php

namespace App\Http\Controllers;
use App\Models\Jugadore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AdmJugadoresController extends Controller
{
    public function __construct(){$this->middleware('auth');}

    public function index()
    {
        $jugadores=Jugadore::all();
        return view('admJugadores')->with('jugadores',$jugadores);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'pais'=>'required',
            'nombre1'=>'required',
            'nombre2'=>'required',
            'nombre3'=>'required',
            'nombre4'=>'required',
            'nombre5'=>'required',
            'nombre6'=>'required',
            'nombre7'=>'required',
            'nombre8'=>'required',
            'nombre9'=>'required',
            'nombre10'=>'required',
            'nombre11'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $jugador=Jugadore::create([
                'pais'=>$request->pais,
                'nombre1'=>$request->nombre1,
                'nombre2'=>$request->nombre2,
                'nombre3'=>$request->nombre3,
                'nombre4'=>$request->nombre4,
                'nombre5'=>$request->nombre5,
                'nombre6'=>$request->nombre6,
                'nombre7'=>$request->nombre7,
                'nombre8'=>$request->nombre8,
                'nombre9'=>$request->nombre9,
                'nombre10'=>$request->nombre10,
                'nombre11'=>$request->nombre11

                
            ]);
            return back()->with('Listo','Registro de jugadores realizado correctamente');
        }
    }
    public function destroy($id)
    {
        $jugador=Jugadore::find($id);
        $jugador->delete();
        return back()->with('Listo','Eliminación realizada correctamente');
    }
    
}

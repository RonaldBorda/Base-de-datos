<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Partido;

class AdmPartidoController extends Controller
{
    public function __construct(){$this->middleware('auth');}
    public function index()
    {
        $partidos=Partido::all();
        return view('admPartido')->with('partidos',$partidos);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'hora'=>'required',
            'paisA'=>'required',
            'paisB'=>'required',
            'puntuacionA'=>'required',
            'puntuacionB'=>'required',
            'imgPaisA'=>'required',
            'imgPaisB'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $partido=Partido::create([
                'fecha'=>$request->fecha,
                'hora'=>$request->hora,
                'paisA'=>$request->paisA,
                'paisB'=>$request->paisB,
                'puntuacionA'=>$request->puntuacionA,
                'puntuacionB'=>$request->puntuacionB,
                'banderaA'=>$request->imgPaisA,
                'banderaB'=>$request->imgPaisB
            ]);
            return back()->with('Listo','Registro de partidos realizado correctamente');
        }
    }
    public function destroy($id)
    {
        $partido=Partido::find($id);
        $partido->delete();
        return back()->with('Listo','Eliminación realizada correctamente');
    }
    public function editarPartido(Request $request)
    {
        $partido=Partido::find($request->id);
        $validator = Validator::make($request->all(),[
            'fecha'=>'required',
            'hora'=>'required',
            'paisA'=>'required',
            'paisB'=>'required',
            'puntuacionA'=>'required',
            'puntuacionB'=>'required',
            'imgPaisA'=>'required',
            'imgPaisB'=>'required'
        ]);
        if($validator->fails()){
            return back()
                ->withInput()
                ->with('ErrorInsert','Completar todos los campos')
                ->withErrors($validator);
        }else{
            $partido->fecha=$request->fecha;
            $partido->hora=$request->hora;
            $partido->paisA=$request->paisA;
            $partido->paisB=$request->paisB;
            $partido->puntuacionA=$request->puntuacionA;
            $partido->puntuacionB=$request->puntuacionB;
            $partido->banderaA=$request->imgPaisA;
            $partido->banderaB=$request->imgPaisB;

            $partido->save();
            return back()->with('Listo','Actualización realizada correctamente');
        }//llave else validator
    }//Llave funcion


}

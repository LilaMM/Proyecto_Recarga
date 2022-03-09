<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Banco;
use App\Models\Motivo;
use App\Models\Player;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registro::latest()->paginate(5);
        $players = Player::pluck('nombres','codigo');
        return view('registros.index',compact('registros','players'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $registro = new Registro();
        //$bancos = Banco::all()->pluck('nombre','id');
        $bancos = Banco::get();
        $players = Player::pluck('nombres','codigo');
        return view('registros.create', compact('registro','bancos', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_player' => 'required',
            'id_banco' => 'required',
            'monto' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Registro::create($input);
     
        return redirect()->route('registros.index')
                        ->with('success','Se registro corectamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(Registro $registro)
    {
        return view('registros.show',compact('registro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(Registro $registro)
    {
        $bancos = Banco::get();
        $motivos = Motivo::get();
        $players = Player::pluck('nombres','codigo');
        return view('registros.edit',compact('registro','bancos','motivos','players'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registro $registro)
    {
        $request->validate([
            'id_player' => 'required',
            'id_banco' => 'required',
            'monto' => 'required',
            'id_razon_modificacion' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $registro->update($input);
    
        return redirect()->route('registros.index')
                        ->with('success','Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registro $registro)
    {
        $registro->delete();
     
        return redirect()->route('registros.index')
                        ->with('success','Registro eliminado correctamente');
    }
}

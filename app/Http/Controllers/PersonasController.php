<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        /*$datos = "Alejandro Mejía";
        return view('welcome', compact('datos'));*/
        $datos = Personas::orderBy('nombre', 'asc')->paginate(15);
        //$datos = Personas::paginate(10);
        return view('welcome', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        return view('crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $personas = new Personas();

        $personas->nombre = $request->post('nombre');
        $personas->apellido = $request->post('apellido');
        $personas->fecha_nacimiento = $request->post('fechaNac');
        $personas->save();

        return redirect()->route('personas.index')->with('success', 'Datos registrados exitosamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $id = decrypt($id);

        $persona = Personas::find($id);
        return view('eliminar', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // Se encripta el id de esta forma para mayor seguridad
        $id = decrypt($id);

        // Se pasa la variable desencriptada a buscar.
        $personas = Personas::find($id);

        return view('actualizar', compact('personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $personas = Personas::find($id);

        $personas->nombre = $request->post('nombre');
        $personas->apellido = $request->post('apellido');
        $personas->fecha_nacimiento = $request->post('fechaNac');
        $personas->save();

        return redirect()->route('personas.index')->with('success', 'Datos actualizados exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $persona = Personas::find($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Datos eliminados exitosamente!');
    }
}

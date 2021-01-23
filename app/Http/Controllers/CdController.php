<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cd;
use Illuminate\Validation\Rule; //validatore delle regole di eccezione

class CdController extends Controller
{
    /**
     * Display a listing of the resource. (ARCHIVE)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data from db Cd
        $cds = Cd::all();
        // dd($cds);

        // Return
        return view('cds.index', compact('cds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();
        
        // Validazione

        $request->validate([
            'title' => 'required|unique:cds|max:100',
            'description' => 'required'
        ]);

        // Salva i dati su DB

        $cd = new Cd();
        // $cd->title = $data['title'];
        // $cd->description = $data['description'];

        /* Metodo fill */
        
        $cd->fill($data);

        $saved = $cd->save();
        //dd($saved);
        if( $saved ){
            return redirect()->route('cds.show', $cd->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Show cd
        $cd = Cd::find($id);

        return view('cds.show', compact('cd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cd $cd) // forma short di: edit ($id) { $cd = Cd::find($id) }
    {

        return view('cds.edit', compact('cd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Dati inviati dalla form
        $data = $request->all();

        // Istanza specifica

        $cd = Cd::find($id);

        // Validazione

        $request->validate([
            'title' => [
                'required',
                Rule::unique('cds')->ignore($id),  //si mette il plurale del database
                'max:100'
            ],
            'description' => 'required'
        ]);

        // Aggiorna dati DB

         $update =  $cd->update($data); // serve il fillable nel model

         // Return se l'update è true
         if ($update) {
             return redirect()->route('cds.show', $id);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cd = Cd::find($id);
        // Associo ref del dato che sto per cancellare
        $ref = $cd->title;
        // Delete
        $deleted = $cd->delete();
        //Return
        if ($deleted){
            return redirect()->route('cds.index')->with('deleted', $ref);
        }
    }
}

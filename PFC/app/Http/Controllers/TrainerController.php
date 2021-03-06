<?php

namespace PFC\Http\Controllers;

use PFC\Trainer;

use Illuminate\Http\Request;

use PFC\Http\Requests\StoreTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //accedo por el request a la informacion del usuario y lo valido con el metodo de authorizerol que esta en el user.php
        $request->user()->authorizeRoles('admin');
        $trainers= trainer::all();
       return view('trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainerRequest $request)
    {
        
       if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        $name = time().$file->getClientOriginalName();
        $file->move(public_path().'/images/',$name);

        $trainer =new trainer();
         $trainer -> name = $request -> input('name');
         $trainer -> avatar = $name;
          $trainer -> slug = $request -> input('slug');

         $trainer->save();
        
        //esto es del video 29
         //redireccionamiento de rutas 
      
      return redirect()->route('trainers.index');
       }       
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {

    
     return view('trainers.show', compact('trainer'));

;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        //creo una nueva vista para la edicion del entrenador
     return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, Trainer $trainer)
    {
       
        $trainer->fill($request->except('avatar'));
          if ($request -> hasFile('avatar')){
            $file= $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $trainer->avatar=$name;
            $file-> move(public_path().'/images/',$name);
        }   
        $trainer->save();
        return redirect()->route('trainers.show', [$trainer])->with('status', 'Entrenador Actualizado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
      $file_path= public_path().'images/'.$trainer->avatar;
        \File::delete($file_path);
        $trainer->delete();
        
      return redirect()->route('trainers.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
     $this->middleware("auth", ["except" => "show"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show(Perfil $perfil)
    {
        // dd(auth()->user());

        $data["perfil"] = $perfil;

        $data["recetas"] = $perfil->usuario->recetas;

        return view("perfil.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit(Perfil $perfil)
    {
        $this->authorize("view", $perfil);
        $data["perfil"] = $perfil;

        return view("perfil.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perfil $perfil)
    {
        $this->authorize("update", $perfil);
        // valudacion
        $data = request()->validate([
            "nombre" => "required",
            "pagina_web" => "required|url",
            "biografia" => "required",
            "imagen" => "image|max:1000",
        ]);

        auth()->user()->pagina_web = $data["pagina_web"];
        auth()->user()->name = $data["nombre"];
        auth()->user()->save();

        $perfil->biografia = $data["biografia"];

        if( request("imagen") ) {
            $ruta_image = $request["imagen"]->store("uploads-perfiles", "public");


            $img = Image::make( public_path( "storage/{$ruta_image}" ) )->fit(300, 300);
            $img->save();

            if( $perfil->imagen ) {
                unlink( public_path( "storage/{$perfil->imagen}" ) );
            }
            $perfil->imagen = $ruta_image;
        }

        $perfil->save();




        return redirect()->route("perfil.show", ["perfil" => $perfil->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perfil  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perfil $perfil)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria_receta;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class RecetaController extends Controller
{

    public function __construct()
    {
     $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas_usuario = Auth::user()->recetas;
        $data["recetas"] = $recetas_usuario;


        return view("recetas.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // 01: forma de hacer consultas a la base de datos
        // $categorias =
        //     DB::table("categoria_recetas")
        //         ->get()
        //         ->pluck( "nombre", "id");

        // 02: peticiones con modelo
        $categorias = Categoria_receta::all(["id", "nombre"]);


        $data["categorias"] = $categorias;

        // dd(asset(""));

        return view("recetas.crear", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = request()->validate([
            "titulo" => "required",
            "categoria" => "required",
            "ingredientes" => "required",
            "preparacion" => "required",
            // "imagen" => "required|image|size:1000",
        ]);

        $ruta_image = $request["imagen"]->store("uploads-recetas", "public");


        $img = Image::make( public_path( "storage/{$ruta_image}" ) )->fit(700, 400);
        $img->save();

        $data_insert = [
            "titulo" => $form_data["titulo"],
            "categoria_id" => $form_data["categoria"],
            "ingredientes" => $form_data["ingredientes"],
            "preparacion" => $form_data["preparacion"],
            "imagen" => $ruta_image,
            // "user_id" => Auth::user()->id,
        ];

        // agregar datos a la base de datos sin modelo
        // $response = DB::table("recetas")->insert($data_insert);

        $response = Auth::user()->recetas()->create($data_insert);

        return redirect()->route("receta.index");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function show(Receta $receta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit(Receta $receta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receta  $receta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receta $receta)
    {
        //
    }
}

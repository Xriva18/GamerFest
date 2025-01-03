<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Muestra el formulario para cargar un archivo.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('fileupload.create');
    }

    /**
     * Procesa la carga del archivo y lo guarda en S3.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar que el archivo sea una imagen
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048', // Limite de 2MB
        ]);

        // Verificar si hay un archivo en la solicitud
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Subir el archivo al almacenamiento S3 (Supabase)
            $route = Storage::disk('s3')->put('prueba', $file);

            // Mostrar la ruta del archivo almacenado
            dd($route);

            // Si necesitas redirigir después, puedes hacerlo como este ejemplo:
            // return redirect()->route('fileupload.create')->with('success', 'Archivo cargado correctamente');
        }

        // Si no se encuentra el archivo, redirigir con un mensaje de error
        return redirect()->route('fileupload.create')->with('error', 'No se encontró el archivo.');
    }
}

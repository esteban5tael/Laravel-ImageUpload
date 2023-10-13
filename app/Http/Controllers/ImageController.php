<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{


    public function index()
    {
        $images = Image::query()
            ->orderBy('id', 'desc')
            ->paginate();
        $path = asset('storage/assets/img');
        return view('images.index', compact('images', 'path'))
            ->with('i', (request()->input('page', 1) - 1) * $images->perPage());
    }


    public function create()
    {
        $image = new Image();
        return view('images.create', compact('image'));
    }


    public function store(Request $request)
    {
        request()->validate(Image::$rules);

        $imagePath = "";

        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('assets/img', 'public');


            $request['image'] =  $imagePath;
            // dd($imagePath);

        }



        $image = Image::create(
            [
                'name' => $request['name'],
                'image' => $imagePath
            ]
        );

        return redirect()->route('images.index')
            ->with('success', 'Image created successfully.');
    }


    public function show($id)
    {
        $image = Image::find($id);

        return view('images.show', compact('image'));
    }


    public function edit($id)
    {
        $image = Image::find($id);

        return view('images.edit', compact('image'));
    }


    public function update(Request $request, Image $image)
    {
        request()->validate(Image::$rules);

        // Obtén la imagen actual desde la base de datos
        $currentImage = $image->image;

        if ($request->hasFile('image')) {
            // Sube la nueva imagen
            $imagePath = $request->file('image')->store('assets/img', 'public');

            // Verifica si la imagen actual es diferente de la nueva
            if ($currentImage && Storage::disk('public')->exists($currentImage)) {
                // Elimina la imagen anterior
                Storage::disk('public')->delete($currentImage);
            }

            // Actualiza el campo 'image' con la nueva ruta
            $image->image = $imagePath;
        }

        // Actualiza otros campos
        $image->update([
            'name' => $request['name'],
            'image' => $imagePath
        ]);

        return redirect()->route('images.index')
            ->with('success', 'Image updated successfully');
    }




    public function destroy($id)
    {
        // Obtén el registro de la base de datos
        $image = Image::findOrFail($id);

        // Elimina la entrada en la base de datos
        $image->delete();

        // Elimina el archivo del sistema de archivos
        if (Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        return redirect()->route('images.index')
            ->with('success', 'Image deleted successfully.');
    }
}

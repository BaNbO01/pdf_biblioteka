<?php
 
 namespace App\Http\Controllers;

use App\Http\Resources\AutorResource;
use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return AutorResource::collection(Autor::all());
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'datum_rodjenja' => 'required|date',
            'datum_smrti' => 'nullable|date|after:datum_rodjenja'
        ]);

        $autor = Autor::create($request->all());
        return new AutorResource($autor);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $request->validate([
            'ime' => 'sometimes|required|string|max:255',
            'prezime' => 'sometimes|required|string|max:255',
            'datum_rodjenja' => 'sometimes|required|date',
            'datum_smrti' => 'nullable|date|after:datum_rodjenja'
        ]);

        $autor->update($request->all());
        return new AutorResource($autor);
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->noContent();
    }
}

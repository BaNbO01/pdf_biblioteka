<?php

namespace App\Http\Controllers;

use App\Http\Resources\PretplataResource;
use App\Models\Pretplata;
use Illuminate\Http\Request;

class PretplataController extends Controller
{
    public function index()
    {
        return PretplataResource::collection(Pretplata::all());
    }

    public function show($id)
    {
        $pretplata = Pretplata::findOrFail($id);
        return new PretplataResource($pretplata);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brojUMesecima' => 'required|integer|min:1',
            'cena' => 'required|numeric'
        ]);

        $pretplata = Pretplata::create($request->all());
        return new PretplataResource($pretplata);
    }

    public function update(Request $request, $id)
    {
        $pretplata = Pretplata::findOrFail($id);
        $request->validate([
            'brojUMesecima' => 'sometimes|required|integer|min:1',
            'cena' => 'sometimes|required|numeric'
        ]);

        $pretplata->update($request->all());
        return new PretplataResource($pretplata);
    }

    public function destroy($id)
    {
        $pretplata = Pretplata::findOrFail($id);
        $pretplata->delete();
        return response()->noContent();
    }
}

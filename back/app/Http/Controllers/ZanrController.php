<?php
namespace App\Http\Controllers;
use App\Http\Resources\ZanrResource;
use App\Models\Zanr;
use Illuminate\Http\Request;

class ZanrController extends Controller
{
    public function index()
    {
        return ZanrResource::collection(Zanr::all());
    }

    public function show($id)
    {
        $zanr = Zanr::findOrFail($id);
        return new ZanrResource($zanr);
    }

    public function store(Request $request)
    {
        $request->validate([
            'naziv' => 'required|string|max:255',
        ]);

        $zanr = Zanr::create($request->all());
        return new ZanrResource($zanr);
    }

    public function update(Request $request, $id)
    {
        $zanr = Zanr::findOrFail($id);
        $request->validate([
            'naziv' => 'sometimes|required|string|max:255',
        ]);

        $zanr->update($request->all());
        return new ZanrResource($zanr);
    }

    public function destroy($id)
    {
        $zanr = Zanr::findOrFail($id);
        $zanr->delete();
        return response()->noContent();
    }
}

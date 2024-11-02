<?php
 
 namespace App\Http\Controllers;

 use App\Http\Resources\KnjigaResource;
 use App\Models\Knjiga;
 use Illuminate\Http\Request;
 
 class KnjigaController extends Controller
 {
     public function index()
     {

         return KnjigaResource::collection(Knjiga::with('autori', 'zanrovi')->get());
     }
 
     public function show($id)
     {
         $knjiga = Knjiga::with('autori', 'zanrovi')->findOrFail($id);
        
        return new KnjigaResource($knjiga);
       
         
     }
 
     public function store(Request $request)
     {
         $request->validate([
             'naziv' => 'required|string|max:255',
             'ikonica' => 'required|string|max:255',
             'putanja_pdf' => 'required|string|max:255',
             'autori' => 'required|array',
             'zanrovi' => 'required|array',
         ]);
 
         $knjiga = Knjiga::create($request->all());
         $knjiga->autori()->attach($request->autori);
         $knjiga->zanrovi()->attach($request->zanrovi);
 
         return new KnjigaResource($knjiga->load('autori', 'zanrovi'));
     }
 
     public function update(Request $request, $id)
     {
         $knjiga = Knjiga::findOrFail($id);
         $request->validate([
             'naziv' => 'sometimes|required|string|max:255',
             'ikonica' => 'sometimes|required|string|max:255',
             'putanja_pdf' => 'sometimes|required|string|max:255',
             'autori' => 'sometimes|array',
             'zanrovi' => 'sometimes|array',
         ]);
 
         $knjiga->update($request->all());
         if ($request->has('autori')) {
             $knjiga->autori()->sync($request->autori);
         }
         if ($request->has('zanrovi')) {
             $knjiga->zanrovi()->sync($request->zanrovi);
         }
 
         return new KnjigaResource($knjiga->load('autori', 'zanrovi'));
     }
 
     public function destroy($id)
     {
         $knjiga = Knjiga::findOrFail($id);
         $knjiga->delete();
         return response()->noContent();
     }
 }
 
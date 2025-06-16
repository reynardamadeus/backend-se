<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{
    public function materialHomepage(){
        $material = [] ;
        return view('welcome', compact('material'));
    }

    public function exerciseHomepage(){
        $material = Material::where('class', 'SMA - Kelas 3')->get() ;
        return view('exercisehome', compact('material'));
    }

    public function filter(Request $request){
        $material = [];
        if($request->has('kelas')){
            $material = Material::where('class', $request->kelas)->get();
        }else{
            redirect()->route('homepage');
        }
        return view('welcome', compact('material'));
    }

    public function filterFromExercise(Request $request){
        $material = [];
        if($request->has('kelas')){
            $material = Material::where('class', $request->kelas)->get();
        }else{
            redirect()->route('homepage');
        }
        return view('exercisehome', compact('material'));
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'class' => 'required',
            'image' => 'required|image|max:5120'
        ]);
        $filePath = $request->file('image')->storeAs('materials/', $request->name . '.' .$request->file('image')->getClientOriginalExtension() , 'public');
        Material::create([
            'name' => $request->name,
            'class' => $request->class,
            'image' => $filePath
        ]);
         $material = Material::where('class', $request->class)->get();
        return view('welcome', compact('material'));
    }

    public function  update(Request $request, $id){
        try{
            $validated = $request->validated();
            $material = Material::findorFail($id);

            Storage::disk('public')->delete($material->image);
            $filePath = $request->file('image')->storeAs('materials/', $request->name , 'public');
            $validated['image'] = $filePath;
            Material::update($validated);
            return response()->json([
                'message' => 'New material has been updated'
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

    public function delete($id){
        try{
            $material = Material::findorFail($id);
            Storage::disk('public')->delete($material->image);
            $material->delete();
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }
}

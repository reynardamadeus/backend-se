<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function get(){
        try{
        $material = Material::paginate(5);
        return response()->json([
            'data' => $material
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

    public function create(MaterialRequest $request){
        try{
        $validated = $request->validated();
        $filePath = $request->file('image')->storeAs('materials/', $request->name , 'public');
        $validated['image'] = $filePath;
        Material::create($validated);
        return response()->json([
            'message' => 'New material has been added'
        ], 201);
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }

    public function  update(MaterialRequest $request, $id){
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

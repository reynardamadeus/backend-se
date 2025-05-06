<?php

namespace App\Http\Controllers;

use App\Models\LessonMaterial;
use Illuminate\Http\Request;

class LessonMaterialController extends Controller
{
    public function get(){
        try{
            $lm = LessonMaterial::paginate(5);
            return response()->json([
                'data' => $lm
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                    "message" => "internal server error",
                    "errors" => $e->getMessage()
                ],500);
        }
    }
}

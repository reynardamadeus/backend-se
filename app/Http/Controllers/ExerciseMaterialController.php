<?php

namespace App\Http\Controllers;

use App\Models\ExerciseMaterial;
use App\Models\LessonMaterial;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class ExerciseMaterialController extends Controller
{
    public function get($id){
        $materials = Material::find($id);
        if (!$materials) {
            return redirect()->back()->with('error', 'Material tidak ditemukan.');
        }
        $exercises = $materials->exercises()->orderBy('chapter_number')->get();
        return view('exercise.exercise', compact('exercises', 'materials'));
    }

    public function getInsertContentForm($id){
        return view('exercise.insertExercise', compact('id'));
    }

    public function createSubject(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'chapter' => 'required|string|max:255',
            'video' => 'required|url'
        ]);
         $materials = Material::find($id);
        if (!$materials) {
            return redirect()->back()->with('error', 'Material tidak ditemukan.');
        }
        $latest_chapter = $materials->exercises()->latest()->first();
        $chapter_number = ($latest_chapter?->chapter_number ?? 0) + 1;

        preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $request->video, $matches);
        $videoId = $matches[1] ?? null;
        $videoId = "https://www.youtube.com/embed/".$videoId;
        $materials->exercises()->create([
            'chapter_number' => $chapter_number,
            'chapter' => $request->chapter,
            'video' => $videoId,
        ]);
        return redirect()->route('exercise.get', ['id' => $id]);
    }

     public function insertContentForm(Request $request, $id){
        $request->validate([
            'content' => 'required'
        ]);
        $exercise = ExerciseMaterial::find($id);
        $exercise->update([
            'content' => $request->input('content')
        ]);
        $materials = $exercise->material;
        $exercises = $materials->exercises()->orderBy('chapter_number')->get();
        return view('exercise.exercise', compact('exercises', 'materials'));
    }

    public function searchExercise(Request $request){
        $exercises = ExerciseMaterial::where('chapter', $request->name)->get();
        if ($exercises->isEmpty()) {
            return back()->with('forbidden', 'Course not found.');
        }
        $materials = $exercises->first()->material;
        return view('exercise.exercise', compact('exercises', 'materials'));
    }
}

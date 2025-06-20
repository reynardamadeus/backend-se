<?php

namespace App\Http\Controllers;

use App\Models\LessonMaterial;
use App\Models\Material;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class LessonMaterialController extends Controller
{
    public function get($id){
        $materials = Material::find($id);
        if (!$materials) {
            return redirect()->back()->with('error', 'Material tidak ditemukan.');
        }
        $lessons = $materials->lessons()->orderBy('chapter_number')->get();
        return view('lesson.lesson', compact('lessons', 'materials'));
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
        $latest_chapter = $materials->lessons()->latest()->first();
        $chapter_number = ($latest_chapter?->chapter_number ?? 0) + 1;

        preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11})/', $request->video, $matches);
        $videoId = $matches[1] ?? null;
        $videoId = "https://www.youtube.com/embed/".$videoId;
        $materials->lessons()->create([
            'chapter_number' => $chapter_number,
            'chapter' => $request->chapter,
            'video' => $videoId,
        ]);
        return redirect()->route('lesson.get', ['id' => $id]);
    }

    public function getInsertContentForm($id){
        return view('lesson.insertLesson', compact('id'));
    }

    public function insertContentForm(Request $request, $id){
        $request->validate([
            'content' => 'required'
        ]);
        $lesson = LessonMaterial::find($id);
        $lesson->update([
            'content' => $request->input('content')
        ]);
        $materials = $lesson->material;
        $lessons = $materials->lessons()->orderBy('chapter_number')->get();
        return view('lesson.lesson', compact('lessons', 'materials'));
    }

    public function searchLesson(Request $request){
        $lessons = LessonMaterial::where('chapter', $request->name)->get();
        if ($lessons->isEmpty()) {
            return back()->with('forbidden', 'Course not found.');
        }
        $materials = $lessons->first()->material;
        return view('lesson.lesson', compact('lessons', 'materials'));
    }
}

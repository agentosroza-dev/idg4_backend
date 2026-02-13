<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class StudentApiController extends Controller
{
    public function index()
    {
    //    $students = Student::with('major')->latest('updated_at')->paginate(10);
// or simply
$students = Student::with('major')->latest()->paginate(10); // defaults to created_at
        return response()->json($students, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'major_id' => 'required|exists:majors,id',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('students', 'public');
        }

        $student = Student::create($validated);

        return response()->json($student, 201);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        // $validated = $request->validate([
        //     'name' => 'string',
        //     'major_id' => 'exists:majors,id',
        //     'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        // ]);

                $validated = $request->validate([
            'name' => 'sometimes|string',
            'major_id' => 'sometimes|exists:majors,id',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            // delete old image
            if (
                $student->image &&
                $student->image !== 'default.png' &&
                FacadesStorage::disk('public')->exists($student->image)
            ) {
                FacadesStorage::disk('public')->delete($student->image);
            }

            $validated['image'] = $request->file('image')->store('students', 'public');
        }

        $student->update($validated);

        return response()->json($student, 200);
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        // Delete image file from storage
        if (
            $student->image &&
            $student->image !== 'default.png' && //prevent deleting the default.png
            FacadesStorage::disk('public')->exists($student->image)
        ) {
            FacadesStorage::disk('public')->delete($student->image);
        }
        if (!$student) return response()->json(['message' => 'Not found'], 404);
        $student->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}

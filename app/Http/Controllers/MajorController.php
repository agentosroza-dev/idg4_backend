<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::paginate(10);
        // return $marjors;
        return view('majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string'
        ]);

        Major::create($validated);

        return redirect()->route('majors.index')->with('success', 'major created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)  // Remove the type-hint
{
    $major = Major::findOrFail($id);

    return view('majors.edit', compact('major'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)  // Remove type-hint
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $major = Major::findOrFail($id);
    $major->update($validated);

    return redirect()->route('majors.index')->with('success', 'Major updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)  // Remove type-hint
    {
        $major = Major::findOrFail($id);
        // Delete image file from storage
        if (!$major) return response()->json(['message' => 'Not found'], 404);
        $major->delete();

        // return response()->json(['message' => 'Deleted']);
        return redirect()->route('majors.index')->with('success', 'major delete!');
    }
}

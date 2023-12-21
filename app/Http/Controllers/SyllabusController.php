<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SyllabusController extends Controller
{
    public function index()
    {
        $syllabuses = Syllabus::all();
        return view('syllabus.index', compact('syllabuses'));
    }

    public function create()
    {
        return view('syllabus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'syllabus_file' => 'required|mimes:pdf|max:2048',
        ]);

        $syllabus = new Syllabus();
        $syllabus->title = $request->title;

        if ($request->hasFile('syllabus_file')) {
            $file = $request->file('syllabus_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/syllabuses', $filename);
            $syllabus->syllabus_file = $filename;
        }

        $syllabus->save();

        return redirect()->route('syllabus.index')->with('success', 'Syllabus added successfully.');
    }

    public function edit($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('syllabus.edit', compact('syllabus'));
    }

    public function update(Request $request, $id)
    {
        $syllabus = Syllabus::findOrFail($id);

        $request->validate([
            // Define validation rules for your inputs
            'title' => 'required',
            'file' => 'nullable|mimes:pdf|max:2048', // Example: PDF file up to 2MB
        ]);

        $syllabus->title = $request->title;

        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($syllabus->file && Storage::exists($syllabus->file)) {
                Storage::delete($syllabus->file);
            }

            // Store the new file
            $path = $request->file('file')->store('syllabus', 'public');
            $syllabus->file = $path;
        }

        $syllabus->save();

        return redirect()->route('syllabus.index')->with('success', 'Syllabus updated successfully.');
    }

    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);

        // Delete the file if it exists
        if ($syllabus->file && Storage::exists($syllabus->file)) {
            Storage::delete($syllabus->file);
        }

        $syllabus->delete();

        return redirect()->route('syllabus.index')->with('success', 'Syllabus deleted successfully.');
    }
}
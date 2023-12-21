<?php

namespace App\Http\Controllers;
use App\Models\Live;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    public function index(Request $request)
    {
            if ($request->ajax()) {
            $data = Live::select(['intro', 'video_link']);

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<a href="#" class="btn btn-info btn-sm">Edit</a> <a href="#" class="btn btn-danger btn-sm">Delete</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('lives.index');
    }

    public function create()
    {
        return view('lives.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'intro' => 'required|string|max:255',
            'video_link' => 'required|string',
        ]);

        Live::create($validatedData);

        return redirect()->route('lives.index')->with('success', 'Live session created successfully');
    }

    public function edit($id)
    {
        $live = Live::findOrFail($id);
        return view('lives.edit', compact('live'));
    }

    public function update(Request $request, $id)
    {
        $live = Live::findOrFail($id);

        $validatedData = $request->validate([
            'intro' => 'required|string|max:255',
            'video_link' => 'required|string',
        ]);

        $live->update($validatedData);

        return redirect()->route('lives.index')->with('success', 'Live session updated successfully');
    }

    public function show($id)
    {
        $live = Live::findOrFail($id);
        return view('lives.show', compact('live'));
    }

    public function destroy($id)
    {
        $live = Live::findOrFail($id);
        $live->delete();

        return redirect()->route('lives.index')->with('success', 'Live session deleted successfully');
    }
}
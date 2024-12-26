<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::paginate(7);
        return view('admin.semester.index', compact('semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|string'
        ]);

        Semester::create($request->all());

        return redirect()->route('admin.semester.index')
            ->with('success', 'Semester berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $semester = Semester::findOrFail($id);

        $request->validate([
            'semester' => 'required|string'
        ]);

        $semester->update($request->all());

        return redirect()->route('admin.semester.index')
            ->with('success', 'Semester berhasil diupdate');
    }

    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('admin.semester.index')
            ->with('success', 'Semester berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::paginate(7);
        return view('admin.mapel.index', compact('mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|string|unique:mapel',
            'nama_mapel' => 'required|string'
        ]);

        Mapel::create($request->all());

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $request->validate([
            'kode_mapel' => 'required|string|unique:mapel,kode_mapel,' . $id,
            'nama_mapel' => 'required|string'
        ]);

        $mapel->update($request->all());

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Mata Pelajaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('admin.mapel.index')
            ->with('success', 'Mata Pelajaran berhasil dihapus');
    }
}

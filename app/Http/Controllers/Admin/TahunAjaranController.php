<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunAjarans = TahunAjaran::paginate(10);
        return view('admin.tahunajar.index', compact('tahunAjarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajar' => 'required|string|unique:tahun_ajaran'
        ]);

        TahunAjaran::create($request->all());

        return redirect()->route('admin.tahunajar.index')
            ->with('success', 'Tahun Ajaran berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $tahunAjar = TahunAjaran::findOrFail($id);

        $request->validate([
            'tahun_ajar' => 'required|string|unique:tahun_ajaran,tahun_ajar,' . $id
        ]);

        $tahunAjar->update($request->all());

        return redirect()->route('admin.tahunajar.index')
            ->with('success', 'Tahun Ajaran berhasil diupdate');
    }

    public function destroy($id)
    {
        $tahunAjar = TahunAjaran::findOrFail($id);
        $tahunAjar->delete();

        return redirect()->route('admin.tahunajar.index')
            ->with('success', 'Tahun Ajaran berhasil dihapus');
    }
}

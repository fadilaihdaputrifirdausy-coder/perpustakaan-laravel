<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Exports\BukuExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $buku = Buku::when($keyword, function ($query) use ($keyword) {
            $query->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('penulis', 'like', "%{$keyword}%")
                  ->orWhere('kode_buku', 'like', "%{$keyword}%");
        })
        ->paginate(10)
        ->withQueryString();

        return view('buku.index', compact('buku'));
    }

    public function exportExcel()
    {
        return Excel::download(new BukuExport, 'data_buku.xlsx');
    }

    public function exportPdf()
    {
        $buku = Buku::all();

        $pdf = Pdf::loadView('buku.pdf', compact('buku'));

        return $pdf->download('data_buku.pdf');
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'kode_buku' => 'required|max:20',
                'judul' => 'required|max:255',
                'penulis' => 'required|max:100',
                'penerbit' => 'required|max:100',
                'tahun' => 'required|digits:4|integer',
                'stok' => 'required|integer|min:0',
                'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'kode_buku.required' => 'Kode buku wajib diisi.',
                'judul.required' => 'Judul buku wajib diisi.',
                'penulis.required' => 'Nama penulis wajib diisi.',
                'penerbit.required' => 'Nama penerbit wajib diisi.',
                'tahun.required' => 'Tahun terbit wajib diisi.',
                'tahun.digits' => 'Tahun harus terdiri dari 4 digit.',
                'stok.required' => 'Stok wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka.',
                'stok.min' => 'Stok tidak boleh kurang dari 0.',
            ]
        );

        $data = $request->all();

        if ($request->hasFile('cover')) {

            $data['cover'] = $request->file('cover')->store('cover_buku', 'public');

        }

        Buku::create($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'kode_buku' => 'required|max:20',
                'judul' => 'required|max:255',
                'penulis' => 'required|max:100',
                'penerbit' => 'required|max:100',
                'tahun' => 'required|digits:4|integer',
                'stok' => 'required|integer|min:0',
                'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ],
            [
                'kode_buku.required' => 'Kode buku wajib diisi.',
                'judul.required' => 'Judul buku wajib diisi.',
                'penulis.required' => 'Nama penulis wajib diisi.',
                'penerbit.required' => 'Nama penerbit wajib diisi.',
                'tahun.required' => 'Tahun terbit wajib diisi.',
                'tahun.digits' => 'Tahun harus terdiri dari 4 digit.',
                'stok.required' => 'Stok wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka.',
                'stok.min' => 'Stok tidak boleh kurang dari 0.',
            ]
        );

        $buku = Buku::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('cover')) {

            if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {

                Storage::disk('public')->delete($buku->cover);

            }

            $data['cover'] = $request->file('cover')->store('cover_buku', 'public');

        }

        $buku->update($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil diubah.');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {

            Storage::disk('public')->delete($buku->cover);

        }

        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }

    public function qrcode($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.qrcode', compact('buku'));
    }

    public function barcode($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.barcode', compact('buku'));
    }

    public function label($id)
    {
        $buku = Buku::findOrFail($id);

        return view('buku.label', compact('buku'));
    }
}
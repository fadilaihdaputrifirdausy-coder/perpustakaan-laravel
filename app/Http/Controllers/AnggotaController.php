<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $anggota = Anggota::when($keyword, function ($query) use ($keyword) {
            $query->where('nomor_anggota', 'like', "%{$keyword}%")
                  ->orWhere('nama', 'like', "%{$keyword}%")
                  ->orWhere('kelas', 'like', "%{$keyword}%");
        })
        ->paginate(10)
        ->withQueryString();

        return view('anggota.index', compact('anggota'));
    }

    public function exportExcel()
    {
        return Excel::download(new AnggotaExport, 'data_anggota.xlsx');
    }

    public function exportPdf()
    {
        $anggota = Anggota ::all();

        $pdf = Pdf::loadView('anggota.pdf', compact('anggota'));

        return $pdf->download('data_anggota.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nomor_anggota' => 'required|max:20',
                'nama'           => [
                                        'required',
                                        'regex:/^[a-zA-Z\s]+$/'
                                    ],
                'email'         => 'required|email|unique:anggota,email',
                'kelas'          => 'required|max:50',
                'alamat'         => 'required|max:255',
                'no_hp'          => [
                                        'required',
                                        'regex:/^(08\d{8,11}|\+62\d{8,11})$/',
                                    ],
            ],
            [
                'nomor_anggota.required' => 'Nomor anggota wajib diisi.',
                'nama.required'          => 'Nama anggota wajib diisi.',
                'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
                'email.required'         => 'Email wajib diisi.',
                'email.email'            => 'Format email tidak valid.',
                'email.unique'           => 'Email sudah digunakan.',
                'kelas.required'         => 'Kelas wajib diisi.',
                'alamat.required'        => 'Alamat wajib diisi.',
                'no_hp.required' => 'Nomor HP wajib diisi.',
                'no_hp.regex' => 'Nomor HP harus diawali 08 atau +62 dan terdiri dari 10-13 digit.',
            ]
        );

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::findOrFail($id);

        return view('anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nomor_anggota' => 'required|max:20',
                'nama'           => [
                                        'required',
                                        'regex:/^[a-zA-Z\s]+$/'
                                    ],
                'email'         => 'required|email|unique:anggota,email,'.$id,
                'kelas'          => 'required|max:50',
                'alamat'         => 'required|max:255',
                'no_hp'          => [
                                        'required',
                                        'regex:/^(08\d{8,11}|\+62\d{8,11})$/',
                                    ],
            ],
            [
                'nomor_anggota.required' => 'Nomor anggota wajib diisi.',
                'nama.required'          => 'Nama anggota wajib diisi.',
                'nama.regex'             => 'Nama hanya boleh berisi huruf dan spasi.',
                'email.required'         => 'Email wajib diisi.',
                'email.email'            => 'Format email tidak valid.',
                'email.unique'           => 'Email sudah digunakan.',
                'kelas.required'         => 'Kelas wajib diisi.',
                'alamat.required'        => 'Alamat wajib diisi.',
                'no_hp.required' => 'Nomor HP wajib diisi.',
                'no_hp.regex' => 'Nomor HP harus diawali 08 atau +62 dan terdiri dari 10-13 digit.',
            ]
        );

        $anggota = Anggota::findOrFail($id);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);

        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil dihapus.');
    }
}
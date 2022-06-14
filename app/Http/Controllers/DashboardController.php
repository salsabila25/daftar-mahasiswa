<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index', [
            'dataMahasiswa' => Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|max:255|unique:mahasiswas',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'status' => 'required|boolean'
        ]);

        Mahasiswa::create($validatedData);
        // // $request->session()->flash('success', 'Registrasi berhasil!');
        return redirect('/dashboard-data/mahasiswa')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show', [
            'data' => $mahasiswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.edit', [
            'data' => $mahasiswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $rules = [
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan' => 'required|max:255',
            'program_studi' => 'required|max:255',
            'status' => 'required|boolean'
        ];
        if ($request->nim != $mahasiswa->nim) {
            $rules['nim'] = 'required|max:255|unique:mahasiswas';
        }

        $validatedData = $request->validate($rules);

        Mahasiswa::where('id', $mahasiswa->id)
            ->update($validatedData);

        return redirect('/dashboard-data/mahasiswa')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        Mahasiswa::destroy($mahasiswa->id);
        // // $request->session()->flash('success', 'Registrasi berhasil!');
        return redirect('/dashboard-data/mahasiswa')->with('success', 'Data berhasil dihapus');
    }
}

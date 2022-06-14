<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.mahasiswa-ajax.index', [
            'dataMahasiswa' => Mahasiswa::all()
        ]);
    }

    public function fetchdatamahasiswa()
    {
        return response()->json([
            'mahasiswa' =>  Mahasiswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard.mahasiswa.create');
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
        return response()->json([
            'status' => 200,
            'message' => "Data mahasiswa berhasil ditambahkan"
        ]);
        // // $request->session()->flash('success', 'Registrasi berhasil!');
        // return redirect('/dashboard/mahasiswa')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return $mahasiswa;
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

    // public function editdatamahasiswa($id)
    // {
    //     $mahasiswa = Mahasiswa::find($id);
    //     if ($mahasiswa) {
    //         return response()->json([
    //             'status' => 200,
    //             'mahasiswa' => $mahasiswa
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 404,
    //             'message' => "Data mahasiswa tidak ditemukan"
    //         ]);
    //     }
    // }

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

        // return redirect('/dashboard/mahasiswa')->with('success', 'Data berhasil diubah');
        return response()->json([
            'status' => 200,
            'message' => 'Data mahasiswa berhasil di update'
        ]);
    }


    public function updatedatamahasiswa(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        // return response()->json([
        //     'status' => 200,
        //     'mahasiswa' => $mahasiswa
        // ]);

        //return $mahasiswa;

        if ($mahasiswa) {
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
            if ($validatedData) {
                Mahasiswa::where('id', $mahasiswa->id)
                    ->update($validatedData);
                return response()->json([
                    'status' => 200,
                    'message' => 'Data mahasiswa berhasil di update'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'errors' => 'Validasi data gagal'
                ]);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Data mahasiswa tidak ditemukan'
            ]);
        }
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
        // return redirect('/dashboard-data')->with('success', 'Data berhasil dihapus');
        return response()->json([
            'status' => 200,
            'message' => 'Data mahasiswa berhasil dihapus'
        ]);
    }


    // public function deletedatamahasiswa($id)
    // {
    //     Mahasiswa::destroy($id);
    //     // // $request->session()->flash('success', 'Registrasi berhasil!');
    //     return response()->json([
    //         'status' => 200,
    //         'message' => 'Data mahasiswa berhasil di hapus'
    //     ]);
    // }
}

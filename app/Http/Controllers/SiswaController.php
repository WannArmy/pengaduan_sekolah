<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required|min:10|max:10',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create([
            'nisn' => $request->get('nisn'),
            'nama' => $request->get('nama'),
            'alamat' => $request->get('alamat'),
        ]);


        return redirect()->back()->with('message', 'Data Siswa Sudah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required|min:10|max:10',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $pengaduan = Siswa::find($id);

        $pengaduan->nisn = $request->get('nisn');
        $pengaduan->nama = $request->get('nama');
        $pengaduan->alamat = $request->get('alamat');
        $pengaduan->save();

        return redirect()->route('siswa.index')->with('message', 'Data Siswa Sudah Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return redirect()->back()->with('message', 'Data Siswa Sudah dihapus!');
    }
}

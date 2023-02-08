<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengaduan.index', [
            'active' => 'pengaduan',
            'pengaduans' => Pengaduan::latest()->Filter(request(['search']))->paginate(20)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
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
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
            'foto' => 'mimes:png,jpeg,jpg'
        ]);
        $foto = $request->file('foto');
        $name = time() . '.' . $foto->getClientOriginalExtension();
        $destinationPath = public_path('/foto');
        $foto->move($destinationPath, $name);
        Pengaduan::create([
            'siswa_id' => $request->get('siswa_id'),
            'kategori_id' => $request->get('kategori_id'),
            'lokasi' => $request->get('lokasi'),
            'keterangan' => $request->get('keterangan'),
            'foto' => $name
        ]);
        return redirect()->back()->with('message', 'Pengaduan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.detail', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan = Pengaduan::find($id);
        return view('pengaduan.edit', compact('pengaduan'));
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
            'siswa_id' => 'required',
            'kategori_id' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
        ]);

        $pengaduans = Pengaduan::find($id);
        $pengaduans->siswa_id = $request->get('siswa_id');
        $pengaduans->kategori_id = $request->get('kategori_id');
        $pengaduans->lokasi = $request->get('lokasi');
        $pengaduans->keterangan = $request->get('keterangan');
        $pengaduans->save();
        return redirect()->route('pengaduan.index')->with('message', 'Pengaduan berhasil diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengaduans = Pengaduan::find($id);
        $pengaduans->delete();
        return redirect()->route('pengaduan.index')->with('message', 'Pengaduan berhasil dihapus');
    }
    public function profil()
    {
        return view('profil');
    }

    public function welcome()
    {
        return view('welcome', [
            'active' => 'welcome',
            'pengaduans' => Pengaduan::latest()->Filter(request(['search']))->paginate(20)->withQueryString(),
        ]);
    }
}

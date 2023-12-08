<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(5);

        return view('pegawai/index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $date = date('Ymdhs');
        if ($request->hasFile('foto')) {
            $destination = 'storage/foto/';
            $filename    = $request->file('foto');
            $filename->move($destination, (int)$date . '.' . $filename->getClientOriginalExtension());
        }

        $pegawai = Pegawai::create([
            'pegawai_nama' => $request->pegawai_nama,
            'pegawai_umur' => $request->pegawai_umur,
            'pegawai_alamat' => $request->pegawai_alamat,
            'foto'        => (int)$date . '.' . $filename->getClientOriginalExtension(),
        ]);

        session()->flash('success','Data berhasil ditambahkan.');
        return redirect()->route('pegawai.index');
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
        $pegawai = Pegawai::where('pegawai_id', $id)->first();

        return view('pegawai/edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $pegawai = Pegawai::where('pegawai_id',$id)->first();
        

        $date = date('Ymdhs');
        if ($request->file('foto')) {

            $foto = $request->file('foto');
            $savefoto = (int)$date . '.' . $foto->getClientOriginalExtension();

            if ($pegawai->foto != null) {
                if (file_exists('storage/foto/' . $pegawai->foto)) {
                    $delete_foto = unlink('storage/foto/' . $pegawai->foto);
                }
                $foto->move('storage/foto/', $savefoto);
            } else {
                $foto->move('storage/foto/', $savefoto);
                $savefoto = $savefoto;
            }
        } else {
            $savefoto = $pegawai->foto;
        }

        Pegawai::where('pegawai_id',$id)->update([
            'pegawai_nama' => $request->pegawai_nama,
            'pegawai_umur' => $request->pegawai_umur,
            'pegawai_alamat' => $request->pegawai_alamat,
            'foto' => $savefoto,
        ]);

        session()->flash('success','Data berhasil diubah.');
        return redirect()->route('pegawai.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pegawai::where('pegawai_id',$id)->delete();

        session()->flash('success','Data berhasil dihapus.');
        return redirect()->back();
    }
}

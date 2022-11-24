<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan seluruh data artikel yang ada pada database
        $data = Artikel::all();
        
        return view('artikel.index_artikel', compact ('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan submit oleh user kepada halaman create artikel
        $data = Artikel::all();
        $kategori = Kategori::all();
        
        return view('artikel.create_artikel', compact ('data', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menyimpan data artikel yang telah ditambahkan oleh user di halaman create artikel
        // dd($request);
        $validator = $request->validate([
            'judul' => 'required',
            'foto' => 'required',
            'isi' => 'required',
            'tanggalArtikel' => 'required',
            'kategori_id' => 'required',
        ]);
        $validator['foto'] = Storage::put('img', $request->file('foto'));
        // dd($validator);
        Artikel::create($validator);
        
        return redirect('index_artikel')->with('success', 'Data berhasil disimpan!');
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
        //mengarahkan submit oleh user kepada halaman edit artikel
        $data = Artikel::findOrFail($id);
        $kategori = Kategori::all();

        return view('artikel.edit_artikel', [
            'data' => $data,
            'kategori' => $kategori
        ]);
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
        //menyimpan data yang telah diupdate oleh user di halaman edit artikel
        $data = Artikel::find($id);
        $validator = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggalArtikel' => 'required',
            'kategori_id' => 'required',
        ]);
        
        //fungsi agar data berupa foto tidak berubah jika tidak ada update data
        try {
            $validator['foto'] = Storage::put('img', $request->file('foto'));
            $data->update($validator);
        } catch (\Throwable $th) {
            $validator['foto'] = $data->foto;
            $data->update($validator);
        }
        return redirect('index_artikel')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //menghapus data pada tabel di database ketika dihapus oleh user
        $data = Artikel::findOrFail($id);
        $data->delete();

        return redirect('index_artikel')->with('success', 'Data Berhasil Dihapus');
    }
}
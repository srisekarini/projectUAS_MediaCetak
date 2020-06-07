<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class homePenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('pengguna')) return $next($request);
            abort(403,'Anda tidak memiliki cukup hak akses!');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dashboard()
    {
        $title='Pengguna';
        $Dokumen=Dokumen::paginate(5);
        return view('konten.pengguna.home',compact('title', 'Dokumen'));
    }
    public function create()
    {
        $title = 'Input Dokumen baru';
        //$Pelanggan=Pelanggan::all();
        return view('konten.dokumen', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'date' => 'Kolom :attribute harus berupa tanggal!',
            'numeric' => 'Kolom :attribute harus berupa angka!'
        ];

        $validasi = $request->validate([
            'id_pelanggan' => 'required',
            'nama_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'status_dokumen' => 'required',
            'tgl_kirim_dokumen' => 'required',
            'tgl_ambil_dokumen' => 'required',
            'harga' => 'required'
        ], $messages);
        Dokumen::create($validasi);
        return redirect('/admin')->with('success', 'Data berhasil ditambahkan!');
    }

}

<?php


namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Pelanggan;

class DokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Gate::allows('admin')) return $next($request);
            abort(403, 'Anda tidak memiliki cukup hak akses!');
        });
        //$this->middleware('guest', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Dashboard()
    {
        //
        $title='Dokumen';
        $Dokumen=Dokumen::paginate(5);
        //dd($Dokumen);
        return view('konten.home',compact('title','Dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Dokumen baru';
        //$Pelanggan=Pelanggan::all();
        return view('konten.dokumen',compact('title'));
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

        $validasi =$request->validate([
            'id_pelanggan' =>'required',
            'nama_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'status_dokumen' => 'required',
            'tgl_kirim_dokumen' => 'required',
            'tgl_ambil_dokumen' => 'required',
            'harga' => 'required'
        ],$messages);
        Dokumen::create($validasi);
        return redirect('/admin')->with('success', 'Data berhasil ditambahkan!');
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
    public function edit($id_dokumen)
    {
        $title='Update Dokumen';
        $Dokumen=Dokumen::find($id_dokumen);
        return view('konten.dokumen',compact('title','Dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dokumen)
    {
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'date' => 'Kolom :attribute harus berupa tanggal!',
            'numeric' => 'Kolom :attribute harus berupa angka!'
        ];

        $validasi =$request->validate([
            'id_pelanggan' => 'required',
            'nama_dokumen' => 'required',
            'jenis_dokumen' => 'required',
            'status_dokumen' => 'required',
            'tgl_kirim_dokumen' => 'required',
            'tgl_ambil_dokumen' => 'required',
            'harga' => 'required'
        ],$messages);
        Dokumen::whereid_dokumen($id_dokumen)->update($validasi);
        return redirect('/admin')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dokumen)
    {
        Dokumen::whereid_dokumen($id_dokumen)->delete();
    return redirect('/admin')->with('success', 'Data berhasil diupdate!');
    }
}

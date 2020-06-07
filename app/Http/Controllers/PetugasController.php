<?php


namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PetugasController extends Controller
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
        $title='Petugas';
        $Petugas=Petugas::paginate(5);
        //dd($Petugas);
        return view('konten.homePetugas',compact('title','Petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Petugas baru';
        return view('konten.petugas',compact('title'));
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
            'id_user' =>'required',
            'tgl_tugas' => 'required',
            'shift' => 'required',
            'keterangan' => 'required',
        ],$messages);
        Petugas::create($validasi);
        return redirect('/petugas')->with('success', 'Data berhasil ditambahkan!');
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
        $title='Update Petugas';
        $Petugas=Petugas::find($id);
        return view('konten.petugas',compact('title','Petugas'));
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
        $messages = [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'date' => 'Kolom :attribute harus berupa tanggal!',
            'numeric' => 'Kolom :attribute harus berupa angka!'
        ];

        $validasi =$request->validate([
            'id_user' => 'required',
            'tgl_tugas' => 'required',
            'shift' => 'required',
            'keterangan' => 'required',
        ],$messages);
        Petugas::whereid_petugas($id)->update($validasi);
        return redirect('/petugas')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::whereid_petugas($id)->delete();
    return redirect('/petugas')->with('success', 'Data berhasil diupdate!');
    }
}

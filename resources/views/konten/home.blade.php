@extends('layouts.admin')

@section('isi')

<!-- Default box -->
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Judul : Aplikasi Media Cetak</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div class="col-lg-12">
      <a href="{{route('Dokumen.create')}}">Tambah Data</a>
      <table class="table table-bordered">
      <thead>
      <tr>
        <th>No</th>
        <th>Pelanggan</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Status</th>
        <th>Tanggal Kirim</th>
        <th>Tanggal Ambil</th>
        <th>Harga</th>
        <th>Aksi</th></tr>
      </thead>
      <tbody>
        @foreach ($Dokumen as $in=>$val)
        <tr>
          <td>{{($in+1)}}</td>
          <td>{{$val->id_pelanggan}}</td>
          <td>{{$val->nama_dokumen}}</td>
          <td>{{$val->jenis_dokumen}}</td>
          <td>{{$val->status_dokumen}}</td>
          <td>{{$val->tgl_kirim_dokumen}}</td>
          <td>{{$val->tgl_ambil_dokumen}}</td>
          <td>{{$val->harga}}</td>
          <td>
          <a href="{{route('Dokumen.edit',$val->id_dokumen)}}">Update</a>
          <form action="{{route('Dokumen.destroy', $val->id_dokumen)}}" method="POST">
            @csrf

            <button type="submit">Delete</button>
          </form>
          </td></tr>
        @endforeach
      </tbody>
      </table>
      {{$Dokumen->links()}}
      </div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

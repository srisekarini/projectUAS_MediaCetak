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
      <a href="{{route('Petugas.create')}}">Tambah Data</a>
      <table class="table table-bordered">
      <thead>

        <th>No</th>
        <th>Id User</th>
        <th>Tanggal Tugas</th>
        <th>Shift</th>
        <th>Keterangan</th>
        <th>Aksi</th>

      </thead>
      <tbody>
        @foreach ($Petugas as $in=>$val)
        <tr>
          <td>{{($in+1)}}</td>
          <td>{{$val->id_user}}</td>
          <td>{{$val->tgl_tugas}}</td>
          <td>{{$val->shift}}</td>
          <td>{{$val->keterangan}}</td>
          <td>
          <a href="{{route('Petugas.edit',$val->id_petugas)}}">Update</a>
          <form action="{{route('Petugas.destroy', $val->id_petugas)}}" method="POST">
            @csrf

            <button type="submit">Delete</button>
          </form>
          </td></tr>
        @endforeach
      </tbody>
      </table>
      {{$Petugas->links()}}
      </div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

@extends('layouts.admin')

@section('isi')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cetak Dokumen
        <small>silahkan cetak dokumen anda disini</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dokumen</a></li>
        <li class="active">Cetak</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Nama    : Ketut Sri Sekarini</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          NIM : 1815051054
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Program Studi : Pendidikan Teknik Informatika
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
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
        <th>Nama</th>
        <th>Jenis</th>
        <th>Aksi</th></tr>
      </thead>
      <tbody>
        @foreach ($Dokumen as $in=>$val)
        <tr>
          <td>{{($in+1)}}</td>
          <td>{{$val->nama}}</td>
          <td>{{$val->jenis}}</td>
          <td>
          <a href="{{route('Dokumen.edit',$val->id)}}">update</a>
          <form action="{{route('Dokumen.destroy', $val->id)}}" method="POST">
            @csrf

            <button type="submit">delete</button>
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

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
          <div class="content">
    <div class="panel panel-flat border-top-lg border-top-primary">
    <form action="{{(isset($Dokumen)) ? route ('Dokumen.update',$Dokumen->id_dokumen):route('Dokumen.store')}}" method="post">
    @csrf
    @if(isset($Dokumen))?@method('PUT')

    @endif
    <div class="panel-body">

    <div class="form-group">
		<label class="control-label col-lg-2">Id Pelanggan</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Dokumen))?$Dokumen->id_pelanggan:old('id_pelanggan')}}" name="id_pelanggan" class="form-control" required>
            @error('id_pelanggan')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

	<div class="form-group">
		<label class="control-label col-lg-2">Nama Dokumen</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Dokumen))?$Dokumen->nama_dokumen:old('nama_dokumen')}}" name="nama_dokumen" class="form-control" required>
            @error('nama_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-2">Jenis Dokumen</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Dokumen))?$Dokumen->jenis_dokumen:old('jenis_dokumen')}}" name="jenis_dokumen" class="form-control" required>
            @error('jenis_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

    <div class="form-group">
		<label class="control-label col-lg-2">Status Dokumen</label>
		<div class="col-lg10">
            <select class="form-control" name="status_dokumen" id="status_dokumen" value="{{(isset($Dokumen))?$Dokumen->status_dokumen:old('status_dokumen')}}">
            <option value="0">Pilih salah satu</option>
                <option value="selesai">Selesai</option>
            <option value="belum">Belum</option>
            <option value="pending">Pending</option>
            </select>

            @error('status_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

    <div class="form-group">
		<label class="control-label col-lg-2">Tanggal Kirim</label>
		<div class="col-lg10">
			<input type="datetime-local" value="{{(isset($Dokumen))?$Dokumen->tgl_kirim_dokumen:old('tgl_kirim_dokumen')}}" name="tgl_kirim_dokumen" class="form-control" required placeholder="tahun-bulan-hari jam:menit:detik">
            @error('tgl_kirim_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

    <div class="form-group">
		<label class="control-label col-lg-2">Tanggal Ambil</label>
		<div class="col-lg10">
			<input type="datetime-local" value="{{(isset($Dokumen))?$Dokumen->tgl_ambil_dokumen:old('tgl_ambil_dokumen')}}" name="tgl_ambil_dokumen" class="form-control" required placeholder="tahun-bulan-hari jam:menit:detik">
            @error('tgl_ambil_dokumen')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

    <div class="form-group">
		<label class="control-label col-lg-2">Harga</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Dokumen))?$Dokumen->harga:old('harga')}}" name="harga" class="form-control" required>
            @error('harga')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

	<div class="form-group">
	<button type="submit">SIMPAN</button>
    </div>
    </form>
    </div>
    </div>
</div>
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

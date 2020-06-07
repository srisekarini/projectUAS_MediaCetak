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
    <form action="{{(isset($Petugas)) ? route ('Petugas.update',$Petugas->id_petugas):route('Petugas.store')}}" method="post">
    @csrf
    @if(isset($Petugas))?@method('PUT')

    @endif
    <div class="panel-body">
	<div class="form-group">
		<label class="control-label col-lg-2">Id User</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Petugas))?$Petugas->id_user:old('id_user')}}" name="id_user" class="form-control">
            @error('id_user')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

    <div class="form-group">
		<label class="control-label col-lg-2">Tanggal Tugas</label>
		<div class="col-lg10">
			<input type="datetime-local" value="{{(isset($Petugas))?$Petugas->tgl_tugas:old('tgl_tugas')}}" name="tgl_tugas" class="form-control" required placeholder="tahun-bulan-hari jam:menit:detik">
            @error('tgl_tugas')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

	<div class="form-group">
		<label class="control-label col-lg-2">Shift</label>
		<div class="col-lg10">
			<select class="form-control" name="shift" id="shift" value="{{(isset($Petugas))?$Petugas->shift:old('shift')}}">
                <option value="0">Pilih salah satu</option>
                <option value="pagi">Pagi</option>
                <option value="malam">Malam</option>
            </select>
            @error('shift')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
    </div>

    <div class="form-group">
		<label class="control-label col-lg-2">Keterangan</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Petugas))?$Petugas->keterangan:old('keterangan')}}" name="keterangan" class="form-control">
            @error('keterangan')
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

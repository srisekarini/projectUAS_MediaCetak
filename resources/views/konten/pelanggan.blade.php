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
    <form action="{{(isset($Pelanggan)) ? route ('Pelanggan.update',$Pelanggan->id_user):route('Pelanggan.store')}}" method="post">
    @csrf
    @if(isset($Pelanggan))?@method('PUT')

    @endif
    <div class="panel-body">
	<div class="form-group">
		<label class="control-label col-lg-2">Id User</label>
		<div class="col-lg10">
			<input type="text" value="{{(isset($Pelanggan))?$Pelanggan->id_user:old('id_user')}}" name="id_user" class="form-control">
            @error('id_user')
                <small style="color:red">{{$message}}</small
            >@enderror
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-2">Jenis Pelanggan</label>
		<div class="col-lg10">
			<select class="form-control" name="jenis_pelanggan" id="jenis_pelanggan" value="{{(isset($Pelanggan))?$Pelanggan->jenis_pelanggan:old('jenis_pelanggan')}}">
                <option value="0">Pilih salah satu</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="umum">Umum</option>
            </select>
            @error('jenis_pelanggan')
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

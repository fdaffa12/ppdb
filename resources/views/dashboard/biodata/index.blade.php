@extends('dashboard.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

               @if($cek < 1)
               <form role="form" method="post" action="{{ url('biodata/'.\Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">No HP</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="No HP" name="no_hp">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" class="form-control datepicker" id="exampleInputPassword1" placeholder="Tanggal Lahir" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <textarea name="alamat" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Ijazah</label>
                      <input type="file" name="ijazah" class="form-control" id="exampleInputPassword1" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">KTP</label>
                      <input type="file" name="ktp" class="form-control" id="exampleInputPassword1" autocomplete="off">
                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>

                @else

                <form role="form" method="post" action="{{ url('biodata/'.\Auth::user()->id) }}"  enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">No HP</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" placeholder="No HP" name="no_hp" value="{{ $dt->no_hp }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <input type="text" name="tempat_lahir" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" value="{{ $dt->tempat_lahir }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" class="form-control datepicker" id="exampleInputPassword1" placeholder="Tanggal Lahir" autocomplete="off" value="{{ $dt->tanggal_lahir }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <textarea name="alamat" rows="5" class="form-control">{{ $dt->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Ijazah</label>
                      <input type="file" name="ijazah" class="form-control" id="exampleInputPassword1" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">KTP</label>
                      <input type="file" name="ktp" class="form-control" id="exampleInputPassword1" autocomplete="off">
                    </div>

                  </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>

                @endif

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection

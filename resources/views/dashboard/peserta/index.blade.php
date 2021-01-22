@extends('dashboard.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('peserta') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-refresh"></i> All Peserta</a>

                    <a href="{{ url('peserta/verifikasi') }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-refresh"></i> Di verfifikasi</a>

                    <a href="{{ url('peserta/belum-verifikasi') }}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-refresh"></i> Belum Di verfifikasi</a>
                </p>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>nisn</th>
                                <th>email</th>
                                <th>id registrasi</th>
                                <th>no hp</th>
                                <th>alamat</th>
                                <th>is melengkapi??</th>
                                <th>is verifikasi??</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->nisn }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->id_registrasi }}</td>
                                <td>{{ $dt->biodata_r->no_hp }}</td>
                                <td>{{ $dt->biodata_r->alamat }}</td>
                                @if($dt->biodata_r_count > 0)
                                <td>
                                    <label class="label label-success">Sudah Melengkapi</label>
                                </td>
                                @else
                                <td>
                                    <label class="label label-danger">Belum Melengkapi</label>
                                </td>
                                @endif

                                @if($dt->is_verifikasi == 1)
                                <td>
                                    <label class="label label-success">Sudah Diverifikasi</label>
                                </td>
                                @else
                                <td>
                                    <label class="label label-danger">Belum Diverifikasi</label>
                                </td>
                                @endif

                                <td>
                                    <p>
                                        <a href="{{ asset($dt->biodata_r->ijazah) }}" class="btn btn-xs btn-success" download="">Download Ijazah</a>

                                        <a href="{{ asset($dt->biodata_r->ktp) }}" class="btn btn-xs btn-warning" download="">Download KTP</a>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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

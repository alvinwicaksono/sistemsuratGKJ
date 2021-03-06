@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Bidang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Bidang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tabel Bidang</h3>
              <div class="text-right">
                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-add">
                    <i class="fas fa-users"></i> Tambah Bidang
                </a>
              </div>

              {{--    Modals Untuk Tambah Bidang--}}
              <div class="modal fade" id="modal-add">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Tambah Bidang</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="http://localhost:8000/api/bidang">
                                  @csrf
                                  <div>
                                      <label for="kode_bidang">Kode Bidang</label>
                                      <input type="text" class="form-control" id="recipient-name" name="kode_bidang"  placeholder="Kode Bidang">
                                  </div>

                                  <div>
                                      <label for="nama_bidang">Nama </label>
                                      <input type="text" class="form-control" id="nama_bidang" name="nama_bidang" placeholder="Nama Bidang">
                                  </div>

                          </div>
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-default float-right bg-gradient-info">Simpan</button>
                          </div>
                          </form>
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              {{--End Of Modals Add--}}
          </div>
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nomor</th>
                  <th>Kode Bidang</th>
                  <th>Nama Bidang</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($liat as $no => $item)
                <tr>
	                <td>{{ ++$no }}</td>
	                <td>{{ $item->kodebidang }}</td>
	                <td>{{ $item->namabidang }}</td>
	                <td>
                        <div class="text-left">
                          <a href="#" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-edit">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete">
                            <i class="fas fa-trash"></i>
                          </a>
                        </div>
                      </div>
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
  <div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Surat</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md6">
              <p>Tgl Surat </p> <!-- tanggal surat dari admin/input -->
              <p>Nomor Surat</p>
              <p>Diterukan kepada </p>
              <p>Kecepatan</p>
              <p>Isi Rekomendasi</p>
              <br>
              <p>Telah diperiksa</p>
            </div>
            <div class="col-md6">
              <p>: 12 April 2020</p>
              <p>: SK/2020/B1/SB102/1001</p> <!-- belum dikirimkan/belum diacc maka tidak muncul -->
              <p>: Admin</p>
              <p>: Biasa</p>
              <p>: Segera Buat Surat Tugas Untuk<br>
              Pdt. Aris Widaryanto</p>
              <p>: Pdt. Sundoyo(sekum)</p> <!-- belum diacc/divalidasi maka tidak muncul -->
            </div>
          </div>


        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</section>
<!-- DataTables -->
@endsection

@section('javascripts')
<!-- DataTables -->
<script src="{{url('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

@endsection






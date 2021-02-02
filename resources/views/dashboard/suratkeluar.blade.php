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
        <h1 class="m-0 text-dark">Surat Keluar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Surat Keluar</li>
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
            <h3 class="card-title">Daftar Surat Keluar</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal Agenda</th>
                  <th>Nomor Surat; file</th>
                  <th>Perihal; Penerima</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>20/10/2020</td>
                  <td>SM/2020/B1/SB101/1
                    <br>
                    <!--lampiran surat masuk -->
                    attachment :
                    <div class="text-left">
                      <a href="#" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i>Lampiran
                      </a>
                    </div>
                    <!--export surat menjadi PDF -->
                    format surat :
                    <div class="text-left">
                      <a href="#" class="btn btn-sm bg-info"> <i class="fas fa-file-pdf"></i> Download as pdf
                      </a>
                    </div>
                  </td>
                  <td>Rapat Koordinasi BPH<br>
                    Penerima : Kabag
                  </td>
                  <td>
                    <button type="button" class="btn btn-block bg-gradient-success btn-sm ">Sudah diperiksa dan setuju</button>
                    <button type="button" class="btn btn-block bg-gradient-info btn-sm">Sudah Dikirim</button><br>
                  </td>
                  <td>
                    <div class="text-left">
                      <a href="{{url('tsuratkeluar')}}" class="btn btn-sm bg-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#modal-detail">
                        <i class="fas fa-th-large"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-blue">
                        <i class="fas fa-print"></i>
                      </a> 
                      <a href="#" class="btn btn-sm bg-blue">
                        <i class="fas fa-plane"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>20/10/2020</td>
                  <td>SM/2020/B1/SB101/1
                    <br>
                    <!--lampiran surat masuk -->
                    attachment :
                    <div class="text-left">
                      <a href="#" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i> Lampiran
                      </a>
                    </div>
                    <!--export surat menjadi PDF -->
                    format surat :
                    <div class="text-left">
                      <a href="#" class="btn btn-sm bg-info"> <i class="fas fa-file-pdf"></i> Download as pdf
                      </a>
                    </div>
                  </td>
                  <td>Rapat Koordinasi BPH<br>
                    Penerima : Kabag
                  </td>
                  <td><button type="button" class="btn btn-block bg-gradient-danger btn-sm ">Belum Diperiksa</button>
                    <button type="button" class="btn btn-block bg-gradient-secondary btn-sm">belum dikirim</button><br>
                  </td>
                  <td>
                    <div class="text-left">
                      <a href="{{url('tsuratkeluar')}}" class="btn btn-sm bg-warning">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#modal-detail">
                        <i class="fas fa-th-large"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete">
                        <i class="fas fa-trash"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-blue">
                        <i class="fas fa-print"></i>
                      </a>
                      <a href="#" class="btn btn-sm bg-blue" data-toggle="modal" data-target="#modal-kirim">
                        <i class="fas fa-plane"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- /.modal-dialog -->

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
              <p>Unit pengiriman </p>
              <p>Di buat oleh </p>
              <p>Tgl Surat </p>
              <p>Nomor Surat</p>
              <p>Penerima/p>
                <p>Perihal </p>
                <p>Kecepatan</p>
                <p>Telah diperiksa oleh</p>
              </div>  
              <div class="col-md6">
                <p>: Sinode GKJ</p>
                <p>: Fajar</p> <!-- stamp  user login-->
                <p>: 12 April 2020</p>
                <p>: SK/2020/B1/SB102/1001</p> <!-- belum dikirimkan/belum diacc maka tidak muncul -->
                <p>: GKJ Salatiga</p>
                <p>: Rapat Koordinasi Rutin</p>
                <p>: Biasa</p>
                <p>: Pdt. Sundoyo(sekum)</p> <!-- belum diacc/divalidasi maka tidak muncul -->
              </div>  
            </div>



          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-delete">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus</h4>
          </div>
          <div class="modal-body">
            Apakah Anda Yakin akan menghapus item ini ?
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-kirim">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Kirim Surat</h4>
          </div>
        <div class="modal-body">
          <form>
            <div>
              <label for="nomorsurat">Nomor Surat</label>
              <input type="text" class="form-control" id="recipient-name" disabled placeholder="SM/2020/B1/SB101/2">
            </div>
            <div>
              <label for="tanggaldokumen">Tanggal Kirim</label>
              <input type="date" class="form-control" id="tgldokumen" >
            </div>
            <div>
              <label for="namasurat">Model Pengiriman</label>
              <select class="form-control">
                  <option>- Metode Pengiriman - </option>
                  <option value="2">Email</option>
                  <option value="3">Pos</option>
                  <option value="4">JNE</option>
                  <option value="5">JNE</option>
                  <option value="6">Langsung</option>
                </select>
            </div>
            <div>
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email_penerima" placeholder="Email">
            </div>
            <div>
              <label for="sumber">Alamat Pengiriman</label>
              <input type="text" class="form-control" id="alamat_penerima" placeholder="alamat">
            </div>
            
            <div>
              <label for="nomorsurat">Tgl Surat</label>
              <input type="text" class="form-control" id="tgl-surat" disabled placeholder="19/10/2020">
            </div>
          </form>
          
        </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-info">Kirim</button>
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
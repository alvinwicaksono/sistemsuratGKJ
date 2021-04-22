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
        <h1 class="m-0 text-dark">Surat Masuk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Surat Masuk</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid ">
      <h5 class="mb-2">Status Surat</h5>
      <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
              <a  @if($waiting==0)
                  href=""
                  @else
                  href="{{route('sm-sekum-desposisi')}}"
                  @endif class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                  <div class="info-box-content">
                      <span class="info-box-text" style="color: black">Menunggu Desposisi</span>
                      <span class="info-box-number text-bold" style="color: black">{{$waiting}}</span>
                  </div>
                  <!-- /.info-box-content -->
              </a>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
              <a @if($selesai==0)
                 href=""
                 @else
                    href="{{route('sm-sekum-selesai')}}"
                 @endif class="info-box" >
                  <span class="info-box-icon bg-danger"><i class="far fa-clock"></i></span>

                  <div class="info-box-content">
                      <span class="info-box-text" style="color: black">Sudah Terdesposisi</span>
                      <span class="info-box-number text-bold" style="color: black" >{{$selesai}}</span>
                  </div>
                  <!-- /.info-box-content -->
              </a>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
      </div>

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

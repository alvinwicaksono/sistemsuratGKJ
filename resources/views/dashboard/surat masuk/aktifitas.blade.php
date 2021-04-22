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
        <h1 class="m-0 text-dark">Aktifitas Surat</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Surat Masuk Teregistrasi</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
  <div class="container-fluid ">
    <div class="row">
      <div class="col-12 ">
          <div class="card table-responsive">
              <div class="card-header">
                  <h3 class="card-title">Aktifitas surat</h3>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr class=" text-center">
                          <th>No</th>
                          <th>Status</th>
                          <th>Oleh</th>
                          <th>Pada</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($hasil as $no => $item)
                          <tr>
                              <td>{{ $no+1 }}</td>
                              <td>{{ $item['status'] }}</td>
                              <td>{{$item['Oleh']}}</td>
                              <td>{{ date('d F Y', strtotime($item['pada']))}} Pukul  {{ date('h:i:sa', strtotime($item['pada']))}} </td>
                          </tr>
                      @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
    </div>
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
</div>
</section>
<!-- DataTables -->
@endsection


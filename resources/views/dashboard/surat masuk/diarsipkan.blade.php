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
        <h1 class="m-0 text-dark">Disposisi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Disposisi Masuk</li>
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
            <h3 class="card-title">Daftar Disposisi Masuk</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Asal Surat <br>Isi Disposisi</th>
                  <th>instruksi<br>Perihal</th>
                  <th>Kecepatan<br> Deadline</th>
                  <th>Aksi</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              @foreach($hasil['data'] as $no => $item)
                <tr>
                  <td>{{$item['sumber_surat']}}<br>{{$item['isi_desposisi']}}</td>
                  <td>{{$item['instruksi']}}<br>
                    Perihal : {{$item['perihal']}}<br>
                    <div class="text-left">
                        <a href="http://localhost:8000/api/lampiran/{{$item['suratmasuk_id']}}" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i>Lihat Surat
                      </a>
                    </div>
                  </td>

                  <td><strong>{{$item['kecepatan']}}</strong><br>
                      {{$item['tgl_selesai']}}
                  </td>
                  <td>
                   <div class="text-left">
                    <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#modal-detail-{{$item['id']}}">
                      <i class="fas fa-th-large"> Detail</i>
                    </a>

                       <div class="modal fade" id="modal-detail-{{$item['id']}}">
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
                                               <p>Isi Desposisi</p>

                                               <p>Telah diperiksa</p>
                                           </div>
                                           <div class="col-md6">
                                               <p>: {{$item['tgl_dokumen']}}</p>
                                               <p>:{{$item['nomor_surat']}}</p> <!-- belum dikirimkan/belum diacc maka tidak muncul -->
                                               <p>: {{$item['penerima']}}</p>
                                               <p>: {{$item['kecepatan']}}</p>
                                               <p>: {{$item['isi_desposisi']}} </p>
                                               <p>: {{$item['Oleh']}}</p> <!-- belum diacc/divalidasi maka tidak muncul -->
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

                       <form method="post" action="http://localhost:8000/api/selesai" >
                           @csrf
                           <input type="hidden" name="suratmasuk_id" value="{{$item['suratmasuk_id']}}">
                           <input type="hidden" name="desposisimasuk_id" value="{{$item['desposisimasuk_id']}}">
                           <button type="submit" class="btn btn-sm btn-block mt-2 bg-gradient-info" onclick="return confirm('Apakah anda yakin akan menyelesaikan surat?')"></i>Selesai</button>
                       </form>

                   </div>
                </td>
                <td>
                   <div class="text-left">
                       <a href="/aktifitas/{{$item['suratmasuk_id']}}" type="button" class="btn btn-sm btn-block bg-gradient-success"><i class="fas fa-eye">{{$item['status']}}</i></a>
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



  <div class="modal fade" id="modal-status">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Status</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md6">
             <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="customSwitch3">
                      <label class="custom-control-label" for="customSwitch3">Klik Untuk Merubah Status menjadi Telah Selesai</label>
                    </div>
                  </div>
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

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
        <h1 class="m-0 text-dark">Surat Masuk Teregistrasi</h1>
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
                  <h3 class="card-title">Daftar Surat Teregistrasi</h3>
              </div>
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr class=" text-center">
                          <th>Tgl. Terima</th>
                          <th>Nomor Surat</th>
                          <th>Nama Surat</th>
                          <th>Perihal<br>Sumber Surat</th>
                          <th>Aksi</th>
                          <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($hasil as $no => $item)
                          <tr>
                              <td>{{ $item['tgl_masuk'] }}</td>
                              <td>{{ $item['nomor_surat'] }}</td>
                              <td>{{$item['nama_surat']}}</td>
                              <td>{{ $item['perihal'] }}<br>
                                  dari : {{ $item['sumber_surat'] }}
                                  <div class="text-left">
                                      <a href="http://localhost:8000/api/lampiran/{{$item['suratmasuk_id']}}" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i>Lihat Surat
                                      </a>
                                  </div>
                              </td>
                              <td>
                                  <div class="text-left">
                                      <div class="text-left">
                                          {{--    Fungsi Edit--}}
                                          <a href="#" class="btn btn-sm bg-warning" data-toggle="modal" data-target="#modal-edit-{{$item['id']}}">
                                              <i class="fas fa-edit"></i>
                                          </a>

                                    {{--Modals Edit--}}
                                          <div class="modal fade" id="modal-edit-{{$item['id']}}">
                                              <div class="modal-dialog">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 class="modal-title">Edit Surat</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form method="post" action="http://localhost:8000/registrasi/edit">
                                                              @csrf
                                                              <input type="hidden" name="suratmasuk_id" value="{{$item['suratmasuk_id']}}">
                                                              <div>
                                                                  <label for="nomorsurat">Nomor Surat</label>
                                                                  <input type="text" class="form-control" name="nomor_surat" id="recipient-name" disabled placeholder="{{$item['nomor_surat']}}" value="{{$item['nomor_surat']}}">
                                                              </div>
                                                              <div>
                                                                  <label for="tanggaldokumen">Tanggal Dokumen</label>
                                                                  <input type="date" class="form-control" id="tgldokumen" name="tgl_dokumen" value="{{$item['tgl_dokumen']}}" >
                                                              </div>
                                                              <div>
                                                                  <label for="namasurat">Nama Surat</label>
                                                                  <input type="text" class="form-control" id="nama_surat" name="nama_surat" value="{{$item['nama_surat']}}" placeholder="Nama Surat">
                                                              </div>
                                                              <div>
                                                                  <label for="perihal">Perihal</label>
                                                                  <input type="text" class="form-control" id="perihal" name="perihal" value="{{$item['perihal']}}" placeholder="Perihal">
                                                              </div>
                                                              <div>
                                                                  <label for="sumber">Sumber</label>
                                                                  <input type="text" class="form-control" id="sumber_surat" name="sumber_surat" value="{{$item['sumber_surat']}}" placeholder="Asal Surat">
                                                              </div>
                                                              <div>
                                                                  <label for="isi">Isi Surat</label>
                                                                  <textarea type="text" class="form-control" id="isi_surat" name="isi_surat" placeholder="Isi Surat">{{$item['sumber_surat']}}</textarea>
                                                              </div>

                                                              <div>
                                                                  <label for="tgl_masuk">Tgl Masuk</label>
                                                                  <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" value="{{$item['tgl_masuk']}}"   disabled placeholder="19/10/2020">
                                                              </div>
                                                          </form>

                                                      </div>
                                                      <div class="modal-footer justify-content-between">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-default float-right bg-gradient-info" >Simpan</button>
                                                      </div>
                                                  </div>
                                                  <!-- /.modal-content -->
                                              </div>
                                              <!-- /.modal-dialog -->
                                          </div>

                                        {{--Fungsi Detail--}}
                                          <a href="#" class="btn btn-sm bg-teal" data-toggle="modal" data-target="#modal-detail-{{$item['id']}}">
                                              <i class="fas fa-eye"></i>
                                          </a>

                                    {{-- Modals Detail--}}
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
                                                              <div class="col-lg6">
                                                                  <p>Tanggal</p>
                                                                  <p>Nomor Surat </p>
                                                                  <p>Perihal </p>
                                                                  <p>Asal Surat</p>
                                                                  <p>Isi Surat</p>
                                                                  <p>Prioritas</p>
                                                                  <p>Format</p>
                                                                  <p>Admin</p>
                                                              </div>
                                                              <div class="col-lg6">
                                                                  <p>: {{$item['tgl_dokumen']}}</p>
                                                                  <p>: {{$item['nomor_surat']}}</p>
                                                                  <p>: {{$item['perihal']}}</p>
                                                                  <p>: {{$item['sumber_surat']}}</p>
                                                                  <p>: {{$item['isi_surat']}}</p>
                                                                  <p>: {{$item['prioritas']}}</p>
                                                                  <p>: {{$item['format']}}</p>
                                                                  <p>: {{$item['Oleh']}}</p>
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


                                          <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-delete">
                                              <i class="fas fa-trash"></i>
                                          </a>
                                      </div>
                                  </div>
                                  <form method="post" action="http://localhost:8000/api/waiting" >
                                      @csrf
                                      <input type="hidden" name="suratmasuk_id" value="{{$item['suratmasuk_id']}}">
                                      <button type="submit" class="btn btn-sm btn-block mt-2 bg-gradient-info" onclick="return confirm('Apakah anda yakin akan mengirim surat?')"></i>Kirim</button>
                                  </form>

                              </td>
                              <td>
                                  <a href="/aktifitas/{{$item['suratmasuk_id']}}" type="button" class="btn btn-sm btn-block bg-gradient-success"><i class="fas fa-eye">{{$item['status']}}</i></a>
{{--                                  <button type="button" class="btn btn-sm btn-block bg-gradient-info"><i class="fas fa-thumbs-up"></i></button>--}}
                              </td>
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

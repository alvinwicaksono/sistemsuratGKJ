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
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Daftar Surat Masuk</h3>
          </div>
          <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tgl. Terima</th>
                  <th>Nomor Surat</th>
                  <th>Perihal</th>
                  <th>Pengirim, Penerima</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
              @foreach($hasil['data'] as $no => $item)
                <tr>
                    <td>{{ $item['tgl_masuk'] }}</td>
                    <td>{{ $item['nomor_surat'] }}</td>
                  <td>{{ $item['perihal'] }}<br>
                    <div class="text-left">
                        <a href="http://localhost:8000/api/lampiran/{{$item['suratmasuk_id']}}" class="btn btn-sm bg-warning"> <i class="fas fa-paperclip"></i>Lihat Surat
                      </a>
                    </div>
                  </td>
                  <td>Dari     : {{ $item['sumber_surat'] }}<br>
                  </td>

                  <td>
                    <a href="/aktifitas/{{$item['suratmasuk_id']}}" type="button" class="btn bt-xm btn-block bg-gradient-danger">{{ $item['status'] }}</a>
                  </td>
                  <td>
                    <div class="text-left">

                      <a href="#" class="btn btn-sm bg-danger" data-toggle="modal" data-target="#modal-disposisi-{{$item['id']}}">
                        <i class="fas fa-thumbs-up"></i>
                      </a>
                        <div class="modal fade" id="modal-disposisi-{{$item['id']}}" data-target="#modal-xl">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Disposisikan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <H4>Detail Surat</H4>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Tanggal Surat</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['tgl_masuk'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Perihal</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['perihal'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Asal Surat</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['sumber_surat'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="lembaga" class="col-form-label">Lembaga</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input list="lembaga" name="lembaga" class="form-control" placeholder="Pilih Lembaga">
                                                        <datalist id="lembaga">

                                                            @foreach($lembaga as $lembaga)
                                                                <option value="{{$lembaga['NamaLembaga']}}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="subbidang" class="col-form-label">Sub Bidang</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input list="tsubbidang" name="subbidang" class="form-control" placeholder="Pilih Sub Bidang">
                                                        <datalist id="tsubbidang">
                                                            <option>-- Pilih Subbidang --</option>
                                                            @foreach($tsubbidang as $tsubbidang)
                                                                <option value="{{$tsubbidang['nama_subBidang']}}"></option>
                                                            @endforeach
                                                        </datalist>

                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="box" class="col-form-label">Box</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input list="box" name="box" class="form-control" placeholder="Pilih Box">
                                                        <datalist id="box">

                                                            @foreach($box as $box)
                                                                <option value="{{$box['NamaBox']}}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="format" class="col-form-label">Format</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input list="formats" name="formats" class="form-control" placeholder="Pilih Format">
                                                        <datalist id="formats">
                                                            @foreach($formats as $formats)
                                                                <option value="{{$formats['NamaFormat']}}"></option>
                                                            @endforeach
                                                        </datalist>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Isi Surat</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['isi_surat'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Prioritas</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['prioritas'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Admin</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>: {{ $item['Oleh'] }}</p>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <H4>Form Disposisi Surat</H4>
                                                <form method="POST" action="http://localhost:8000/api/arsip">
                                                    @csrf
                                                    <input type="hidden" name="suratmasuk_id" value="{{$item['suratmasuk_id']}}">
                                                    <div class="form-group row">

                                                        <div class="col-md-4">
                                                            <label for="penerima" class="col-form-label">Penerima Surat</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="penerima_id" id="penerima" required>
                                                                <option selected>-- Pilih Penerima --</option>
                                                                @foreach($lembaga as $no => $hasil)
                                                                <option value="{{$hasil['ID']}}">{{$hasil['NamaLembaga']}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="pic" class="col-form-label">PIC</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" id="pic" name="pic" placeholder="PIC">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="instruksi" class="col-form-label">Instruksi</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="instruksi" required>
                                                                <option>-- Pilih Instruksi --</option>
                                                                <option value="Arsipkan">Arsipkan</option>
                                                                <option value="Ditindaklanjuti">Ditindaklanjuti</option>
                                                                <option value="Ditanggapi Tertulis">Ditanggapi Tertulis</option>
                                                                <option value="Siapkan makalah/sambutan/presentasi sesuai tema">Siapkan makalah/sambutan/presentasi sesuai tema</option>
                                                                <option value="Koordinasikan">Koordinasikan</option>
                                                                <option value="Diwakili & Laporkan Haislnya">Diwakili & Laporkan Haislnya</option>
                                                                <option value="Dihadiri & laporkan Hasilnya">Dihadiri & laporkan Hasilnya</option>
                                                                <option value="Disiapkan Surat/Memo Dinas<">Disiapkan Surat/Memo Dinas</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="nomorsurat" class="col-form-label">Isi Desposisi</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <textarea class="form-control" rows="3" placeholder="Isi Surat" name="isi_desposisi" required></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="nomorsurat" class="col-form-label">Kecepatan</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <select class="form-control" name="kecepatan" required>
                                                                <option>-- Pilih Kecepatan --</option>
                                                                <option value="Sangat Cepat">Sangat Cepat</option>
                                                                <option value="Segera">Segera</option>
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Koordinasikan">Koordinasikan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="tgl_selesai" class="col-form-label">Tanggal Selesai</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="arsip" class="col-form-label">Arsipkan</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="checkbox" value="1" class="form-control" id="arsip" name="arsip">
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>



                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
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

@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('AdminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Surat Masuk</h1>

<!-- Alert jika Surat Berhasil diinputkan -->
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Surat Berhasil diinputkan</h5>
                </div>

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
    <section class="content">
    <div class="container-fluid">
      	<div class="row">
            <div class="col-lg-12">
                <div class="card">
              		<div class="card-header">
                	<h3 class="card-title">Tambah Surat Masuk</h3>
              		</div>
              		 <div class="card-body">
					<form class="form-horizontal" method="post" action="http://localhost:8000/api/registrasi" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value={{\Illuminate\Support\Facades\Auth::id()}}>
                <div class="card-body">
                  <div class="form-group row">
{{--                      <div class="col-sm-2">--}}
{{--                        <label for="nomor_surat" class="col-form-label">Nomor Surat</label>--}}
{{--                      </div>--}}
{{--                      <div class="col-sm-4">--}}
{{--                        <input type="text" class="form-control" name="nomor_surat" id="nomor_surat" placeholder="Auto Generate -Format:SM/2020/B1/SB101/1" >--}}
{{--                      </div>--}}
                    <div class="col-sm-2">
                      <label for="tgl_dokumen" class="col-form-label">Tanggal Dokumen</label>
                    </div>
                     <div class="col-sm-4">
                      <input type="date" class="form-control" name="tgl_dokumen" id="tgl_dokumen" placeholder="Tanggal Surat" required>
                    </div>
{{--                  </div>--}}
<!--
  Bidang dan Sub Bidang merupakan dependent dropdown
    Setelah memili Bidang maka sub bidang akan mengikuti bidang yang akan dipilih
-->
{{--                  <div class="form-group row">--}}
{{--                    <div class="col-sm-2">--}}
{{--                      <label for="bidang" class="col-form-label">Bidang</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-4">--}}
{{--                      <select class="form-control" name="bidang" id="bidang">--}}
{{--                          <option selected>-- Pilih Bidang --</option>--}}
{{--                          @foreach($bidang['data'] as $bidang)--}}
{{--                        <option value="{{$bidang['id']}}">{{$bidang['nama_bidang']}}</option>--}}
{{--                          @endforeach--}}
{{--                      </select>--}}
{{--                    </div>--}}
                    <div class="col-sm-2">
                      <label for="subbidang" class="col-form-label">Sub Bidang</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="subBidang_id" id="subcategory">
                          <option selected>-- Pilih SubBidang --</option>
                          @foreach($subBidang['data'] as $subBidang)
                              <option value="{{$subBidang['id']}}">{{$subBidang['bidang']}} - {{$subBidang['nama_subBidang']}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
{{--                    <button type="submit">Generate Nomor Surat</button>--}}
{{--                    <hr>--}}

                  <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="namasurat" class="col-form-label">Nama Surat</label>
                    </div>
                     <div class="col-sm-4">
                       <input type="text" class="form-control" name="nama_surat" id="namasurat" placeholder="Judul/ Nama Surat" required>
                    </div>

                    <div class="col-sm-2">
                      <label for="sumbersurat" class="col-form-label">Sumber Surat</label>
                    </div>
                     <div class="col-sm-4">
                      <input type="text" class="form-control" name="sumber_surat" id="sumbersurat" placeholder="Asal Surat Masuk dari ...." required>
                    </div>
                  </div>

                   <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="inputEmail3" class="col-form-label">Perihal</label>
                    </div>
                     <div class="col-sm-4">
                      <input type="text" class="form-control" name="perihal" id="Perihal" placeholder="Perihal Surat ...." required>
                    </div>
                    <div class="col-sm-2">
                      <label for="nosurat" class="col-form-label">Tanggal Masuk</label>
                    </div>
                     <div class="col-sm-4">
                       <input type="text" class="form-control" id="Tglmasuk" placeholder="Date Now/timestamp" disabled>
                    </div>
                  </div>
  					      <div class="form-group row">
                      <div class="col-sm-2">
                        <label for="isi" class="col-form-label">Isi Surat</label>

                      </div>
                      <div class="col-sm-10">
                        <textarea class="form-control" rows="4" name="isi_surat" placeholder="Isi Surat Masuk" required></textarea>
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="exampleInputFile" class="col-form-label">File input</label>
                    </div>
                    <div class="col-sm-10">
                      <div class="custom-file">
                        <input type="file" class="form-control" name="file" id="file" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="format" class="col-form-label">Format</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="formats" >
                        <option>- Pilih Format - </option>
                        <option value="Bandel">Bandel</option>
                        <option value="Buku">Buku</option>
                        <option value="Laporan">Laporan</option>
                        <option value="Akta">Akta</option>
                        <option value="Daftar">Daftar</option>
                        <option value="Buletin">Buletin</option>
                        <option value="Artikel">Artikel</option>
                        <option value="Foto">Foto</option>
                        <option value="Naskah">Naskah</option>
                        <option value="Data">Data</option>
                        <option value="Surat">Surat</option>
                        <option value="Liturgi">Liturgi</option>
                        <option value="Kaset">Kaset</option>
                        <option value="Proposal">Proposal</option>
                        <option value="Jadwal">Jadwal</option>
                        <option value="Gambar">Gambar</option>
                        <option value="Formulir">Formulir</option>
                        <option value="Majalah">Majalah</option>
                        <option value="Koran">Koran</option>
                        <option value="Kliping">Kliping</option>
                        <option value="Telegram">Telegram</option>
                        <option value="Memo">Memo</option>
                        <option value="Wasel">Wasel</option>
                        <option value="Kwitansi">Kwitansi</option>
                        <option value="Bagan">Bagan</option>
                        <option value="Makalah">Makalah</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <label for="Prioritas" class="col-form-label">Prioritas</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="prioritas">
                        <option>-- Pilih Prioritas --</option>
                        <option>Sangat Penting</option>
                        <option>Segera</option>
                        <option>Biasa</option>
                      </select>
                    </div>

                    <!--

                      Jika sudah Input Form akan muncul Option Keterangan :
                      <div class="col-sm-2">
                        <label for="Keterangan" class="col-form-label">Prioritas</label>
                      </div>
                      <div class="col-sm-4">
                        <select class="form-control">\
                          <option>Dibalas</option>
                          <option>Tidak dibalas</option>
                        </select>
                      </div>

                      <div class="col-sm-2">
                      <label for="tgldokumen" class="col-form-label">Tanggal Dokumen</label>
                    </div>
                     <div class="col-sm-4">
                      <input type="date" class="form-control" id="tgldokumen" placeholder="Tanggal Surat">
                    </div>
                    -->

                  </div>
                  <div class="card-footer">
  		              <div class="text-left">
                      <button class="btn btn-lg bg-info float-right" type="submit"><i class="fas fa-save"></i> Simpan</button>
                      <button class="btn btn-lg bg-danger " type="reset"><i class="fas fa-window-close"></i> Batal</button>
                    </div>
  	              </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {
        $('#bidang').on('change',function(e) {
            var cat_id = e.target.value;
            $.ajax({
                url:"{{ route('subcat') }}",
                type:"POST",
                data: {
                    bidang: bidang
                },
                success:function (data) {
                    $('#subcategory').empty();
                    $.each(data.subcategories[0].subcategories,function(index,subcategory){
                        $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                    })
                }
            })
        });
    });
</script>

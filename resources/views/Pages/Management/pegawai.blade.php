@extends('layouts.app')
@section('title', 'Pegawai')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>DATA PEGAWAI</b></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <button type="button" class="btn btn-outline-primary btn-sm btn-tambahPegawai"><i
                                        class="fa fa-plus"></i>
                                    TAMBAH PEGAWAI</button>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tablePegawai" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIP</th>
                                            <th>NAMA</th>
                                            <th>JABATAN</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="mdTambahPegawai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title"><b>TAMBAH PEGAWAI</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="storePegawai" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NIP PEGAWAI</label>
                                    <input type="text" name="nip" class="form-control" placeholder="Masukan NIP"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">NAMA PEGAWAI</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">JENIS KELAMIM PEGAWAI</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="jeniskelamin"
                                        aria-placeholder="Pilih Jenis Kelamin" required>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">AGAMA PEGAWAI</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="agama"
                                        aria-placeholder="Pilih Agama" required>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN">KRISTEN</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDHA">BUDHA</option>
                                        <option value="KATHOLIK">KATHOLIK</option>
                                        <option value="KONGHUCHU">KONGHUCHU</option>
                                        <option value="KEPERCAYAAN KEPADA TUHAN YANG MAHA ESA">Kepercayaan Kepada Tuhan Yang
                                            Maha Esa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TEMPAT LAHIR PEGAWAI</label>
                                    <input type="text" name="tempat" class="form-control"
                                        placeholder="Masukan Tempat Lahir" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">TANGGAL LAHIR PEGAWAI</label>
                                    <input type="date" name="tanggal" class="form-control"
                                        placeholder="Masukan Tanggal Lahir" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="exampleInputEmail1">JABATAN PEGAWAI</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="jabatan" required>
                                        <option value="1"> DIREKTUR</option>
                                        <option value="8"> MARKETING</option>
                                        <option value="9"> KEUANGAN</option>
                                        <option value="11"> PRODUKSI</option>
                                        <option value="12"> PERPAJAKAN</option>
                                        <option value="13"> ADMINISTRASI</option>
                                        <option value="15"> STAFF</option>
                                        <option value="16"> KOMISARIS</option>
                                        <option value="17"> KELEMBAGAAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">KONTAK PEGAWAI</label>
                                    <input type="text" name="kontak" class="form-control"
                                        placeholder="Masukan Kontak" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input"
                                                id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile bg-green">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <p class="text-danger"><i><b>* Format Foto Harus JPG/PNG</b></i></p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">STATUS</label>
                                    <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                                        <option value="AKTIF"> AKTIF</option>
                                        <option value="NON AKTIF"> NON AKTIF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ALAMAT PEGAWAI</label>
                            <textarea class="form-control" rows="4" name="alamat" placeholder="Masukan Alamat" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><b>CLOSE</b></button>
                        <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <div class="modal fade" id="mdEditPegawai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title"><b>EDIT PEGAWAI</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="storeEditPegawai" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID</label>
                            <input type="text" class="form-control" name="id" id="editid" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">JABATAN</label>
                            <input type="text" class="form-control" name="jabatan" id="editjabatan" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><b>CLOSE</b></button>
                        <button type="submit" class="btn btn-primary"><b>SIMPAN</b></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/pegawai.js"></script>
@endsection

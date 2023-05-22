@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Ulang</h1>
            <div class="section-header-breadcrumb">
                Daftar Ulang
            </div>
        </div>
        @if (Auth::user()->role == 'user')
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
        @endif

        <div class="section-body">
            <h3 class="section-title">Daftar Ulang</h3>
            <p>File yang diupload berupa Image(jpg, jpeg, png)</p>
            <form action="{{ route('daftar-ulang.store') }}" method="Post" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="skl">Surat Keterangan Lulus</label>
                                <input type="file" name="skl" id="skl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sk">Surat Kesehatan</label>
                                <input type="file" name="sk" id="sk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="san">Surat Anti Narkoba</label>
                                <input type="file" name="san" id="san" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Nasabah</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $daftarUlang->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="norek">No Rekening</label>
                                <input type="text" name="norek" id="norek" class="form-control"
                                    value="{{ $daftarUlang->norek }}" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Kirim</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </section>
    <script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
@endsection

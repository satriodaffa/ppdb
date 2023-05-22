@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Data Daftar Ulang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Data Daftar Ulang</div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="section-body">
            <h3 class="section-title">Data Daftar Ulang</h3>
            <table id="data-admin" class="table table-striped table-bordered table-md"
                style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>No Rekening</th>
                        <th>Surat Keterangan Lulus</th>
                        <th>Surat Kesehatan</th>
                        <th>Surat Anti Narkoba</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->norek }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $item->skl) }}" alt="surat keterangan lulus" width="150px">
                            </td>
                            <td>
                                <img src="{{ asset('uploads/' . $item->sk) }}" alt="surat keterangan lulus" width="150px">
                            </td>
                            <td>
                                <img src="{{ asset('uploads/' . $item->san) }}" alt="surat keterangan lulus" width="150px">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
@endsection

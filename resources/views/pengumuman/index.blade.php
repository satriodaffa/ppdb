@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengumuman</h1>
            <div class="section-header-breadcrumb">
            </div>
        </div>
        <div class="section-body">
            <h3 class="section-title">Pengumuman Mengenai PPDB</h3>
        </div>

        @if (isset($item->status))
            @if ($item->status == 'Aktif')
                <div class="alert alert-warning">
                    Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya
                </div>
            @elseif($item->status == 'Nonaktif')
                <div class="alert alert-info">
                    Pembayaran sudah diverifikasi
                </div>
            @else($item->status == 'Pending')
                <div class="alert alert-danger">
                    Pembayaran ditolak, Silahkan Melakukan Pembayaran Ulang
                </div>
            @endif
        @endif

        @if (isset($wawancara->status))
            @if ($wawancara->status == 'Diterima')
                <div class="alert alert-success">
                    Selamat, Anda diterima di SMK Wikrama Bogor! Silahkan lakukan daftar ulang di menu pendaftaran
                    ulang!
                </div>
            @elseif($wawancara->status == 'Diterima')
                <div class="alert alert-danger">
                    Mohon maaf, pendaftaran Anda kami tolak!
                </div>
            @else
                <div></div>
            @endif
        @endif
    </section>
    <script src="../../assets/admin/dataTables/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/admin/dataTables/js/dataTables.bootstrap4.min.js"></script>
@endsection

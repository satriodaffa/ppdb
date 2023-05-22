@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Virtual Account</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Virtual Account</div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="section-body">
            <h3 class="section-title">Virtual Account</h3>
            <a href="{{ route('virtual-account.create') }}" class="btn btn-success">Create</a>
            <table id="data-admin" class="table table-striped table-bordered table-md"
                style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Nama Nasabah</th>
                        <th>Nomor Rekening</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($va as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->norek }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('virtual-account.destroy', $item->id) }}" method="POST">
                                        <a class="btn btn-primary"
                                            href="{{ route('virtual-account.edit', $item->id) }}">Edit</a>
                                        @csrf
                                    </form>
                                </div>
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

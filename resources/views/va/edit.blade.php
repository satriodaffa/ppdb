@extends('layouts.main')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Virtual Account</h1>
            <div class="section-header-breadcrumb">
                Virtual Account
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
            <h3 class="section-title">Edit Virtual Account</h3>

            <form action="{{ route('virtual-account.update', $va->id) }}" method="Post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <select name="user_id" id="nama" class="form-control">
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Nasabah</label>
                                <input type="text" name="nama" id="nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="norek">No Rekening</label>
                                <input type="number" name="norek" id="norek" class="form-control">
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

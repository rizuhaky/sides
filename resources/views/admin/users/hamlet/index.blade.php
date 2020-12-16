@extends('admin.templates.default')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pengguna Rukun Warga</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <a href="{{ route('admin.hamlet.user.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
                <table id="hamlet-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        <!-- /.card-body -->
        </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
@endsection

<form action="" id="delete-form" method="POST">
    @csrf
    @method("DELETE")
    <button style="display: none">Hapus</button>
</form>

@push('script')
    <script>
        $(function() {
            $('#hamlet-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.hamlet.user.data') }}",
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'action' },
                ]
            });
        });
    </script>
@endpush
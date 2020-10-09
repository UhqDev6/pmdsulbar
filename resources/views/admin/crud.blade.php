@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="content-header">
        <a class="btn btn-primary" href="{{ route('crud.add') }}"> Tambah User</a>
        <hr>
    </div>

    <div class="content-header">
        @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('message') }}
            </div>
        </div>
         @endif
         <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-lg">
            <tr class="bg-dark">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $no => $datauser)
            <tr> 
                <td>{{ $users->firstItem()+$no }}</td>    
                <td>{{ $datauser->name }}</td>
                <td>{{ $datauser->email }}</td>
                <td>
                    <a href="{{ route('crud.edit', $datauser->id) }}" class="badge badge-success">Edit</a> |
                    <a href="#" class="badge badge-danger delete" data-id="{{ $datauser->id }}">
                        <form action="{{ route('crud.delete', $datauser->id) }}" id="delete{{ $datauser->id }}" method="POST">
                        @csrf
                        @method('delete')
                        </form>
                        hapus
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </table>
         </div>
        {{ $users->links() }}
    </div>
</div>


@endsection

@section('footer')
<script>
  $('.delete').click(function(e){
   id = e.target.dataset.id;
        swal({
        title: "Anda Yakin",
        text: "Ingin menghapus data ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Data berhasil di hapus", {
            icon: "success",
            });
            $(`#delete${id}`).submit();
        }
        });

  });
</script>
@endsection




{{-- @push('page-script')

@endpush

@push('after-script')
   
@endpush --}}
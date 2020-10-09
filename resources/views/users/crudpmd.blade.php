@extends('layouts.adminlte.masteruser')
@section('crud')
<div class="content-wrapper">
    <div class="content-header">
        <a class="btn btn-primary" href="{{ route('crudpmd.viewdata') }}"> Tambah Data</a>
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
            <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Kelurahan</th>
                <th>Nama Posyandu</th>
                <th>Stara Posyandu</th>
                <th>Keterangan</th>
                <th>Action</th>

            </tr>
            {{-- @foreach ($users as $no => $datauser) --}}
            <tr> 
                <td></td>
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td> 
                <td></td>
                <td></td> 
                <td></td>   
                <td>
                    <a href="#" class="badge badge-success">Edit</a> |
                    <a href="#" class="badge badge-danger delete">
                        {{-- <form action="{{ route('crud.delete', $datauser->id) }}" id="delete{{ $datauser->id }}" method="POST">
                        @csrf
                        @method('delete')
                        </form> --}}
                        hapus
                    </a>
                    
                </td>
            </tr>
            {{-- @endforeach --}}
        </table>
         </div>
        {{-- {{ $users->links() }} --}}
    </div>
</div>
@endsection

{{-- @section('footer')
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
@endsection --}}

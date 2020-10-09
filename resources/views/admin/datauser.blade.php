@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="content-header">
        <a class="btn btn-primary" target="_blank" href="{{ route('datauser.cetak') }}"> Print</a>

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
            <thead>
            <tr class="bg-dark">
                <th>No</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Kecamatan</th>
                <th>Desa</th>
                <th>Kelurahan</th>
                <th>Nama Posyandu</th>
                <th>Stara Posyandu</th>
                <th>Keterangan</th>
                {{-- <th>Action</th> --}}

            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as  $datauser)
            <tr> 
                <td>{{ $i++ }}</td>
                <td>{{ $datauser->provinsi }}</td>
                <td>{{ $datauser->kabupaten }}</td>
                <td>{{ $datauser->kecamatan }}</td>
                <td>{{ $datauser->desa }}</td>
                <td>{{ $datauser->kelurahan }}</td>
                <td>{{ $datauser->nm_posyandu }}</td>
                <td>{{ $datauser->stara_posyandu }}</td>
                <td>{{ $datauser->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
        {{-- {{ $data->links() }} --}}
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

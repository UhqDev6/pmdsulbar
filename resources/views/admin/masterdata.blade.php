@extends('layouts.adminlte.masteradmin')
@section('masterdata')
<div class="content-wrapper">
    <div class="content-header">
        <a class="btn btn-primary" href="{{ route('masterdata.tambahData') }}"> Tambah Data</a>
    </div>

    <div class="content-header">
         <h6>Tabel Provinsi</h6>
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
                <th>Id Provinsi</th>
                <th>Nama Provinsi</th>
                <th>Action</th>
            </tr>
            @foreach ($provinsi as $no => $dataprov)
            <tr> 
                <td>{{ $provinsi->firstItem()+$no }}</td>    
                <td>{{ $dataprov->id_prov }}</td>
                <td>{{ $dataprov->name }}</td>
                <td>
                    <a href="{{ route('masterdata.editprov', $dataprov->id_prov) }}" class="badge badge-success">Edit</a> |
                    <a href="#" class="badge badge-danger delete" data-id="{{ $dataprov->id_prov }}">
                        <form action="{{ route('masterdata.deleteprov', $dataprov->id_prov) }}" id="delete{{ $dataprov->id_prov }}" method="POST">
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
        {{ $provinsi->links() }}


        <h6>Tabel Kabupaten</h6>
        @if (session('message1'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <div class="alert-body">
                 <button class="close" data-dismiss="alert">
                     <span>x</span>
                 </button>
                 {{ session('message1') }}
             </div>
         </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-lg">
            <tr class="bg-dark">
                <th>No</th>
                <th>Id Kabupaten</th>
                <th>Nama Kabupaten</th>
                <th>Action</th>
            </tr>
            @foreach ($kabupaten as $no => $datakab)
            <tr> 
                <td>{{ $kabupaten->firstItem()+$no }}</td>    
                <td>{{ $datakab->id_kab }}</td>
                <td>{{ $datakab->name }}</td>
                <td>
                    <a href="{{ route('masterdata.editkab', $datakab->id_kab) }}" class="badge badge-success">Edit</a> |
                    <a href="#" class="badge badge-danger delete" data-id="{{ $datakab->id_kab }}" >
                        <form action="{{ route('masterdata.deletekab', $datakab->id_kab)}}"  id="delete{{ $datakab->id_kab}}" method="POST">
                        @csrf
                        @method('delete')
                        </form>
                        hapus
                        {{-- <form action="{{ route('crud.delete', $datauser->id) }}" id="delete{{ $datauser->id }}" method="POST">
                        @csrf
                        @method('delete')
                        </form> --}}
                    </a>
                    
                </td>
            </tr>
            @endforeach
        </table>
          </div>
        {{ $kabupaten->links() }}




        <h6>Tabel Kecamatan</h6>
        @if (session('message2'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <div class="alert-body">
                 <button class="close" data-dismiss="alert">
                     <span>x</span>
                 </button>
                 {{ session('message2') }}
             </div>
         </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-lg">
            <tr class="bg-dark">
                <th>No</th>
                <th>Id Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>Action</th>
            </tr>
            @foreach ($kecamatan as $no => $datakec)
            <tr> 
                <td>{{ $kecamatan->firstItem()+$no }}</td>    
                <td>{{ $datakec->id_kec }}</td>
                <td>{{ $datakec->name }}</td>
                <td>
                    <a href="{{ route('masterdata.editkec', $datakec->id_kec) }}" class="badge badge-success">Edit</a> |
                    <a href="#" class="badge badge-danger delete" data-id="{{ $datakec->id_kec }}">
                        <form action="{{ route('masterdata.deletekec', $datakec->id_kec) }}" id="delete{{ $datakec->id_kec }}" method="POST">
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
        {{ $kecamatan->links() }}


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
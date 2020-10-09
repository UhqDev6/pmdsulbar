@extends('layouts.adminlte.masteruser')
@section('crud')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                  MENAMBAHKAN DATA
                  <hr>
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
                        <form method="POST" action="{{ route('crudpmd.tambahdata') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contoh1" @error('provinsi')
                                        class='text-danger'
                                    @enderror>Provinsi @error('provinsi')
                                        | {{ $message }}
                                    @enderror</label>
                                    <select class="form-control formselect" placeholder =" Provinsi" name="provinsi" id="provinsi_name">
                                        <option value="0" disabled selected>Provinsi</option>
                                        @foreach ($dataprov as $prov)
                                        <option value="{{ $prov->name }}">
                                            {{ ucfirst($prov->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('nm_posyandu')
                                        class='text-danger'
                                    @enderror>Nama Posyandu @error('nm_posyandu')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="nm_posyandu" placeholder="Nama Posyandu">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('kabupaten')
                                        class='text-danger'
                                    @enderror>Kabupaten @error('kabupaten')
                                        | {{ $message }}
                                    @enderror</label>
                                    <select class="form-control formselect " placeholder =" Kabupaten" name="kabupaten" id="kabupaten" >
                                        <option value="0" disabled selected>Kabupaten</option>
                                        @foreach ($datakab as $kab)
                                        <option value="{{ $kab->name }}">
                                            {{ ucfirst($kab->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('stara_posyandu')
                                        class='text-danger'
                                    @enderror>Stara Posyandu @error('stara_posyandu')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="stara_posyandu" placeholder="Stara Posyandu">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('kecamatan')
                                        class='text-danger'
                                    @enderror>Kecamatan @error('kecamatan')
                                        | {{ $message }}
                                    @enderror</label>
                                    <select class="form-control formselect " placeholder =" Kecamatan" name="kecamatan" id="kecamatan" >
                                        <option value="0" disabled selected>Kecamatan</option>
                                        @foreach ($datakec as $kec)
                                        <option value="{{ $kec->name }}">
                                            {{ ucfirst($kec->name) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('alamat_posyandu')
                                        class='text-danger'
                                    @enderror>Alamat Posyandu @error('alamat_posyandu')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="alamat_posyandu" placeholder="Alamat Posyandu">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('desa')
                                        class='text-danger'
                                    @enderror>Desa @error('desa')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="desa" placeholder="Desa">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('keterangan')
                                        class='text-danger'
                                    @enderror>Keterangan @error('keterangan')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="keterangan" placeholder="Keterangan">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('kelurahan')
                                        class='text-danger'
                                    @enderror>Kelurahan @error('kelurahan')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="kelurahan" placeholder="Kelurahan">
                                </div>
                            </div>
                         
                           
                         
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-primary">Batal</button>
                        </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- @section('footer')
    
<script>
    $($document).ready(function(){
        $('#kabupaten').on('change', function(){
            let id = $(this).val();
            $('#kec').empety();
            $('#kec').append(`<option value="0" disabled selected> ... </option>`);
            $.ajax({
                type : 'GET',
                url : 'crudpmddatakec/' + id,
                success : function (response){
                    var response = JSON.parse(response);
                    console.log(response);
                    $('#kec').empety();
                    $('#kec').append(`<option value="0" disabled selected>Select Kecamatan</option>`);
                    response.forEach(element => {
                        $('#kec').append(`<option value="${element['id_kec']}">${element['name']}</option>`);
                    });
                }
            });
        });
    });
</script>
@endsection --}}

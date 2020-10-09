@extends('layouts.adminlte.masteradmin')
@section('masterdata')
<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <a class="btn btn-primary" href="{{ route('masterdata') }}">Lihat Data</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                  Data Provinsi
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
                        <form method="POST" action="{{ route('masterdata.simpandataprov') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contoh1" @error('id_prov')
                                        class='text-danger'
                                    @enderror>Id Provinsi @error('id_prov')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="id_prov" placeholder="Id Provinsi">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('name')
                                        class='text-danger'
                                    @enderror>Nama Provinsi @error('name')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh2" name="name" placeholder="Name Provinsi">
                                </div>
                            </div>
                         
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="reset" class="btn btn-primary">Batal</button>
                        </form>
                        <hr>


                        Data Kabupaten
                        <hr>
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
                              <form method="POST" action="{{ route('masterdata.simpandatakab') }}" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="contoh1" @error('id_kab')
                                              class='text-danger'
                                          @enderror>Id Kabupaten @error('id_kab')
                                              | {{ $message }}
                                          @enderror</label>
                                          <input type="text" class="form-control" id="contoh1" name="id_kab" placeholder="Id Kabupaten">
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label for="contoh2" @error('id_prov')
                                              class='text-danger'
                                          @enderror>Id Provinsi @error('id_prov')
                                              | {{ $message }}
                                          @enderror</label>
                                          <input type="text" class="form-control" id="contoh2" name="id_prov" placeholder="Id Provinsi">
                                      </div>
                                  </div>
                               
                                  <div class="form-row">
                                      <div class="form-group col-md-4">
                                          <label for="password" @error('name')
                                              class='text-danger'
                                          @enderror>Nama Kabupaten @error('name')
                                              | {{ $message }}
                                          @enderror</label>
                                          <input type="text" class="form-control" name="name"  placeholder="Nama Kabupaten">
                                      </div>
                                  </div>
                               
                                  <button type="submit" class="btn btn-success">Simpan</button>
                                  <button type="reset" class="btn btn-primary">Batal</button>
                              </form>
                              <hr>


                              Data Kecamatan
                              <hr>
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
                                    <form method="POST" action="{{ route('masterdata.simpandatakec') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="contoh1" @error('id_kec')
                                                    class='text-danger'
                                                @enderror>Id Kecamatan @error('id_kec')
                                                    | {{ $message }}
                                                @enderror</label>
                                                <input type="text" class="form-control" id="contoh1" name="id_kec" placeholder="Id Kecamatan">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="contoh2" @error('id_kab')
                                                    class='text-danger'
                                                @enderror>Id Kabupaten @error('id_kab')
                                                    | {{ $message }}
                                                @enderror</label>
                                                <input type="text" class="form-control" id="contoh2" name="id_kab" placeholder="Id Kabupaten">
                                            </div>
                                        </div>
                                     
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="name" @error('name')
                                                    class='text-danger'
                                                @enderror>Nama Kecamatan @error('name')
                                                    | {{ $message }}
                                                @enderror</label>
                                                <input type="text" class="form-control" name="name"  placeholder="Nama Kecamatan">
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
@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                        <br>
                        EDIT DATA KECAMATAN
                        <hr>
                              <form method="POST" action="{{ route('masterdata.updatekec', $datakec->id_kec) }}" enctype="multipart/form-data">
                                  @csrf
                                  @method('patch')
                                  <div class="form-row">
                                      <div class="form-group col-md-6">
                                          <label for="contoh1" @error('id_kec')
                                              class='text-danger'
                                          @enderror>Id Kecamatan @error('id_kec')
                                              | {{ $message }}
                                          @enderror</label>
                                          <input type="text" class="form-control" id="contoh1" name="id_kec"
                                          @if (old('id_kec'))
                                          value="{{ $datakec->id_kec }}"
                                          @else
                                          value="{{ $datakec->id_kec }}"
                                          @endif
                                          placeholder="Id Kecamatan">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="contoh1" @error('id_kab')
                                            class='text-danger'
                                        @enderror>Id Kabupaten @error('id_kab')
                                            | {{ $message }}
                                        @enderror</label>
                                        <input type="text" class="form-control" id="contoh1" name="id_kab"
                                        @if (old('id_kab'))
                                        value="{{ $datakec->id_kab }}"
                                        @else
                                        value="{{ $datakec->id_kab }}"
                                        @endif
                                        placeholder="Id Kabupaten">
                                    </div>

                                      <div class="form-group col-md-6">
                                          <label for="contoh2" @error('name')
                                              class='text-danger'
                                          @enderror>Nama Kecamatan @error('name')
                                              | {{ $message }}
                                          @enderror</label>
                                          <input type="text" class="form-control" id="contoh1" name="name"
                                          @if (old('name'))
                                          value="{{ $datakec->name }}"
                                          @else
                                          value="{{ $datakec->name }}"
                                          @endif
                                          placeholder="Nama Kecamatan">
                                      </div>
                                  </div>
                               
                                  <button type="submit" class="btn btn-success">Update</button>
                              </form>
                         
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
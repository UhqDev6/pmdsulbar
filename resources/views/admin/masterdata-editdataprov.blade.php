@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                  EDIT DATA PROVINSI
                  <hr>
                        <form method="POST" action="{{ route('masterdata.updateprov', $dataprov->id_prov) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contoh1" @error('id_prov')
                                        class='text-danger'
                                    @enderror>Id Provinsi @error('id_prov')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="id_prov"
                                    @if (old('id_prov'))
                                    value="{{ $dataprov->id_prov }}"
                                    @else
                                    value="{{ $dataprov->id_prov }}"
                                    @endif
                                    placeholder="Id Provinsi">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('name')
                                        class='text-danger'
                                    @enderror>Nama Provinsi @error('name')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="name"
                                    @if (old('name'))
                                    value="{{ $dataprov->name }}"
                                    @else
                                    value="{{ $dataprov->name }}"
                                    @endif
                                    placeholder="Nama Provinsi">
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
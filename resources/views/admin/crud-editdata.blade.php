@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                  EDIT USER
                  <hr>
                        <form method="POST" action="{{route('crud.update', $data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contoh1" @error('name')
                                        class='text-danger'
                                    @enderror>Nama @error('name')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="name"
                                    @if (old('name'))
                                    value="{{ $data->name }}"
                                    @else
                                    value="{{ $data->name }}"
                                    @endif
                                    placeholder="Nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('email')
                                        class='text-danger'
                                    @enderror>E-Mail Address @error('email')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="email"
                                    @if (old('email'))
                                    value="{{ $data->email }}"
                                    @else
                                    value="{{ $data->email }}"
                                    @endif
                                    placeholder="Email">
                                </div>
                            </div>
                         
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="password" @error('password')
                                        class='text-danger'
                                    @enderror>Password @error('password')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="password" class="form-control" id="contoh1" name="password"
                                    @if (old('password'))
                                    value="{{ $data->password }}"
                                    @else
                                    value="{{ $data->password }}"
                                    @endif
                                    placeholder="Password">
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
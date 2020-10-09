@extends('layouts.adminlte.masteradmin')
@section('crud')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <br>
                  MENAMBAHKAN USER
                  <hr>
                        <form method="POST" action="{{route('crud.save')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contoh1" @error('name')
                                        class='text-danger'
                                    @enderror>Nama @error('name')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="text" class="form-control" id="contoh1" name="name" placeholder="Nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contoh2" @error('email')
                                        class='text-danger'
                                    @enderror>E-Mail Address @error('email')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input type="email" class="form-control" id="contoh2" name="email" placeholder="E-mail Address">
                                </div>
                            </div>
                         
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="password" @error('password')
                                        class='text-danger'
                                    @enderror>Password @error('password')
                                        | {{ $message }}
                                    @enderror</label>
                                    <input id="password" type="password" class="form-control" name="password"  placeholder="Password">
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
@extends('layouts.app')

@section('content')
<div class="container">
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
    <li class="breadcrumb-item active">Pengajuan</li>
    <li class="breadcrumb-item active" aria-current="page">Surat Keterangan</li>
  </ol>
</nav>
    <div class="row justify-content-center">
        <div class="col-md-6">  
            <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        @endif

                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nim</label>
                                <input type="text" class="form-control" id="formGroupExampleInput">
                            </div>
                    
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tahun</label>
                                <input type="text" class="form-control" id="formGroupExampleInput">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Periode</label>
                                <input type="text" class="form-control" id="formGroupExampleInput">
                            </div>

                    
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
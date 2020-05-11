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
                <div class="card-header"> <strong> Data Pengajuan Surat Keterangan </strong> </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            </div>
                        @endif
                        
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                        @endif
                        <form method="post" action="{{route('Csk')}}" enctype='multipart/form-data'>
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            
                            <div class="form-group">
                                <label for="formGroupExampleInput">Lembaga</label>
                                <input type="text" class="form-control" name="Lembaga" >
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Pimpinan</label>
                                <input type="text" class="form-control" name="Pimpinan" >
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">No.Telp</label>
                                <input type="text" class="form-control" name="Telp" >
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea class="form-control" rows="3" name="Alamat"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Fax</label>
                                <input type="text" class="form-control" name="Fax">
                            </div>

                            <div class="form-group">
                                <label for="file"> Dokumen (PDF Scan) </label>
                                    <div class="custom-file">
                                        <input type="file" class="form-control-file" id="file" name="doc">
                                        <label class="form-control-file" for="file"></label>
                                    </div>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Daftar Pengajuan Surat Keterangan KP </strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <table class="table table-hover" align="center">
                            <tr>
                                <th> No </th>
                                <th> Lembaga </th>
                                <th> Tanggal </th>
                                <th> Disetujui </th>
                            </tr>
                           
                                @foreach($sk as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row['lembaga']}}</td>
                                    <td>{{$row['created_at']}}</td>
                                    <td>{{$row['status_sk']}}</td>
                                </tr>
                                @endforeach
                                
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
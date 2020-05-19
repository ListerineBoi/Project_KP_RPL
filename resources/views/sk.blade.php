@extends('layouts.app')

@section('content')
<div class="container">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        @if(\Session::has('Forbidden'))
                        <div class="alert alert-danger">
                            <p>{{\Session::get('Forbidden')}}</p>
                        </div>
                        @endif
                        <form method="post" action="{{route('Csk')}}" enctype='multipart/form-data'>
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                            
                            <div class="form-group">
                                <label for="formGroupExampleInput">Lembaga</label>
                                <input type="text" class="form-control" name="Lembaga" placeholder="ex.PT.Telkom">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Pimpinan</label>
                                <input type="text" class="form-control" name="Pimpinan" placeholder="ex.Dr.Rico Alex Sandra">
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">No.Telp</label>
                                <input type="text" class="form-control" name="Telp" placeholder="ex.089663759631">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea class="form-control" rows="3" name="Alamat" placeholder="ex.Jln.Kemuningan"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="formGroupExampleInput">Fax</label>
                                <input type="text" class="form-control" name="Fax" placeholder="ex.02129222999">
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
                                <th> Status </th>
                            </tr>
                           
                                @foreach($sk as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row['lembaga']}}</td>
                                    <td>{{$row['created_at']}}</td>
                                    @if($row['status_sk'] == 1)
                                        <td><span class="fa fa-check" style="font-size:24px"></span></td>
                                    @elseif ($row['status_sk'] == 2)
                                        <td><span class="fa fa-close" style="font-size:24px"></span></td>
                                    @else
                                        <td><span class="fa fa-clock-o" style="font-size:24px"></span></td>
                                    @endif
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
@extends('layouts.app')

@section('content')
<div class="container">
<!-- breadcrumb -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
    <li class="breadcrumb-item active">Pengajuan</li>
    <li class="breadcrumb-item active" aria-current="page">Pra KP</li>
  </ol>
</nav>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Data Pengajuan Pra KP </strong> </div>

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

                    <form method="post" action="{{route('Cprakp')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <div class="form-group">
                            <label for="formGroupExampleInput"> Judul Pra-KP </label>
                            <textarea class="form-control" name="Judul" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Tools </label>
                            <textarea class="form-control" name="Tools" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput"> Spesifikasi Perangkat Lunak / Pekerjaan Kerja Praktek </label>
                            <textarea class="form-control" name="Spek" rows="3"></textarea>
                        </div>

                    
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Daftar Pengajuan Pra KP </strong> </div>
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
                                    <th> Judul </th>
                                    <th> Pembimbing </th>
                                    <th> Tanggal </th>
                                    <th> Disetujui </th>
                                </tr>
                                @foreach($VPrakp as $row)
                                <tr>
                                    <td> 1 </td>
                                    <td> {{$row['judul']}} </td>
                                    <td> {{$row['name']}} </td>
                                    <td> {{$row['created_at']}} </td>
                                    <td> {{$row['status_prakp']}} </td>
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
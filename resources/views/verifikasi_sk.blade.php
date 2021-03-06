@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Verifikasi Surat Keterangan</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Verifikasi Surat Keterangan </strong> </div>

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
                    <div class="container">
                        <table class="table table-hover">
                            <tr >
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Dokumen Permohonan SK </th>
                                <th> Status </th>
                                <th> Action </th>
                            <tr>
                            @foreach($sk as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row['nim']}} </td>
                                <td> {{DB::table('mahasiswa')->where('nim', $row['nim'])->value('name')}} </td>
                                <td> 
                                <form method="post" action="{{route('lihat')}}">
                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                <input type="hidden" name="from" value="Sk">
                                <input type="hidden" name="id" value="{{$row['dokumen']}}">
                                <button type="submit" class="btn btn-link">{{$row['dokumen']}}</button> 
                                </form>
                                </td>
                                    @if($row['status_sk']==0)
                                        <td> Menunggu </td>
                                    @elseif($row['status_sk']==1)
                                        <td> Terverifikasi </td>
                                    @else
                                        <td> Ditolak </td>
                                    @endif
                                <td>  
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$loop->iteration}}" > Verifikasi </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"></b>Verifikasi Surat Keterangan</b> </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            <div class="modal-body">
                                                <p><b> Yakin ingin memverifikasi ? <b></p>
                                                <table class="table">
                                                    <tr>
                                                        <td> NIM </td>
                                                        <td> : </td>
                                                        <td> {{$row['nim']}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Nama </td>
                                                        <td> : </td>
                                                        <td> {{DB::table('mahasiswa')->where('nim', $row['nim'])->value('name')}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Permohonan SK </td>
                                                        <td> : </td>
                                                        <td> {{$row['dokumen']}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Dokumen SK </td>
                                                        <td> : </td>
                                                        <td>
                                                            <form method="post" action="{{route('ver_sk')}}" enctype='multipart/form-data'>
                                                <div class="form-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control-file" id="file" name="doc">
                                                        <label class="form-control-file" for="file"></label>
                                                        </div>
                                                </div>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                                
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                <input type="hidden" name="id" value="{{$row['id_sk']}}">
                                                <button type="submit" class="btn btn-success"> Konfirmasi </button>
                                                </form>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- --------------------------------------------------------- -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenterb{{$loop->iteration}}" > tolak </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenterb{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"></b>Verifikasi Surat Keterangan</b> </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            <div class="modal-body">
                                                <p><b>Yakin ingin menolak ?</b></p>
                                                <table class="table">
                                                    <tr>
                                                        <td> NIM </td>
                                                        <td> : </td>
                                                        <td> {{$row['nim']}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Nama </td>
                                                        <td> : </td>
                                                        <td> {{DB::table('mahasiswa')->where('nim', $row['nim'])->value('name')}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Permohonan SK </td>
                                                        <td> : </td>
                                                        <td> {{$row['dokumen']}} </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                                <form method="post" action="{{route('tolak_sk')}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                <input type="hidden" name="id" value="{{$row['id_sk']}}">
                                                <button type="submit" class="btn btn-success"> Konfirmasi </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                </td>
                            
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div> <br>

            <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('homeD') }}"> BACK </a> </button>

        </div>


    </div>
</div>

@endsection
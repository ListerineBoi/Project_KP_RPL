@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Verifikasi Pra-KP</li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Verifikasi Pra-KP </strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{\Session::get('success')}}</p>
                        </div>
                        @endif
                    <div class="container">
                        <table class="table table-hover" style="text-align: center;">
                            <tr>
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Judul </th>
                                <th> Tool </th>
                                <th> Spek </th>
                                <th> Action </th>
                            <tr>
                            @foreach($VPrakp as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row['nim']}} </td>
                                <td> {{$row['mhs']}} </td>
                                <td> {{$row['judul']}} </td>
                                <td> {{DB::table('prakp')->where('id_prakp', $row['id_prakp'])->value('tool')}}</td>
                                <td> {{DB::table('prakp')->where('id_prakp', $row['id_prakp'])->value('spek')}} </td>
                                <td>  
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$loop->iteration}}"> Verifikasi </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Verifikasi Pra-KP</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            <div class="modal-body">
                                                <p><b>Yakin ingin memverifikasi ?</b></p>
                                                <p> {{$row['nim']}} </p>
                                                <p> {{$row['mhs']}} </p>
                                                <p> {{$row['judul']}} </p>
                                                <p> Pembimbing </p>
                                                <form method="post" action="{{route('ver_prakp')}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                <select id="pemb" name="Pembimbing" class="form-control">
                                                    @foreach($dosen as $row2)    
                                                        <option value="{{$row2['id']}}">{{$row2['name']}}</option>
                                                    @endforeach  
                                                    </select>
                                                    <br>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                               
                                               
                                                <input type="hidden" name="id" value="{{$row['id_prakp']}}">
                                                <input type="hidden" name="nim" value="{{$row['nim']}}">

                                                <button type="submit" class="btn btn-success"> Konfirmasi </button>
                                                </form>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- ----------------------------------------------- -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenterb{{$loop->iteration}}"> Tolak </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenterb{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Verifikasi Pra-KP</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                            <div class="modal-body">
                                                <p><b>Yakin ingin menolak?</b></p>
                                                <p> {{$row['nim']}} </p>
                                                <p> {{$row['mhs']}} </p>
                                                <p> {{$row['judul']}} </p>
                                                <form method="post" action="{{route('tolak_prakp')}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                               
                                                <input type="hidden" name="nim" value="{{$row['nim']}}">
                                                <input type="hidden" name="id" value="{{$row['id_prakp']}}">
                                                <button type="submit" class="btn btn-danger"> Tolak </button>
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
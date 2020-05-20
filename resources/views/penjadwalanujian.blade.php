@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Penjadwalan Ujian </li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Jadwal Ujian </strong> </div>

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

                    <div class="container">
                        <table class="table table-hover" >
                            <tr>
                                <th> No </th>
                                <th> NIM </th>
                                <th> Nama </th>
                                <th> Dosen Pendamping </th>
                                <th> Set Jadwal </th>
                                <!-- <th> Dosen Penguji </th> -->
                            <tr>
                            @foreach($Vkp as $row)
                            <tr>
                                <td> {{$loop->iteration}} </td>
                                <td> {{$row['nim']}} </td>
                                <td> {{$row['mhs']}} </td>
                                @if(DB::table('mahasiswa')->where('nim', $row['nim'])->value('id_dosen')==null)
                                    <td> Belum Ada </td>
                                    @else
                                    <td> {{DB::table('dosen')->where('id', DB::table('mahasiswa')->where('nim', $row['nim'])->value('id_dosen'))->value('name')}} </td>
                                    @endif
                                <td> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$loop->iteration}}"> Set Jadwal Ujian  </button> 
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">

                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle"><b>Set Batas Ujian</b></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                <div class="modal-body">
                                                <form method="post" action="{{route('Cpenjadwalanujian')}}">
                                                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                                <input type="hidden" name="id" value="{{$row['id_kp']}}">
                                                <input type="hidden" name="nim" value="{{$row['nim']}}">
                                                    <p><b>Tanggal Ujian</b></p>
                                                    <input type="date" name="Tanggal" class="form-control"> 
                                                    <br>
                                                    <p><b>Ruangan</b></p>
                                                    <input type="text" name="Ruangan" class="form-control">
                                                    <br>
                                                    <p><b>Jam</b></p>
                                                    <input type="text" name="Jam" class="form-control">
                                                    <br>
                                                    <p><b>Penguji</b></p>
                                                    <select id="Pen" name="Penguji" class="form-control">
                                                    @foreach($dosen as $row2)    
                                                        <option value="{{$row2['id']}}">{{$row2['name']}}</option>
                                                    @endforeach  
                                                    </select>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Batal </button>
                                                    
                                                    <button type="submit" class="btn btn-success"> Konfirmasi </button>
                                                    </form>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- <td> DB::table('dosen')->where('id', DB::table('jadwalujian')->where('id_jdl_uji', $row['id_jdl_uji'])->value('id_dosen'))->value('name') </td> -->
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
@extends('layouts.appD')

@section('content')
<div class="container">
<!-- breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Periode </li>
        </ol>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Periode </strong> </div>

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
                    <form method="post" action="{{route('Cperiode')}}">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"> 
                            <div class="form-group">
                                <label for="formGroupExampleInput"> Semester </label>
                                <input type="text" class="form-control" name="semester">
                            </div>
                    
                            <div class="form-group">
                                <label for="formGroupExampleInput"> Tahun </label>
                                <input type="text" class="form-control" name="Tahun">
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                
                </div><br>
                <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('homeD') }}"> BACK </a> </button>
            </div> 
            <div class="col-md-6">
            <div class="card">
                <div class="card-header"> <strong> Periode </strong> </div>

                <div class="card-body">

                        <div class="container">
                            <table class="table table-hover" align="center">
                                <tr>
                                    <th> No </th>
                                    <th> Semseter </th>
                                    <th> tahun </th>
                                    <th> aktif </th>
                                    
                                </tr>
                                @foreach($per as $row)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$row['semester']}} </td>
                                    <td> {{$row['tahun']}} </td>
                                    <td> {{$row['aktif']}} </td>
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
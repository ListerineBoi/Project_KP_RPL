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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <strong> Periode </strong> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif 

                    <div class="container">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput"> Semester </label>
                                <input type="text" class="form-control" id="formGroupExampleInput">
                            </div>
                    
                            <div class="form-group">
                                <label for="formGroupExampleInput"> Tahun </label>
                                <input type="text" class="form-control" id="formGroupExampleInput">
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div> <br>

            <button class="btn btn-success"> <a style="color:white;text-decoration: none;" href="{{ route('homeD') }}"> BACK </a> </button>

        </div>
    </div>
</div>
@endsection
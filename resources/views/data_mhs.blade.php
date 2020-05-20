<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">  
            <div class="card">

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

                        @if(\Session::has('Forbidden'))
                        <div class="alert alert-danger">
                            <p>{{\Session::get('Forbidden')}}</p>
                        </div>
                        @endif

                        <form method="post" action="{{route('Cdata_mhs')}}">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nim</label>
                                <input type="text" class="form-control" name="Nim" placeholder="72180199"> 
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Submit</button> 

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
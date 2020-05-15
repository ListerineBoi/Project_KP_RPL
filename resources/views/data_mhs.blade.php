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
</body>
</html>
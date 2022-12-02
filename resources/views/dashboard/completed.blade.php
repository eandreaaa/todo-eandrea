@extends('leyot')

@section('konten')      

<!DOCTYPE html>
<html>
<head>
    <style>
    body {
        background: url('assets/img/image.png');
        background-repeat: no-repeat;
        background-position-x: 65px;
        background-position: top, left;
        
        background-size: 1000px;
    }
    
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <title>Todo App</title>
</head>
<body>

    <div class="wrapper bg-white">
        <div class="d-flex align-items-start justify-content-between">
            <div class="d-flex flex-column">
                @if (session('notAllowed'))
                    <div class="alert alert-danger">
                         {{ session('notAllowed') }}        
                    </div>        
                @endif

                @if (session('successAdd'))
                    <div class="alert alert-success">
                         {{ session('successAdd') }}        
                    </div>        
                @endif

                @if (session('successupdate'))
                    <div class="alert alert-success">
                         {{ session('successupdate') }}        
                    </div>        
                @endif

                @if (session('successDelete'))
                    <div class="alert alert-danger">
                         {{ session('successDelete') }}        
                    </div>        
                @endif
                
                <div class="h5">ToDo'Q</div>
                <p class="text-muted text-justify">
                    Here's a list of activities you have to do
                </p>
                <br>
                <span>
                    <a href="/todo/create" class="text-success">Create</a>  
                    <a href="">Completed</a>
                </span>
            </div>
            <div class="info btn ml-md-4 ml-0">
                <span class="fas fa-info" title="Info"></span>
            </div>
        </div>
        <div class="work border-bottom pt-3">
            <div class="d-flex align-items-center py-2 mt-1">
                <div>
                    <span class="text-muted fas fa-comment btn"></span>
                </div>
                <div class="text-muted">{{$data->count()}} ToDos</div>
                <button class="ml-auto btn bg-white text-muted fas fa-angle-down" type="button" data-toggle="collapse"
                    data-target="#comments" aria-expanded="false" aria-controls="comments"></button>
            </div>
        </div>
        @foreach ($data as $item)
        <div id="comments" class="mt-1">
            <div class="comment d-flex align-items-start justify-content-between">
                <div class="mr-2">
                </div>
                <div class="d-flex flex-column">
                    <b class="text-justify">
                        {{$item->title}}
                    </b>
                    <class="text-justify">
                        {{$item->description}}
                    <p class="text-muted">
                    {{$item['status'] == 1 ? 'Complated ': 'On-Process '}} <span class="date">{{\Carbon\Carbon::parse($item['date'])}}</span></p>

                    <div class="d-grid gap-2 d-md-block">
                        
                      </div>
                </div>
                <div class="ml-md-4 ml-0">
                </div>
            </div>
        </div>
    
        @endforeach

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>

@endsection

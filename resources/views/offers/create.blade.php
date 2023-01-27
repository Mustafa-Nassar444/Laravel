<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .error {
            color: #ae1c17;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item active">
                    <a class="nav-link"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"> {{ $properties['native'] }}
                        <span class="sr-only">(current)</span></a>
                </li>
            @endforeach


        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="flex-center position-ref full-height">
<form action="{{route('offer.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">{{__('messages.Offer Name ar')}}</label>
        <input type="text" class="form-control" name="name_ar" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Enter Name ar')}}">
        @error('name_ar')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
        <input type="text" class="form-control" name="name_en" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="{{__('messages.Enter Name en')}}">
        @error('name_en')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">{{__('messages.Price')}}</label>
        <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="{{__('messages.Price')}}">
        @error('price')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputDetails">{{__('messages.Offer Details ar')}}</label>
        <input type="text" name="details_ar" class="form-control" id="exampleInputDetails" placeholder="{{__('messages.Enter Details ar')}}">
        @error('details_ar')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputDetails">{{__('messages.Offer Details en')}}</label>
        <input type="text" name="details_en" class="form-control" id="exampleInputDetails" placeholder="{{__('messages.Enter Details en')}}">
        @error('details_en')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPhoto">{{__('messages.Offer Image')}}</label>
        <input type="file" name="photo" class="form-control" id="exampleInputPhoto">
        @error('photo')
        <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{__('messages.update')}}</button>
</form>
</div>

</body>
</html>

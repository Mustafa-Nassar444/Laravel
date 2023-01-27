<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">                                {{ $properties['native'] }}
                    </a>
                </li>
                @endforeach
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<div class="container text-center">
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">{{__('messages.Offer Name')}}</th>
            <th scope="col">{{__('messages.Price')}}</th>
            <th scope="col">{{__('messages.Offer Detail')}}</th>
            <th scope="col">{{__('messages.operations')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
        <tr>
            <th scope="row">{{$offer->id}}</th>
            <td>{{$offer->name}}</td>
            <td>{{$offer->price}}</td>
            <td>{{$offer->details}}</td>
            <td><a href="{{route('offer.edit',$offer->id)}}" class="btn btn-primary" type="submit">{{__('messages.edit')}}</a>
            <a href="{{route('offer.delete',$offer->id)}}" class="btn btn-danger" type="submit">{{__('messages.delete')}}</a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

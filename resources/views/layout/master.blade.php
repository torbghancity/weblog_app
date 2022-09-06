<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>MyBlog | @yield('title')</title>
</head>

    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand order-md-2" href="index.php">MyBlog</a>
                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav order-md-1">

                        @if ($categories->count()>0)
                            @foreach ($categories as $category)
                                @if ($request->path())
                                    <li class="nav-item {{$category->id == $request->path() ? "active":""}}">
                                        <a class="nav-link" href="{{route('weblog.show',['id'=>$category->id])}}"> {{$category->title}} </a>
                                    </li>
                                @endif
                                
                            @endforeach
                        @endif
                        
                    </ul>
                </div>
            </div>
        </nav>

@yield('content')

    <footer class="text-center text-white bg-dark py-4">
        <div class="container">
            <div class="row flex-column">
            <div>
                <p class="">کلیه حقوق محتوا این سایت متعلق به وب سایت وبپروگ میباشد</p>
            </div>
            <div>
                <a href="#"><i class="fab fa-facebook fa-2x text-white"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x text-white mr-2"></i></a>
                <a href="#"><i class="fab fa-telegram fa-2x text-white mr-2"></i></a>
            </div>
            </div>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

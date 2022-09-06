<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">

            @if ($postsliders->count()>0)
                @foreach ($postsliders as $postslider)

                    <div class="carousel-item {{$postslider->active ? "active" : ""}}" style="height: 450px">
                        <img src="/image/{{$posts->firstWhere('id', $postslider->post_id)->image}}" class="img-fluid d-block w-100 h-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> {{$posts->firstWhere('id', $postslider->post_id)->title}} </h5>
                            <p>
                                {{substr($posts->firstWhere('id', $postslider->post_id)->body,0,220)}} ...
                            </p>
                            <a href="{{ route('weblog.single',['id'=>$posts->firstWhere('id', $postslider->post_id)->id]) }}" class="btn btn-danger"> مشاهده </a>
                        </div>
                    </div>

                @endforeach
            @endif

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</section>
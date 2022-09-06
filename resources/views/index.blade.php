@extends('layout.master')

@section('title','صفحه اصلی')

@section('content')

    @include('layout.slider')

    <section class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <div class="row">   
                        
                        @forelse ($posts as $post)
                            
                             <div class="col-sm-6 mt-2">      
                                <div class="card">
                                <img src="/image/{{$post->image}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                    <h5 class="card-title">{{$post->title}}</h5>
                                    <div><span class="badge badge-secondary"> {{$categories->firstWhere('id', $post->category_id)->title}} </span></div>
                                    </div>
                                    <p class="card-text text-justify">
                                        {{substr($post->body, 0, 500)}} ...
                                    </p>
                                    <div class="d-flex justify-content-between">
                                    <a href="{{route('weblog.single',['id'=>$post->id])}}" class="btn btn-outline-primary stretched-link">مشاهده</a>
                                    <p> نویسنده : {{$post->author}} </p>
                                    </div>
                                </div>
                                </div>
                            </div>

                        @empty

                            <div class="col">
                                <div class="alert alert-danger">
                                مقاله مورد نظر پیدا نشد!!!!!
                                </div>
                            </div>

                        @endforelse
                            
                    </div>
                </div>
        
            @include('layout.sidebar')
            
            </div>
        </div>    
    </section>
    
@endsection

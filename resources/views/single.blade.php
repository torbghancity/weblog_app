@extends('layout.master')

@section('title','نمایش')

@section('content')

<section class="py-3">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8 mb-4">
                <div class="container">
                    
                        <div class="row">
                            @foreach ($posts as $post )

                                <div>
                                    <img src="image/{{$post->image}}" class="img-fluid" alt="">
                                </div>

                                <div class="p-3">

                                    <div class="d-flex align-items-center">
                                        <h2>{{$post->title}}</h2>
                                        <div class="mr-2">
                                            <span class="badge badge-secondary">{{$categories->firstWhere('id', $post->category_id)->title}}</span>
                                        </div>
                                    </div>
                                    <p class="text-justify">
                                        {{$post->body}}
                                    </p>

                                    <p> نویسنده : {{$post->author}} </p>
                                </div>

                            </div>
                            
                            <hr>

                            <div class="row">
                                <div class="col-12">

                                    <form action="{{ route('weblog.store_comment') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$post->id}}">
                                        <div class="form-group">
                                            <label for="name">نام</label>
                                            <input type="name" name="name" class="form-control" value="{{old('name')}}">
                                            @error('name')
                                                <p class="invalid-feedback d-block">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="comment">متن</label>
                                            <textarea name="comment" class="form-control" rows="5">{{old('comment')}}</textarea>
                                            @error('comment')
                                                <p class="invalid-feedback d-block">
                                                    <strong>
                                                        {{$message}}
                                                    </strong>
                                                </p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-outline-primary">ارسال</button>
                                    </form>
                                    
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div class="row p-md-3">

                            <div class="col-12 mb-3">
                                <div class="card bg-light">

                                    @foreach ($comments as $comment)
                                        @if ($comment->status)

                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="asset/img/boy.svg" width="70" height="70" class="rounded-circle" alt="Cinque Terre">

                                                    <div class="mr-3">
                                                        <h5 class="card-title"> {{$comment->name}} </h5>
                                                    </div>
                                                </div>
                                                <p class="card-text pt-3 pr-3">
                                                    {{$comment->comment}}
                                                </p>
                                            </div>

                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>

                        </div>

                </div>

            </div>

            @include('layout.sidebar')

        </div>

    </div>

</section>

@endsection
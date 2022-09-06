@extends('admin.layout.master')

@section('title','نمایش')

@section('content')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layout.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">داشبورد</h1>
                </div>

                <div class="col-sm-12 mt-2">      
                    <div class="card">
                    <img src="/image/{{$post->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <div><span class="badge badge-secondary"> {{$categories->firstWhere('id', $post->category_id)->title}} </span></div>
                        </div>
                        <p class="card-text text-justify">
                            {{$post->body}}
                        </p>
                        <div class="d-flex justify-content-between">
                        <p> نویسنده : {{$post->author}} </p>
                        </div>
                    </div>
                    </div>
                </div>

                <h3>کامنت های اخیر</h3>
                <div class="table-responsive">

                    @if ($comments->count()>0)
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>کامنت</th>
                                    <th>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $count=0 @endphp
                               @foreach ($comments as $comment)

                                    <tr>
                                        <td> {{$count+=1}} </td>
                                        <td> {{$comment->name}} </td>
                                        <td> {{$comment->comment}} </td>

                                        <td>
                                            <div class="container item-center">
                                                <div class="row justify-content-center">
                                                    
                                                    @if ($comment->status)
                                                        <div class="col-6 col-sm-4">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="{{$comment->id}}">
                                                                <button type="submit" class="btn btn-outline-success"> در انتظار تایید </button>
                                                            </form>
                                                        </div>    
                                                    @else
                                                        <div class="col-6 col-sm-4">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="{{$comment->id}}">
                                                                <button type="submit" class="btn btn-outline-success"> حذف تایید </button>
                                                            </form>
                                                        </div>    
                                                    @endif
                                                    <div class="col-6 col-sm-4">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="{{$comment->id}}">
                                                            <button type="submit" class="btn btn-outline-danger"> حذف </button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            کامنت برای نمایش وجود ندارد!!!
                        </div>
                    @endif

                </div>

            </main>
        </div>
    </div>
    
@endsection

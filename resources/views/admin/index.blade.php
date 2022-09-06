@extends('admin.layout.master')

@section('title','داشبورد')

@section('content')

    <div class="container-fluid">
        <div class="row">

            @include('admin.layout.sidebar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">داشبورد</h1>
                </div>

                <h3>مقالات اخیر</h3>
                <div class="table-responsive">

                    @if ($post_user->count()>0)
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th>تنظیمات</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $count=0 @endphp
                               @foreach ($post_user as $post)

                                    <tr>
                                        <td> {{$count+=1}} </td>
                                        <td> {{$post->title}} </td>
                                        <td> {{$post->author}} </td>

                                        <td>
                                            <a href="edit_post/{{$post->id}}" class="btn btn-outline-info">ویرایش</a>
                                            <a href="{{route('user.show' , ['user'=>$user->id ,'post' => $post->id])}}" class="btn btn-outline-info">نمایش</a>
                                            <a href="delete/{{$post->id}}" class="btn btn-outline-danger">حذف</a>
                                        </td>
                                    </tr>
                                    
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger" role="alert">
                            مقاله برای نمایش وجود ندارد!!!
                        </div>
                    @endif

                </div>

            </main>
        </div>
    </div>
@endsection

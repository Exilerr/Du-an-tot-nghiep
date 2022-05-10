@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                   Hãy vô và để lại câu hỏi của bạn và đóng góp cho chúng tôi
                </h1>
                <a 
                    href="/blog"
                    class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                    Read More
                </a>
            </div>
        </div>
    </div>
    <form method="GET" action="/search">
        <div class="row">
            <div class="col-md-6">
                <input type="search" name="search" class="form-control" placeholder="Search" >
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>

<div class="album py-5 bg-light">
        <div class="row">
            {{-- Phần bên trái --}}
            <div class="col-9">
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('images/' . $post->image_path) }}" alt="">
                            <div class="card-body">
                            <p class="card-text">{{ $post->title }}</p>
                            <p class="text-xl text-gray-700  leading-8 font-light">
                                {{ $post->description }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <a href="/blog/{{ $post->slug }}" class="uppercase btn btn-primary stretched-link">Chi tiết</a>
                                </div>
                                <small class="text-muted"><span class="text-gray-500">
                                    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Tạo {{ date('jS M Y', strtotime($post->updated_at)) }}
                                </span></small>
                            </div>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                </div>
            </div>
            {{-- Phần bên phải --}}
            <div class="col-3">
                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                    <div class="d-flex align-items-center flex-shrink-0 p-3 text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24"></svg>
                    <span class="fs-5 fw-semibold">Bài viết nổi bật</span></div>
                    <div class="list-group list-group-flush border-bottom scrollarea">
                    @foreach ($posts as $post)
                    <a href="/blog/{{ $post->slug }}" class="list-group-item list-group-item-action py-3 lh-tight">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">{{ $post->title }}</strong>
                        </div>
                        <div class="col-10 mb-1 small">{{ $post->description }}</div>
                    </a>
                    @endforeach
                    </div>
                </div>
                
                <hr>

                {{-- <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                    <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-5 fw-semibold">Category</span>
                    </a>
                    <div class="row">
                        @foreach($categories as $category)
                        <div class="col-4">
                            <a href="" style="margin:10px" class="btn btn-primary stretched-link">{{$category->Title}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <hr>

                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                    <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-5 fw-semibold">Tag</span>
                    </a>
                   
                    <div class="row">
                        @foreach($tags as $tag)
                        <div class="col-4">
                            <a href="" style="margin:10px" class="btn btn-primary stretched-link p-2">{{$tag->Description}}</a>
                        </div>
                       
                    </div>
                </div>
                @endforeach --}}
            </div>
        </div>
</div>
@endsection
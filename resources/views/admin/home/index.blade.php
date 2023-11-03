@extends('admin.layouts.app')

@section('content')
    <span class="fs-4 fw-bold p-2" type="button">Home</span>
    <div class="row text-center mb-2">
        <div class="col border-bottom border-secondary p-3" type="button">
            For you
        </div>
        <div class="col border-bottom border-secondary p-3" type="button">
            Following
        </div>
    </div>
    <div class="row col p-5">
        <div class="col">
            <textarea type="text" cols="100" rows="3" class="w-100 form-control" placeholder="What is on your mind?"></textarea>
            <button class="btn btn-info">Post</button>
        </div>
    </div>
    {{-- Alert Message Start --}}
    @if (Session::has('updateSuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('updateSuccess')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    @endif
    {{-- Alert Message End --}}
    <div class="col row border-top border-secondary overflow-auto sticky-top">
        @foreach ($post as $item)
            <div class="card py-4">
                <div class="container">
                    <div class="container text-center">
                        <img width="50px" class="rounded-circle shadow-sm" @if ($item['userPfp'] == null) src="{{ asset('default/default.png') }}" @else src="{{ asset('postImage/' . $item['userPfp']) }}" @endif>
                    </div>
                    <div class="row">
                        <span class="col-2 fw-bold">{{$item['name']}}</span>
                        <span class="col-10">{{$item->created_at->format('g') - $date1}} hr</span>
                    </div>
                </div>
                <div class="card-body" style="padding-left: 0px;">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <p class="card-text">{{ $item['description'] }}</p>
                </div>
                <img width="100%" class="rounded shadow" height="100%"
                    @if ($item['image'] == null) src="hidden" @else  src="{{ asset('postImage/' . $item['image']) }}" @endif>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col btn">
                            <i class="fa-regular fa-comment"></i>
                        </div>
                        <div class="col btn">
                            <i class="fa-solid fa-heart"></i>
                        </div>
                        <div class="col btn">
                            <i class="fa-solid fa-retweet"></i>
                        </div>
                        <div class="col btn">
                            <i class="fa-solid fa-share"></i>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endforeach
    </div>
@endsection

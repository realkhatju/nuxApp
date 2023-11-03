@extends('admin.layouts.app')

@section('content')
<div class="row">
        <div class="card">
                <div class="card-body">
                    <form action="{{route('admin#createPost')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input name="postTitle" type="text" placeholder="Enter Your Post Title" class="form-control" value="{{old('postTitle')}}">
                        @error('postTitle')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Post Description</label>
                        <textarea name="postDescription" type="text" cols="30" rows="10"class="form-control" placeholder="Enter Your Post Description">{{old('postDescription')}}</textarea>
                        @error('postDescription')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <select name="userId" class="form-control" hidden>
                                @foreach ($userInfo as $item)
                                <option value="{{$item['id']}}" @if ($item['id'] == $userDetails) selected @endif>{{$item['id']}}</option>
                                @endforeach
                            </select>
                            @error('userId')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" value="old('postImage')" name="postImage" class="form-control">
                    </div>
                    {{-- <div class="form-group">
                            <select name="postDescriptionName" class="form-control">
                                <option value="">Choose Category</option>
                                @foreach ($category as $item)
                                <option value="{{$item['category_id']}}">{{$item['title']}}</option>
                                @endforeach
                            </select>
                            @error('postDescriptionName')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                    </div> --}}
                    <button class="btn btn-info" type="submit">Post</button>
                </form>
                </div>
        </div>

        <div class="col-4">
            {{-- Alert Message Start --}}
            @if (Session::has('accountDelete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('accountDelete')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            {{-- Alert Message End --}}
        </div>
</div>
@endsection



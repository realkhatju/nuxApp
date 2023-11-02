@extends('admin.layouts.app')

@section('content')
<span class="fs-4 fw-bold p-2" type="button">Notifications</span>
<div class="row text-center mb-2">
        <div class="col border-bottom border-secondary p-3" type="button">
            All
        </div>
        <div class="col border-bottom border-secondary p-3" type="button">
            Verified
        </div>
        <div class="col border-bottom border-secondary p-3" type="button">
            Mentions
        </div>
</div>

@endsection

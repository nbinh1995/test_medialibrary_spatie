@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session()->has('error'))
            <div class="alert alert-danger mt-1">
                {{session()->get('error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h5>{{ __('Profile') }}</h5>
                        <div class="ml-auto col-5">
                            <form action="{{route('avatar.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group row">
                                    <div class="custom-file col-10">
                                        <input type="file" class="custom-file-input" id="profile" name="avatar">
                                        <label class="custom-file-label" for="profile">Choose file...</label>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @foreach ($avatars as $avatar)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset($avatar->getUrl('card'))}}" class="card-img-top" alt="...">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
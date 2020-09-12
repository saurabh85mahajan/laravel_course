@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>

                <div class="card-body">
                    <form action="{{ route('profiles.update', [$user]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($message = Session::get('error'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name ) }} " />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" readonly="readonly" name="email" class="form-control" value="{{  $user->email  }} " />
                        </div>

                        <div class="form-group">
                            <label for="biography">Biography</label>
                            <textarea name="biography" class="form-control @error('biography') is-invalid @enderror">{{ old('biography', $user->profile->biography ?? '' ) }}</textarea>
                            @error('biography')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('title', $user->profile->address ?? '' ) }} " />
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }} </strong>
                            </span>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

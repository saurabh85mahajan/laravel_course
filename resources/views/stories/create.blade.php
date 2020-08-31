@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Story

                    <a href=" {{ route('stories.index') }}" class="float-right">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('stories.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control">
                                <option value="">--Select--</option>
                                <option value="short">Short</option>
                                <option value="long">Long</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <legend><h6>Status</h6></legend>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="1">
                                <label for="active" class="form-check-label">Yes</label>
                            </div>

                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" value="0">
                                <label for="active" class="form-check-label">No</label>
                            </div>
                        </div>

                        <button class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Stats
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>User</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $stories as $story)
                                <tr>
                                    <td>
                                        {{ $story->title }}
                                    </td>
                                    <td>
                                        {{ $story->type}}
                                    </td>
                                    <td>
                                        {{ $story->user->name}}
                                    </td>
                                    <td>
                                        {{ $story->created_at}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

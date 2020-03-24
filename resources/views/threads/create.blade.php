@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Thread</div>

                <div class="card-body">
                    <form action="/threads" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea name="body" id="body" cols="30" rows="8" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-primary">publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
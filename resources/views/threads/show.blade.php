@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <!-- thread owner and thread title -->
                <a href=""> {{ $thread->creator->name}}</a> posted
                 {{ $thread->title }}
                </div>

                <div class="card-body">
                <!-- thread body -->
                    {{ $thread->body}}
                </div>
            </div>
        </div>
    </div>

       <div class="row justify-content-center mt-4">
        <div class="col-md-8">
        @foreach($thread->replies as $reply)
        <!-- replies to a thread -->
          @include('threads.reply')
        @endforeach    
        </div>
    </div>
</div>
@endsection

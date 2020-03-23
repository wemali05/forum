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

    @if(auth()->check())
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">  
               <form action="{{ $thread->path() }}/replies" method="POST">
               @csrf 

                    <div class="form-group">
                            <textarea  class="form-control" name="body" id="body"  rows="5" placeholder="Have something to say?"></textarea>
                    </div>
                
                    <button type="submit" class="btn btn-default">Post</button>
               </form>
            </div>
        </div>
    @else
        <p class="text-center">Please <a href="{{ route('login')}}">sign in</a> to participate in discussion</p>
    @endif
</div>
@endsection

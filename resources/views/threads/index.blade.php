@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Forum threads</div>

                    <div class="panel-body">
                        @foreach($threads as $thread)
                            <article>
                                <a href="{{$thread->path()}}">
                                    <h4>{{$thread->title}}</h4>
                                </a>

                                <div class="body">{{$thread->body}}</div>
                                <hr>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

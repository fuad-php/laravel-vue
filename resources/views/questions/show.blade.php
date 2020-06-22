@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back To All Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This Question is Useful" class="vote-up" href="">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1100</span>
                            <a title="This question is not useful" class="vote-down off" href="">
                            <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a title="Click to mark as favorite" class="favorite mt-2 favorited" href="">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">100</span>
                            </a>
                        </div>
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted"> Asked {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url}}" class="pr-2">
                                        <img src="{{ $question->user->avatar}}" alt="avater_img">
                                    </a>
                                    <div class="media-body mt-1">
                                        <a href="{{ $question->user->url}}">{{ $question->user->name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count ." ".Str::plural('Answer', $question->answers_count) }}</h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="This Answer is Useful" class="vote-up" href="">
                                    <i class="fas fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">1100</span>
                                <a title="This Answer is not useful" class="vote-down off" href="">
                                <i class="fas fa-caret-down fa-3x"></i>
                                </a>
                                <a title="Mark this answer as best answer" class="vote-accepted mt-2" href="">
                                    <i class="fas fa-check fa-2x"></i>                                    
                                </a>
                            </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}                            
                                <div class="float-right">
                                    <span class="text-muted"> Answered {{ $answer->created_date }}</span>
                                    <div class="media mt-2">
                                        <a href="{{ $answer->user->url}}" class="pr-2">
                                            <img src="{{ $answer->user->avatar}}" alt="avater_img">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href="{{ $answer->user->url}}">{{ $answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
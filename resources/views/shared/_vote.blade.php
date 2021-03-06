@if($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISegment = 'questions';
    @endphp
@elseif($model instanceof App\Answer)
    @php
        $name = 'answer';
        $firstURISegment = 'answers';
    @endphp
@endif

@php
    $formId = $name ."-". $model->id;
    $formAction = "/$firstURISegment/$model->id/vote";
@endphp

<div class="d-flex flex-column vote-controls">
    <a title="This {{ $name }} is Useful" 
    onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();"
    class="vote-up {{ Auth::guest() ? 'off' : ''}}">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>
    <form action="{{ $formAction }}" method="post" id="up-vote-{{ $formId }}">
        @csrf
        <input type="hidden" name="vote" value="1">                                
    </form>
    <span class="votes-count">{{ $model->votes_count }}</span>
    <a title="This {{ $name }} is not useful"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();" 
        class="vote-down {{ Auth::guest() ? 'off' : ''}}">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>
    <form action="{{ $formAction }}" method="post" id="down-vote-{{ $formId }}">
        @csrf
        <input type="hidden" name="vote" value="-1">                                
    </form>

    @if($model instanceof App\Question)
        @include('shared._favorite', ['model' => $model])
    @elseif($model instanceof App\Answer)
        @include('shared._accept', ['model' => $model])
    @endif
</div>
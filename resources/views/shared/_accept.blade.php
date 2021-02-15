@can('accept', $model)
<a title="Mark this answer as best answer" class="{{ $model->status }} mt-2" 
    onclick="event.preventDefault(); document.getElementById('accept-answer-{{$model->id}}').submit();">                                    
    <i class="fas fa-check fa-2x"></i>                                    
</a>
<form action="{{ route('answers.accept',$model->id) }}" method="post" id="accept-answer-{{$model->id}}">
    @csrf
</form>
@else
@if($model->is_best)
    <a title="Question owner marked this answer as best answer" class="{{ $model->status }} mt-2">                                    
    <i class="fas fa-check fa-2x"></i>                                    
    </a>
@endif
@endcan
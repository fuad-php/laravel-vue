@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3>Editting answer for question : <strong>{{ $question->title }}</strong></h3>
                    </div>
                    <hr>
                    <form method="post" action="{{ route('questions.answers.update',[$question->id,$answer->id])}}">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <textarea name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : ''}}" rows="7">{{ old('body',$answer->body) }}</textarea>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    <strong class="">{{ $errors->first('body') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
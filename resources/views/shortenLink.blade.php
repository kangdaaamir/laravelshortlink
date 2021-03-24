@extends('layouts.layout')
@section('content')


<div class="card">
  <div class="card-header">
    {!! Form::open(array('route' => 'generate.shorten.post','method'=>'POST')) !!}

    <div class="input-group mb-3">
      {!! Form::text('link', null, array('placeholder' => "Enter Url",'class' => 'form-control')) !!}
      @error('link')
      <span class="text-danger error-msg small">{{ $message }}</span>
      @enderror
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Generate Shorten Link</button>
    </div>
</div>
{!! Form::close() !!}
</div>

</div>





@endsection
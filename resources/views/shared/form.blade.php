{{ Form::model($url, ['url' => route('store')]) }}
    <div class="form-group">
        {{ Form::label('url', 'Input url') }}
        {{ Form::text('url', $url->url, ['class' => 'form-control']) }}
        @error('url')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}

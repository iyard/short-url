{{ Form::model($url, ['url' => route('store')]) }}
    <div class="form-group">
        {{ Form::label('url', 'Введите адрес') }}
        {{ Form::text('url', $url->url, ['class' => 'form-control']) }}
    </div>
    {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}

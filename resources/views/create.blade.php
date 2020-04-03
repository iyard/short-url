@extends('layouts.app')

@section('title', 'Short uls')

@section('content')
    <h1>Create short url</h1>

    @include('shared.form')

    <div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">URL</th>
            <th scope="col">TOKEN</th>
            <th scope="col">COUNT VISITS</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($urls as $url)
            <tr>
                <th scope="row">{{ $url->id }}</th>
                <td>{{ $url->url }}</td>
                <td>{{ $url->token }}</td>
                <td>{{ $url->count_visits }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    {{ $urls->links() }}
@endsection

<!-- Copyright (c) Microsoft Corporation.
     Licensed under the MIT License. -->

<!-- <CalendarSnippet> -->
@extends('layout')

@section('content')
    <h1>Channel Messages</h1>
        @isset($messages)
            <ul>
            @foreach($messages as $messages)
                <li>{{ $message->getBody() }}</li>
            @endforeach
            </ul>
        @endif
@endsection
<!-- Copyright (c) Microsoft Corporation.
     Licensed under the MIT License. -->

<!-- <CalendarSnippet> -->
@extends('layout')

@section('content')
    <h1>Channels</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">DisplayName</th>
            <th scope="col">Description</th>
        </tr>
        </thead>
        <tbody>
        @isset($channels)
            @foreach($channels as $channel)
                <tr>
                    <td><a href="{{ route('$channel', [$channel->getId()]) }}">{{ $channel->getDisplayName() }}</a></td>
                    <td>{{ $channel->getDescription() }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
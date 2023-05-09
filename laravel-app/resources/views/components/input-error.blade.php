@props(['messages'])

@if ($messages)
    <ul style="margin:0px;">
        @foreach ((array) $messages as $message)
            <li>{{ $message}}</li>
        @endforeach
    </ul>
@endif

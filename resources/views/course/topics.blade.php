@if(count($topics))
    @foreach($topics as $topic)
        {{ $topic->{'Course combined'} . " - " . $topic->{'Course code'} }}</br>
    @endforeach
@endif
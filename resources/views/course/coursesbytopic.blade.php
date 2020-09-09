@if(isset($topic))
    {{ $topic->{'Course code'} }} </br>
    @if(count($topic->coursecodes))
        @foreach($topic->coursecodes as $course)
            {{$course->ID}} - {{ $course->CourseCode }} </br> 
        @endforeach
    @endif
@endif

<!-- @foreach($posts as $post)
    @if($post->user == auth()->user())

        <h1>{{ $post->title }}</h1>

        <p>{{ $post->content }}</p>

        {{ $post->user }}
    @endif
@endforeach -->

{{ auth()->user()->post }}

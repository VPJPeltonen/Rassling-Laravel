@extends ('layouts.main')

@section ('content')
    <h2>Match Results</h2>
    <ul>
      @foreach ($matches as $match)
        <li>
            <a href ='/matches/{{ $match->id }}'>
              {{ $match->result }}
            </a>
        </li>
      @endforeach
    </ul>
    <h2>Tag Match Results</h2>
    <ul>
      @foreach ($tagmatches as $tag)
        <li>
          <a href ='/tagmatches/{{ $tag->id }}'>
            {{ $tag->result }}
          </a>
        </li>
      @endforeach
    </ul>
@endsection

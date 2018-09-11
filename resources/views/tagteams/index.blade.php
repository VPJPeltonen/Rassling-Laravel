@extends ('layouts.main')

@section ('content')
    <ul>
      @foreach ($tagteams as $tagteam)
        <li>
            <a href ='/tagteams/{{ $tagteam->id }}'>
              {{ $tagteam->name }}
            </a>
        </li>
      @endforeach
    </ul>
@endsection

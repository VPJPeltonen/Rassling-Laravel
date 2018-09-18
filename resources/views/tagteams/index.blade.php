@extends ('layouts.main')

@section ('content')
    <h1>Tag Teams</h1>
    <ul>
      @foreach ($tagteams as $tagteam)
        <li>
            <a href ='/tagteams/{{ $tagteam->id }}'>
              <b>{{ $tagteam->name }}</b>
            </a>
        </li>
      @endforeach
    </ul>
@endsection

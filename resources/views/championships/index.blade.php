@extends ('layouts.main')

@section ('content')
    <ul>
      @foreach ($wrestlers as $wrestler)
        <li>
            <a href ='/wrestlers/{{ $wrestler->id }}'>
              {{ $wrestler->name }}
            </a>
        </li>
      @endforeach
    </ul>
@endsection

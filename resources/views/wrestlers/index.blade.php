@extends ('layouts.main')

@section ('content')
  <h1>Wrestlers</h1>
  <h2>Men</h2>
    <ul>
      @foreach ($wrestlers as $wrestler)
        <?php if ($wrestler->gender == 'M'){ ?>
        <li>
            <a href ='/wrestlers/{{ $wrestler->id }}'>
              {{ $wrestler->name }}
            </a>
        </li>
      <?php } ?>
      @endforeach
    </ul>
    <h2>Women</h2>
    @foreach ($wrestlers as $wrestler)
      <?php if ($wrestler->gender == 'N'){ ?>
      <li>
          <a href ='/wrestlers/{{ $wrestler->id }}'>
            {{ $wrestler->name }}
          </a>
      </li>
    <?php } ?>
    @endforeach
@endsection

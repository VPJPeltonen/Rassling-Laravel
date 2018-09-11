@extends ('layouts.main')

@section ('content')
    <h1>Championships (latest champion)</h1>
    <ul>
      @foreach ($championships as $championship)
      <?php
      $title =  $championship->name;
      foreach ($championshipreigns as $reign){
        if ($reign->championship == $title){
          $champ = $reign->wrestler;
          break;
        }else{
          $champ = 'none';
        }
      }
      ?>
        <li>
            <a href ='/championships/{{ $championship->id }}'>
              <b>{{ $title }}</b>
              (
              {{ $champ }}
              )
            </a>
        </li>
      @endforeach
    </ul>
@endsection

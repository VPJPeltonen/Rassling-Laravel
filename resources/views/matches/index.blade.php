@extends ('layouts.main')

@section ('content')
    <h2>Match Results</h2>
    <ul>
      @foreach ($matches as $match)
        <?php
        $result =  $match->result;
        $rasslers = array();
        foreach ($matchparticipations as $participation){
          if ($participation->contest == $match->id){
            $rasslers[] = $participation->wrestler;
          }
        }
        ?>
        <li>
          <!--
          Lista otteluista, niiden osallistujista,mahdollinen mestaruus ja voittaja
          -->
            <a href ='/matches/{{ $match->id }}'>
              <?php
              foreach ($rasslers as $rassler){
                echo $rassler->name;
              }
               ?>
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

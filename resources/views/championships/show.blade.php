@extends ('layouts.main')

@section ('content')
  <h1> {{$championship->name}}</h1>
  
  <!-- Get reigns  -->
  <?php $reigns = App\ChampionshipReign::where('championship',$championship->name)->orderBy('begining', 'ASC')->get(); ?>
  <h2>Holders:</h2>
  @foreach ($reigns as $reign)
    <?php //get title id to link to
    $link = App\Wrestler::where('name',$reign->wrestler)->first();
    ?>
    <li>
    <a href ='/wrestlers/{{ $link->id }}'>
      {{$reign->wrestler}} {{$reign->begining}} - {{$reign->end}}
    </a>
    </li>
  @endforeach
  <!-- Tag Reigns -->
  <?php $reigns = App\TagReign::where('championship',$championship->name)->orderBy('begining', 'ASC')->get(); ?>  
  @foreach ($reigns as $reign)
    <?php //get title id to link to
    $link = App\TagTeam::where('name',$reign->tag_team)->first();
    ?>
    <li>
    <a href ='/tagteams/{{ $link->id }}'>
      {{$reign->tag_team}} {{$reign->begining}} - {{$reign->end}}
    </a>
    </li>
  @endforeach
@endsection

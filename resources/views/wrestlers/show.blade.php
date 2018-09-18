@extends ('layouts.main')

@section ('content')
  <h1> {{$wrestler->name}}</h1>
  <p>Height: {{$wrestler->height}}cm</p>
  <p>Weight: {{$wrestler->weight}}kg</p>

  <h2>Titles</h2>
  <?php $championships = App\ChampionshipReign::where('wrestler',$wrestler->name)->get(); ?>
  <ul>
  @foreach ($championships as $title)
    <?php //get title id to link to
    $link = App\Championship::where('name',$title->championship)->first();
    ?>
    <li>
    <a href ='/championships/{{ $link->id }}'>
      {{$title->championship}} {{$title->begining}} - {{$title->end}}
    </a> 
    </li>
  @endforeach
  </ul>
  
  <!-- tag titles 
  get tagteams they are part of -->
  <?php
  $tagteams1 = App\TagTeam::where('wrestler1', $wrestler->name)->get();
  $tagteams2 = App\TagTeam::where('wrestler2', $wrestler->name)->get();
  $merged = $tagteams1->merge($tagteams2);
  $tagteams = $merged->all();
  //tag reigns
  ?>
  
  @foreach($tagteams as $tag)
    <?php $championships = App\TagReign::where('tag_team',$tag->name)->get();?>
    @foreach ($championships as $title)
    <?php //get title id to link to
      $link = App\Championship::where('name',$title->championship)->first();
      ?>
      <li>
      <a href ='/championships/{{ $link->id }}'>
        {{$title->championship}} {{$title->begining}} - {{$title->end}}
      </a> 
      </li>
    @endforeach
  @endforeach
  
  <!-- List Tag teams -->
  <h2>teams</h2>
  <ul>
  @foreach ($tagteams as $tag)  
    <li>
    <a href ='/tagteams/{{ $tag->id }}'>
      {{$tag->name}}
    </a>    
    </li>
  @endforeach
  </ul>
@endsection

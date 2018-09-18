@extends ('layouts.main')

@section ('content')
  <h1> {{$tagteam->name}}</h1>

  <h2>Members: </h2>
  <ul>
    <?php $link = App\Wrestler::where('name',$tagteam->wrestler1)->first(); ?>
    <li><a href ='/wrestlers/{{ $link->id }}'>{{$tagteam->wrestler1}}</a></li>
    <?php $link = App\Wrestler::where('name',$tagteam->wrestler2)->first(); ?>
    <li><a href ='/wrestlers/{{ $link->id }}'>{{$tagteam->wrestler2}}</a></li>
  </ul>

  <h2>Championships:</h2>
  <?php $championships = App\TagReign::where('tag_team',$tagteam->name)->get(); ?>
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
@endsection

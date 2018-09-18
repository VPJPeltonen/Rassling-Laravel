@extends ('layouts.main')

@section ('content')
  <h1>Add Tag Team:</h1>
  <form>
    Name:<br>
    <input type="text" name="name"><br>      
    Wrestlers:<br>
    <select name="wrestler1">
        @foreach($wrestlers as $wrestler)
            <option value="volvo">{{$wrestler->name}}</option>
        @endforeach
    </select>  
    <select name="wrestler2">
        @foreach($wrestlers as $wrestler)
            <option value="volvo">{{$wrestler->name}}</option>
        @endforeach
    </select> 
    <input type="submit" value="Add">
  </form>
@endsection

<h1>
    add number
</h1>

@if (session('status'))
    <h4>{{ session('status') }}</h4>
@endif
<form action="{{ url('addnumber') }} " method="POST">
    @csrf

    <input type="text" name="firstname">
    <input type="text" name="lastname">
    <input type="text" name="number">
    <input type="email" name="email">
    <button type="submit">Submit </button>
</form>



@forelse ($numbers as $key => $item )
<h4>{{$key}}</h4>
<br>
<h4>{{$item['fname']}}</h4>

<br>
<h4>{{$item['lname']}}</h4>

<br><h4>{{$item['number']}}</h4>

<br><h4>{{$item['email']}}</h4>

<br>
<a href="">EDit</a>
<br>
<a href="">delete</a>

@empty
    <h4>NO Record</h4>
@endforelse

{{-- @if (session('status'))
    <h4>{{ session('status') }}</h4>
@endif
<form action="{{ url('updatednumber/'.$key) }} " method="POST">
    @csrf
@method('PUT')
    <input type="text" value="{{ $editdata['fname'] }}" name="firstname">
    <input type="text"value="{{ $editdata['lname'] }}" name="lastname">
    <input type="text"value="{{ $editdata['number'] }}" name="number">
    <input type="email"value="{{ $editdata['email'] }}" name="email">
    <button type="submit">update </button>
</form>

<h5>edit page</h5> --}}

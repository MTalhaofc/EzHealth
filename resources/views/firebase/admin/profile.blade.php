<h1>
    Hi


</h1>

@if(session('status'))
    <h4>{{session('status')}}</h4>
@endif


    <a href="{{url('addnumber')}}">

<button>
Add number

</button>
</a>
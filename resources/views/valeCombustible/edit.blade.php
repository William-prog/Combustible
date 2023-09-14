<form action="{{url('/valeCombustible/'.$dato->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('valeCombustible.formEdit')
</form>
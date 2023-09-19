<form action="{{url('/valeCombustible/'.$datoSolicitante->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('valeCombustible.formEdit')
</form>
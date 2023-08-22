<form action="{{url('/vehiculo/' .$dato->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('vehiculo.formEdit')
</form>
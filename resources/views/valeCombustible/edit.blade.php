<form action="{{url('/ValeCombustible/' .$dato->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('valeCombustible.formEdit')
</form>
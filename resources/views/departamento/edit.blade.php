<form action="{{ url('/departamento/' .$dato->id)}}" method="post">
    @csrf
    {{ method_field('PATCH')}}
    @include('departamento.formEdit')
</form>
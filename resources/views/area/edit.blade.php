<form action="{{ url('/area/' . $dato->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    @include('area.formEdit')
</form>

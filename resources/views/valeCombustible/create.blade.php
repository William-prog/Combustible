<form action="{{ url('/valeCombustible') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('valeCombustible.form');

</form>
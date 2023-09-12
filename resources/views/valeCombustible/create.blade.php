<form action="{{ url('/ValeCombustible') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('valeCombustible.form');

</form>
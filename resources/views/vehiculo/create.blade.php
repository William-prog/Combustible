<form action="{{ url('/vehiculo') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('vehiculo.form')

</form>
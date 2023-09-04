<form action="{{url ('/departamento')}}"method="post" enctype="multipart/form-data">
    @csrf
    @include('departamento.form')
    </form>
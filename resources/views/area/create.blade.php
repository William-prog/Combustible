<form action="{{url ('/area')}}"method="post" enctype="multipart/form-data">
    @csrf
    @include('area.form');
    </form>
@extends('admin.layout')

@section('title')
    Փոփոխել սերվիս
@endsection
 
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել Սերվիս: {{ $item['title_am'] }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('product.update', $item["id"]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր Հայերեն</label>
                                    <input type="text" value="{{ $item['title_am'] }}" name="title_am" class="form-control" id="title_am" placeholder="Մուտքագրել վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_ru">Վերնագիր Ռուսերեն</label>
                                    <input type="text" value="{{ $item['title_ru'] }}" name="title_ru" class="form-control" id="title_ru" placeholder="Մուտքագրել վերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր Անգլերեն</label>
                                    <input type="text" value="{{ $item['title_en'] }}" name="title_en" class="form-control" id="title_en" placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="price">Գինը</label>
                                    <input type="number" value="{{ $item['price'] }}" name="price" class="form-control" id="price" placeholder="Մուտքագրել գինը անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="editor">Բովանդակություն Հայերեն</label>
                                    <textarea id="editor" name="content_am" class="form-control" placeholder="Մուտքագրել բովանդակություն հայերեն">{{ $item['content_am'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editor2">Բովանդակություն Ռուսերեն</label>
                                    <textarea id="editor2" name="content_ru" class="form-control" placeholder="Մուտքագրել բովանդակություն ռուսերեն">{{ $item['content_ru'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="editor3">Բովանդակություն Անգլերեն</label>
                                    <textarea id="editor3" name="content_en" class="form-control" placeholder="Մուտքագրել բովանդակություն անգլերեն">{{ $item['content_en'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <p class="font-bold">Նկար</p>
                                    <label for="img" class="file-label">
                                        <input type="file" name="img" value="{{ $item['img'] }}" class="d-none" id="img" accept="image/*">
                                        <span>Ընտրել Նկար</span>
                                    </label>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
                                <a href="{{ route('product.index') }}" class="btn btn-success ">Չեղարկել</a>
                            </div>
                        </form>
                        @if ($errors->any())
                            <div class="mt-3 alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ],
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor3' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
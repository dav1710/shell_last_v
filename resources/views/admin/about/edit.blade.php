@extends('admin.layout')

@section('title', 'Փոփոխել մեր մասին տվյալները')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել մեր մասին տվյալները</h1>
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
                        <form action="{{ route('about.update', '1') }}" method="POST">
                            @csrf
                            @method('PUT') 

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր հայերեն:</label>
                                    <input type="text" name="title_am" value="{{ $item['title_am'] }}" class="form-control" id="title_am"  placeholder="Մուտքագրել վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_ru">Վերնագիր ռուսերեն:</label>
                                    <input type="text" name="title_ru" value="{{ $item['title_ru'] }}" class="form-control" id="title_ru"  placeholder="Մուտքագրել վերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր անգլերեն:</label>
                                    <input type="text" name="title_en" value="{{ $item['title_en'] }}" class="form-control" id="title_en"  placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle_am">Ենթավերնագիր հայերեն:</label>
                                    <input type="text" name="subtitle_am" value="{{ $item['subtitle_am'] }}" class="form-control" id="subtitle_am"  placeholder="Մուտքագրել ենթավերնագիր  հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle_ru">Ենթավերնագիր ռուսերեն:</label>
                                    <input type="text" name="subtitle_ru" value="{{ $item['subtitle_ru'] }}" class="form-control" id="subtitle_ru"  placeholder="Մուտքագրել ենթավերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle_en">Ենթավերնագիր անգլերեն:</label>
                                    <input type="text" name="subtitle_en" value="{{ $item['subtitle_en'] }}" class="form-control" id="subtitle_en"  placeholder="Մուտքագրել ենթավերնագիր անգլերեն">
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
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
                                <a href="{{ route('about.index') }}" class="btn btn-success ">Չեղարկել</a>
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
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'textedList' ],
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'textedList', 'blockQuote' ],
            } )
            .catch( error => {
                console.error( error );
            } );
        ClassicEditor
            .create( document.querySelector( '#editor3' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'textedList', 'blockQuote' ],
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
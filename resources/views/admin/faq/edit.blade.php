@extends('admin.layout')

@section('title', 'Փոփոխել տվյալները')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել տվյալները</h1>
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
                        <form action="{{ route('faq.update', $item['id']) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="question_am">Հարցը Հայերեն</label>
                                    <input type="text" name="question_am" value="{{ $item['question_am'] }}" class="form-control" id="question_am"  placeholder="Մուտքագրել հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="question_ru">Հարցը Ռուսերեն</label>
                                    <input type="text" name="question_ru" value="{{ $item['question_ru'] }}" class="form-control" id="question_ru"  placeholder="Մուտքագրել հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="question_en">Հարցը Անգլերեն</label>
                                    <input type="text" name="question_en" value="{{ $item['question_en'] }}" class="form-control" id="question_en"  placeholder="Մուտքագրել հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="answer_am">Պատասխան Հայերեն</label>
                                    <input type="text" name="answer_am" value="{{ $item['answer_am'] }}" class="form-control" id="answer_am"  placeholder="Մուտքագրել հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="answer_ru">Պատասխան Ռուսերեն</label>
                                    <input type="text" name="answer_ru" value="{{ $item['answer_ru'] }}" class="form-control" id="answer_ru"  placeholder="Մուտքագրել հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="answer_en">Պատասխան Անգլերեն</label>
                                    <input type="text" name="answer_en" value="{{ $item['answer_en'] }}" class="form-control" id="answer_en"  placeholder="Մուտքագրել հասցե">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
                                <a href="{{ route('faq.index') }}" class="btn btn-success ">Չեղարկել</a>
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

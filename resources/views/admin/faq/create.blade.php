@extends('admin.layout')

@section('title')
    Ավելացնել Հարցեր և Պատասխաններ
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել</h1>
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
                        <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="question_am">Հարցը Հայերեն</label>
                                    <input type="text" value="{{ old('question_am') }}" name="question_am" class="form-control" placeholder="Մուտքագրել հարցը հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="question_ru">Հարցը Ռուսերեն</label>
                                    <input type="text" value="{{ old('question_ru') }}" name="question_ru" class="form-control" placeholder="Մուտքագրել հարցը ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="question_en">Հարցը Անգլերեն</label>
                                    <input type="text" value="{{ old('question_en') }}" name="question_en" class="form-control" placeholder="Մուտքագրել հարցը անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="answer_am">Պատասխան Հայերեն</label>
                                    <input type="text" value="{{ old('answer_am') }}" name="answer_am" class="form-control" placeholder="Մուտքագրել պատասխանը հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="answer_ru">Պատասխան Ռուսերեն</label>
                                    <input type="text" value="{{ old('answer_ru') }}" name="answer_ru" class="form-control" placeholder="Մուտքագրել պատասխանը ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="answer_en">Պատասխան Անգլերեն</label>
                                    <input type="text" value="{{ old('answer_en') }}" name="answer_en" class="form-control" placeholder="Մուտքագրել պատասխանը անգլերեն">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">+ Ավելացնել</button>
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


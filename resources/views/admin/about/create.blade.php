@extends('admin.layout')

@section('title')
    Ավելացնել սերվիս
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
                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_am">Վերնագիր Հայերեն</label>
                                    <input type="text" value="{{ old('title_am') }}" name="title_am" class="form-control" placeholder="Մուտքագրել վերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_ru">Վերնագիր Ռուսերեն</label>
                                    <input type="text" value="{{ old('title_ru') }}" name="title_ru" class="form-control" placeholder="Մուտքագրել վերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Վերնագիր Անգլերեն</label>
                                    <input type="text" value="{{ old('title_en') }}" name="title_en" class="form-control" placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_am">Ենթավերնագիր Հայերեն</label>
                                    <input type="text" value="{{ old('subtitle_am') }}" name="subtitle_am" class="form-control" placeholder="Մուտքագրել ենթավերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_ru">Ենթավերնագիր Ռուսերեն</label>
                                    <input type="text" value="{{ old('subtitle_ru') }}" name="subtitle_ru" class="form-control" placeholder="Մուտքագրել ենթավերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Ենթավերնագիր Անգլերեն</label>
                                    <input type="text" value="{{ old('subtitle_en') }}" name="subtitle_en" class="form-control" placeholder="Մուտքագրել ենթավերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_am">Բովանդակություն Հայերեն</label>
                                    <input type="text" value="{{ old('content_am') }}" name="content_am" class="form-control" placeholder="Մուտքագրել բովանդակություն հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_ru">Բովանդակություն Ռուսերեն</label>
                                    <input type="text" value="{{ old('content_ru') }}" name="content_ru" class="form-control" placeholder="Մուտքագրել բովանդակություն ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Բովանդակություն Անգլերեն</label>
                                    <input type="text" value="{{ old('content_en') }}" name="content_en" class="form-control" placeholder="Մուտքագրել բովանդակություն անգլերեն">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">+ Ավելացնել</button>
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


@extends('admin.layout')

@section('title')
    Ավելացնել Կոնտակտ
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
                        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address_am">Հասցեն Հայերեն</label>
                                    <input type="text" value="{{ old('address_am') }}" name="address_am" class="form-control" placeholder="Մուտքագրել հասցեն հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="address_ru">Հասցեն Ռուսերեն</label>
                                    <input type="text" value="{{ old('address_ru') }}" name="address_ru" class="form-control" placeholder="Մուտքագրել հասցեն ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="address">Հասցեն Անգլերեն</label>
                                    <input type="text" value="{{ old('address') }}" name="address" class="form-control" placeholder="Մուտքագրել հասցեն անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Հեռախոսահամար</label>
                                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" placeholder="Մուտքագրել վերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="email">Էլ․Փոստ</label>
                                    <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="Մուտքագրել վերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Ֆեյսբուք</label>
                                    <input type="text" value="{{ old('fb_link') }}" name="fb_link" class="form-control" placeholder="Մուտքագրել ենթավերնագիր հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="insta_link">Ինստագրամ</label>
                                    <input type="text" value="{{ old('insta_link') }}" name="insta_link" class="form-control" placeholder="Մուտքագրել ենթավերնագիր ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="ld_link">Լինքդին</label>
                                    <input type="text" value="{{ old('ld_link') }}" name="ld_link" class="form-control" placeholder="Մուտքագրել ենթավերնագիր անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="tw_link">Թվիթեր</label>
                                    <input type="text" value="{{ old('tw_link') }}" name="tw_link" class="form-control" placeholder="Մուտքագրել բովանդակություն հայերեն">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">+ Ավելացնել</button>
                                <a href="{{ route('contact.index') }}" class="btn btn-success ">Չեղարկել</a>
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


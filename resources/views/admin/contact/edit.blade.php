@extends('admin.layout')

@section('title', 'Փոփոխել մեր մասին տվյալները')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Փոփոխել կոնտակտային տվյալները</h1>
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
                        <form action="{{ route('contact.update', $item['id']) }}" method="POST">
                            @csrf
                            @method('PUT') 

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="address">Հասցեն Հայերեն:</label>
                                    <input type="text" name="address_am" value="{{ $item['address_am'] }}" class="form-control" id="address"  placeholder="Մուտքագրել հասցեն հայերեն">
                                </div>
                                <div class="form-group">
                                    <label for="address">Հասցե Ռուսերեն:</label>
                                    <input type="text" name="address_ru" value="{{ $item['address_ru'] }}" class="form-control" id="address"  placeholder="Մուտքագրել հասցեն ռուսերեն">
                                </div>
                                <div class="form-group">
                                    <label for="address">Հասցե Անգլերեն:</label>
                                    <input type="text" name="address" value="{{ $item['address'] }}" class="form-control" id="address"  placeholder="Մուտքագրել հասցեն անգլերեն">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Հեռախոսահամար:</label>
                                    <input type="text" name="phone" value="{{ $item['phone'] }}" class="form-control" id="phone"  placeholder="Մուտքագրել հեռախոսահամար">
                                </div>
                                <div class="form-group">
                                    <label for="email">Էլ֊Հասցե:</label>
                                    <input type="email" name="email" value="{{ $item['email'] }}" class="form-control" id="email"  placeholder="Մուտքագրել էլ֊ հասցե">
                                </div>
                                <div class="form-group">
                                    <label for="fb_link">Facebook-ի հղում:</label>
                                    <input type="text" name="fb_link" value="{{ $item['fb_link'] }}" class="form-control" id="fb_link"  placeholder="Մուտքագրել Facebook-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="insta_link">Instagram-ի հղում:</label>
                                    <input type="text" name="insta_link" value="{{ $item['insta_link'] }}" class="form-control" id="insta_link"  placeholder="Մուտքագրել Instagram-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="ld_link">Linkedin-ի հղում:</label>
                                    <input type="text" name="ld_link" value="{{ $item['ld_link'] }}" class="form-control" id="ld_link"  placeholder="Մուտքագրել Linkedin-ի հղում">
                                </div>
                                <div class="form-group">
                                    <label for="tw_link">Twitter-ի հղում:</label>
                                    <input type="text" name="tw_link" value="{{ $item['tw_link'] }}" class="form-control" id="tw_link"  placeholder="Մուտքագրել Twitter-ի հղում">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Պահպանել</button>
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
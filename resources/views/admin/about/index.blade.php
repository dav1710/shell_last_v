@extends('admin.layout')

@section('title')
    Մեր մասին
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Մեր մասին</h1>
                    <a class="btn btn-outline-success btn-sm ml-3" href="{{ route('about.edit', '1') }}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Փոփոխել
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover">
                        <tbody class="text-nowrap">
                            <tr>
                                <th>Վերնագիր:</th>
                                <td>{{ isset($item->title_am) ? $item->title_am : ''}}</td>
                            </tr>
                            <tr>
                                <th>Ենթավերնագիր:</th>
                                <td>{{ isset($item->subtitle_am) ? $item->subtitle_am : '' }}</td>
                            </tr>
                            <tr>
                                <th>Բովանդակություն:</th>
                                <td>{!! isset($item->content_am) ? $item->content_am : '' !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection

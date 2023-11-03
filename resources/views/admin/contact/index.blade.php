@extends('admin.layout')

@section('title')
    Կոնտակտներ
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Կոնտակտնային տվյալներ</h1>
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
                            @foreach ($contact as $item)
                                <tr>
                                    <th>Հասցե:</th>
                                    <td>{{ $item->address }}</td>
                                </tr>
                                <tr>
                                    <th>Հեռախոսահամար:</th>
                                    <td>{{ $item->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Էլ-հասցե:</th>
                                    <td>{{ $item->email }}</td>
                                </tr>
                                <tr>
                                    <th>Facebook-ի հղում:</th>
                                    <td>{{ $item->fb_link }}</td>
                                </tr>
                                <tr>
                                    <th>Instagram-ի հղում:</th>
                                    <td>{{ $item->insta_link }}</td>
                                </tr>
                                <tr>
                                    <th>Linkedin-ի հղում:</th>
                                    <td>{{ $item->ld_link }}</td>
                                </tr>
                                <tr>
                                    <th>Twitter-ի հղում:</th>
                                    <td>{{ $item->tw_link }}</td>
                                </tr>
                                <tr>
                                    <th>Փոփոխել:</th>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm" href="{{ route('contact.edit',$item->id) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Փոփոխել
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection

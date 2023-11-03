@extends('admin.layout')

@section('title')
    Սերվիսներ
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Բոլոր Սերվիսները</h1>
                    @if (count($services) < 4)
                        <a href="{{ route('service.create') }}" class="btn btn-outline-primary mx-2">Ավելացնել +</a>
                    @endif
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
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="max-width: 1%">
                                    ID
                                </th>
                                <th>
                                    Վերնագիր
                                </th>
                                <th>
                                    Նկար
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                                <tr>
                                    <td>
                                        {{ $item['id'] }}
                                    </td>
                                    <td>
                                        {{ $item['title_am'] }}
                                    </td>
                                    <td>
                                        @if ($item['img'])
                                            <img src="{{ asset('storage/uploads/service/' . $item['img']) }}">
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-outline-info btn-sm"
                                            href="{{ route('service.edit', $item['id']) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Փոփոխել
                                        </a>
                                        <form action="{{ route('service.destroy', $item['id']) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm delete-btn">
                                                <i class="fas fa-trash">
                                                </i>
                                                Ջնջել
                                            </button>
                                        </form>
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

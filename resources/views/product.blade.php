@extends('layouts.app')
@section('title')
    Product
@endsection
@section('content')
    <div class="container row all_products">
        @foreach ($product as $item)
        <div class="card col-md-3">
            <img src="{{ asset('storage/uploads/product/'.$item->img) }}" alt="{{ $item->img }}" class="product_image_all" style="width: auto !important;">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title_am }}</h5>
                <p class="price">{{ $item->price }} AMD</p>
            </div>
        </div>
        @endforeach

        {!! $product->appends(Request::all())->links() !!}
    </div>
@endsection
@section('scripts')
<script>
</script>
@endsection

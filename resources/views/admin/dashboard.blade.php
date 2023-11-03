@extends('admin.layout')
@section('title')
    Գլխավոր
@endsection

@section('content')
    <div>
        <div class="d-flex flex-wrap justify-content-center p-3" style="gap: 30px;">
            <div class="small-box bg-danger" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $slide_count }}</h3>
                    <p>Սլայդներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-images fa-2xl"></i>
                </div>
                <a href="{{ route('slide.index') }}" class="small-box-footer">Ավելին <i class="fas fa-arrow-circle-right"></i></a>
            </div>

            <div class="small-box bg-light" style="min-width: 300px;">
                <div class="inner">
                    <h3>{{ $service_count }}</h3>
                    <p>Սերվիսներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-user-shield fa-2xl"></i>
                </div>
                <a href="{{ route('service.index') }}" class="small-box-footer">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>

            <div class="small-box" style="min-width: 300px; background-color: #FFEBCD">
                <div class="inner">
                    <h3>{{ $product_count }}</h3>
                    <p>Ապրանքներ</p>
                </div>
                <div class="icon">
                    <i class="fas fa-solid fa-paste fa-2xl"></i>
                </div>
                <a href="{{ route('product.index') }}" class="small-box-footer" style="color: black">Ավելին <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    </div>
@endsection
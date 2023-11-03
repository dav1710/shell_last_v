@extends('admin.layout')

@section('title')
    Ավելացնել Հասցե
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ավելացնել Հասցե</h1>
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
                        <form action="{{ route('map.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div id="map" style="width:900px; height:580px; margin-bottom: 20px"></div>
                                <input id="latitude" type="text" class="form-control w-25 mb-3" placeholder="latitude" name="latitude">
                                <input id="longitude" type="text" class="form-control w-25 mb-3" placeholder="longitude" name="longitude">
                                <input id="address" type="text" class="form-control w-25 mb-3" placeholder="address" name="address">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">+ Ավելացնել</button>
                                <a href="{{ route('slide.index') }}" class="btn btn-success ">Չեղարկել</a>
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
      var mapOptions = {
            center: [40.21452640742982, 44.52145498531859],
            zoom: 10
         }
         // Creating a map object
         var map = new L.map('map', mapOptions);

         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

         // Adding layer to the map
         map.addLayer(layer);

         // Creating a marker
         var marker = L.marker([40.21452640742982, 44.52145498531859], {draggable: true}).addTo(map);

            marker.bindPopup("<b>Locator!</b>").openPopup();

         marker.on('dragend', function(event) {
            var marker = event.target;
            var position = marker.getLatLng();
            console.log(position);
            $('#latitude').val(position.lat);
            $('#longitude').val(position.lng);
        });
</script>
@endsection

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <style>
    .carousel{

        max-height: 500px !important;
    }
  </style>
  <body>
    <div id="carouselExampleControls" class="carousel slide  w-50  " data-ride="carousel">
        <div class="carousel-inner">
          @foreach($data['data'] as $index => $item)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
              <img class="d-block w-100 h-70" src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}">
              <div class="carousel-caption d-none d-md-block">
                <h5>{{ $item['title'] }}</h5>
                {!! $item['description'] !!}
              </div>
            </div>
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="container">
        <h2 class="text-center">{{ $data['title'] }}</h2>
        <p class="text-center">{!! $data['description'] !!}</p>
    
        <div class="row">
            @foreach ($data['data'] as $feature)
                <div class="col-md-4">
                    <div class="card mb-4">
                        @if($feature['image'])
                            <img src="{{ asset($feature['image']) }}" class="card-img-top" alt="{{ $feature['title'] }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $feature['title'] }}</h5>
                            <p class="card-text">{!! $feature['description'] !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
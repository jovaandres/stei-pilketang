<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.75.1">
    <title>Vote Ketua Angkatan</title>

    <style>
body {
  background-image: url({{asset('vote/assets/vote-bg.jpg')}});
  background-size: 100% 100%;
}
</style>
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/pricing/">



    <!-- Bootstrap core CSS -->
<link href="{{asset('vote/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('vote/pricing/pricing.css')}}" rel="stylesheet">
  </head>
  <body>

<main class="container">
  <div class="pricing-header px-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Calon Ketua Angkatan</h1>
  </div>

          @if (session('success'))
           <div class="alert alert-success">
          {{ session('success')}}
           </div>
          @endif

          @if (session('failed'))
           <div class="alert alert-danger">
          {{ session('failed')}}
           </div>
          @endif

          <form action="{{ url('/voting') }}" method="post">
            @csrf
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
              <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">I Gede Arya..</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                  </ul>
                  <input class="form-check-input" type="radio" name="ketang" id="ketang" value="gedearya">
                </div>
              </div>
              </div>
              <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Lingga...</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                  </ul>
                  <input class="form-check-input" type="radio" name="ketang" id="ketang" value="lingga">
                </div>
              </div>
              </div>
              <div class="col">
                <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal">Tidak memilih</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                  </ul>
                  <input class="form-check-input" type="radio" name="ketang" id="ketang" value="abstain" checked>
                </div>
              </div>
              </div>
            </div>
        <div class="form-group my-3">
         <label for="token">Token</label>
           <input type="text" class="form-control @error('token') is-invalid @enderror" id="token" placeholder="Masukkan token" name="token" value="{{ old('token')}}">
           @error('token')<div class="invalid-feedback">{{$message}}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary my-3">Vote!</button>
          </form>

</main>

  </body>
</html>

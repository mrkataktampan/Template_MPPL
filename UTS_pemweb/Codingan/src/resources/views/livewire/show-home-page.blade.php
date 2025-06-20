<x-livewire.layouts.app>
  <section id="fh5co-hero" class="js-fullheight" style="background-image: url('{{ asset('front/images/slide_1.jpg') }}');">
    <div class="flexslider js-fullheight">
      <ul class="slides">
        <li>
          <div class="overlay"></div>
          <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
              <div class="slider-text-inner">
                <h1>Delicious Meals Delivered Fast</h1>
                <p><a class="btn btn-primary btn-lg" href="{{ url('/admin/login') }}">Klik Tombol Ini</a></p>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div id="fh5co-about" class="fh5co-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('front/images/res_img_1.jpg') }}" alt="About Us" class="img-responsive img-rounded">
        </div>
        <div class="col-md-6">
          <h2>About Foodee</h2>
          <p>
            Foodee is a modern and responsive food delivery website template. We serve the best quality meals through a seamless digital experience. Our platform emphasizes convenience, freshness, and customer satisfaction.
          </p>
        </div>
      </div>
    </div>
  </div>
</x-livewire.layouts.app>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>@yield('meta-title', config('app.name'))</title>
  <meta name="description" content="@yield('meta-desc', config('app.name'))">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
  </script>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/normalize.css">
  <link rel="stylesheet" href="/css/framework.css">
  <link rel="stylesheet" href="/css/responsive.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
  <script src="/js/bootstrap.js"></script>
  @stack('styles')
</head>

<body>
  <div id="app">
    <div class="preload"></div>
    <header class="space-inter">
      <div class="container container-flex space-between">
        <nav-bar></navbar>
      </div>
    </header>
    <div class="wrapper">
      <!--
      Las animaciones funcionan utilizando parte de la libreria css "animate",
      la propiedad "name" de la etiqueta transition acepta toda esta lista de clases:

      Enjoy! ^_^

      Bounce
        bounce
        bounceDown
        bounceLeft
        bounceRight
        bounceUp
      Fade
        fade
        fadeDown
        fadeDownBig
        fadeLeft
        fadeLeftBig
        fadeRight
        fadeRightBig
        fadeUp
        fadeUpBig
      Rotate
        rotate
        rotateDownLeft
        rotateDownRight
        rotateUpLeft
        rotateUpRight
      Slide
        slideDown
        slideLeft
        slideRight
        slideUp
      Zoom
        zoom
        zoomDown
        zoomLeft
        zoomRight
        zoomUp
    -->
      <transition name="zoomLeft" mode="out-in">
          <router-view :key="$route.fullPath"></router-view>
      </transition>
    </div>


    <section class="footer">
      <footer>
        <div class="container">

          <div class="divider-2"></div>
          <p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
          <div class="divider-2" style="width: 80%;"></div>
          <ul class="social-media-footer list-unstyled">
            <li><a href="#" class="fb"></a></li>
            <li><a href="#" class="tw"></a></li>
            <li><a href="#" class="in"></a></li>
            <li><a href="#" class="pn"></a></li>
          </ul>
        </div>
      </footer>
    </section>
  </div>
  <script src="{{ mix('js/app.js') }}"></script>
  @stack('scripts')
</body>

</html>

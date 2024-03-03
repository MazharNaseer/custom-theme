<?php
/*
Template Name: Home Template
*/
get_header();
?>

<style>
  body {
    overflow-x: hidden;
  }
</style>

<div class="p-5 text-center bg-image rounded-3" style="
    background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
    height: 100vh; /* Adjusted height */
    width: 100vw; /* Adjusted width */
    background-size: cover; /* Added to cover the whole screen */
    background-position: center; /* Added to center the background image */
    overflow-x: hidden; /* Added to prevent horizontal scrolling */
  ">
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
    <div class="d-flex justify-content-center align-items-center h-100">
      <div class="text-white">
        <h1 class="mb-3">Ikonic</h1>
        <h4 class="mb-3">Software House</h4>
        <a class="btn btn-outline-light btn-lg" href="#!" role="button">Call to action</a>
      </div>
    </div>
  </div>
</div>

<?php
get_footer();
?>

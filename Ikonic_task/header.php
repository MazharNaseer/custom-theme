<?php

?>
<head>
  <title>Bootstrap 5 Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


<?php
$menu_locations = get_nav_menu_locations();
$primary_menu_id = $menu_locations['primary']; 

if ($primary_menu_id) :
    $menu_items = wp_get_nav_menu_items($primary_menu_id);

    if ($menu_items) :
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php foreach ($menu_items as $menu_item) : ?>
        <li class="nav-item <?php echo ($menu_item->current ? 'active' : ''); ?>">
          <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>"><?php echo esc_html($menu_item->title); ?><?php echo ($menu_item->current ? ' <span class="sr-only">(current)</span>' : ''); ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</nav>
<?php
    endif;
endif;
?>

</body>
<?php
?>
<?php
/**
 * Plugin Name: Custom Products Display
 * Plugin URI:
 * Description: This plugin allows easy addition of products to the products page
 * Version: 0.0.1
 * Author: Sara Fagin
 * Author URI:
 * License: GPL2
 */

add_shortcode('productswrapper', 'outer_wrap_products_code');
function outer_wrap_products_code($atts, $content = null) {
  return
  '<div class="main ProductsPage">
      <p class="home">Beacon Rail Leasing offers a range of rolling stock on 3 to 10 year Operating Leases. The Beacon Rail fleet contains a variety of Locomotives, Freight Wagons, and Passenger Trains. Beacon Rail Leasing also offers Portfolio Management services, managing assets owned by third parties.</p>
      <div class="products_container">
        <ul class="productlist">' . do_shortcode($content) . '</ul></div></div>';
}

add_shortcode('trainclass', 'train_class_code');
function train_class_code($atts, $content = null) {
  return
  '<h2 class="productstyle">' . $content . '</h2>
   <div class="groupbreak">&nbsp;</div>';
}

add_shortcode('singletrain', 'single_train_code');
function single_train_code($atts, $content = null) {
  $a = shortcode_atts(array('trainmodel' => 'Empty Name',), $atts);
  return
  '<div class="expanding_product_panel" data-link-text="' . $a['trainmodel'] . '">
    <div class="expanding_product_panel_content_container">
      <div class="expanding_product_panel_content">
        <div class="single_train_container">
          <img class="train_image alignleft" src="' . $atts['src'] . '">
          <div class="train_description">
            ' . do_shortcode($content) . '
          </div>
        </div>
      </div>
    </div>
  </div>';
}

add_shortcode('traindescription', 'train_description_code');
function train_description_code($atts, $content = null) {
  return
  '<p class="prod_desc">' . $content . '</p>';
}

add_shortcode('trainspecs', 'train_spec_code');
function train_spec_code($atts, $content = null) {
  $a = shortcode_atts(array('trainmodel' => 'Empty Name',), $atts);
  return
  '<p class="prod_specs">' . $content . '</p>';
}
?>

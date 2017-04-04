<?php
/**
 * Plugin Name: Custom Bio Overlay
 * Plugin URI:
 * Description: This plugin allows easy addition of team members and bio to the team page
 * Version: 0.0.1
 * Author: Sara Fagin
 * Author URI:
 * License: GPL2
 */

 /*add_action( 'wp_head', 'custom_bio_overlay' );
 function custom_bio_overlay() {
   echo 'I am in the head section';
 }*/

add_shortcode('teamwrapper', 'outer_wrap_team_code');
function outer_wrap_team_code($atts, $content = null) {
  /*return '<table class="team"><tr>' . do_shortcode($content) . '</tr></table>';*/
  return '<div class="team">' . do_shortcode($content) . '</div>';
}

add_shortcode('teammember', 'wrap_team_member_code');
function wrap_team_member_code($atts, $content = null) {
  $a = shortcode_atts(array('id' => 'a','name' => 'Empty Name','title' => 'Empty Title',), $atts);
  /*return '<td class="team" id="' . $a['id'] . '">
  <span class="teamName" onclick="openNav(\'' . $a['id'] . '\')">' . $a['name'] . '</span>
  </td><div class="overlay" id="' . $a['id'] . '">
  <div class="overlay-content team_member">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(\'' . $a['id'] . '\')">&times;</a>
  <p class="name">' . $a['name'] . '</p><p class="title">' . $a['title'] . '</p><p class="description">' . $content . '</p></div></div>';*/

  return '<div class="overlay" id="' . $a['id'] . '">
  <div class="overlay-content team_member">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav(\'' . $a['id'] . '\')">&times;</a>
  <p class="name">' . $a['name'] . '</p><p class="title">' . $a['title'] . '</p><p class="description">' . $content . '</p></div></div><div class="teamMember" id="' . $a['id'] . '">
  <span class="teamName" onclick="openNav(\'' . $a['id'] . '\')">' . $a['name'] . '</span><br><span class="team">' . $a['title'] . '</span>
  </div>';
}
?>

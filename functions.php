<?php
/*
 *  Author: Daniel Ingraham
 *  URL: redlisted.net
 *  Custom functions, support, etc.
 */

if (function_exists('add_theme_support'))
{
  add_theme_support('post-thumbnails');
  add_image_size('large', 600, '', true);
  add_image_size('medium', 250, '', true);
  add_image_size('small', 120, '', true);
  add_theme_support('automatic-feed-links');
}

function redlisted_pagination($args = null)
{
  /**
  * What these do:
  * page: where we at
  * pages: how many pages we got
  * range: page links to offer around the current page
  * gap: minimum pages to hide in an ellipsis (see link calculations below)
  * anchor: number of links to show at the beginning of the list, minimum.
  * nextpage: text for next page link
  * previouspage: text for prev page link
  * echo: return or echo (0,1) the output. Because default wordpress functions are the butt.
  **/

  $defaults = array(
    'page' => null, 'pages' => null, 
    'range' => 3, 'gap' => 3, 'anchor' => 1,
    'title' => __(''),
    'nextpage' => __('&raquo;'), 'previouspage' => __('&laquo'),
    'echo' => 1
  );

  //determine if any args were passed and default to those vals
  $r = wp_parse_args($args, $defaults);

  //Are we starting with a blank slate?
  if (! isset($r['page']) && ! isset($r['pages'])) {
    global $wp_query;

    $r['page'] = (get_query_var('paged')) ? $get_query_var('page') : 1;
    $posts_per_page = intval(get_query_var('posts_per_page'));
    $r['pages'] = intval(ceil($wp_query->found_posts / $posts_per_page));
  }

  //I'm not real sure how output could already be set to something at this point, but let's just assume stupid things happen sometimes	
  $output = "";

  //Do we have more than one page? Because if not this has all been a little pointless.
  if ($r['pages'] > 1) {	
    $output .= "<div class='redlisted-pages'><span class='redlisted-pages-title'>".$r['title']."</span>";
    $ellipsis = "<span class='ellipsis'>...</span>";
    
    //Set the previous link
    if ($r['page'] > 1 && isset($r['previouspage'])) {
      $output .= "<a href='" . get_pagenum_link($r['page'] - 1) . "' class='prev-page'>".$r['previouspage']."</a>";
    }

    	
    $min_links = $r['range'] * 2 + 1;
    $block_min = min($r['page'] - $r['range'], $r['pages'] - $min_links);
    $block_max = max($r['page'] + $r['range'], $min_links);
    $left_gap = (($r['block_min'] - $r['anchor'] - $r['gap']) > 0) ? $r['ellipsis'] : '';
    $right_gap = (($block_max + $r['anchor'] + $r['gap']) < $r['pages']) ? $r['ellipsis'] : '';

    $first_stop = ($left_gap == $r['ellipsis']) ? $r['anchor'] : $block_max;
    $second_stop = (($left_gap == $r['ellipsis']) && ($right_gap == $r['ellipsis'])) ? $block_max : 0;

    for($i = 1; $i < $first_stop; $i++) {
      $output .= is_current_page($i);
    }

    $output .= $left_gap;

    for($i = $block_min; $i < $second_stop; $i++) {
      $output .= is_current_page($i);
    }

    $output .= $right_gap;

    for($i = ($r['pages'] - $r['anchor'] + 1); $i < $r['pages']; $i++) {
      $output .= is_current_page($i);
    }
    
    //Set the next link
    if ($r['page'] < $r['pages'] && isset($r['nextpage'])) {
      $output .= "<a href='" . get_pagenum_link($r['page'] + 1) . "' class='next-page'>".$r['nextpage']."</a>";
    }
    
    $output .= $r['after'];
  }
  if ($r['echo']) {
    echo $output;
  } else {
    return $output;
  }
}


function is_current_page($i) {
  return ($r['page'] == $i) ? "<span class=\"current-page\">".$i."</span>"
        : "<a href=\"".get_pagenum_link($i)."\" class=\"page-link\">".$i."</a>";
}

function redlisted_excerpt($length_callback = '', $more_callback = '')
{
  global $post;
  if (function_exists($length_callback)) {
    add_filter('excerpt_more', $length_callback);
  }
  if (function_exists($more_callback)) {
    add_filter('excerpt_more', $more_callback);
  }
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

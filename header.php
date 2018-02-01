<!DOCTYPE html>
<!--
 _   _ _____ _     _     ___  _
| | | | ____| |   | |   / _ \| |
| |_| |  _| | |   | |  | | | | |
|  _  | |___| |___| |__| |_| |_|
|_| |_|_____|_____|_____\___/(_)

Scrutinising the source, I see...

If you like what you see, perhaps you'd consider using me for your next web project?

Find out more at SMALLWINS.CO.UK or shoot an email to HELLO@SMALLWINS.CO.UK

- Joshua

 -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php wp_title('|', true, 'right'); echo bloginfo('name')?> | <?php echo bloginfo('description'); ?></title>
    <meta name="viewport" content="width=device-width">
    <?php get_template_part('social-meta'); ?>
    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'frontend' ); ?>>
    <header class="site-header">
      <div class="container">
        <?php if ( function_exists( 'the_custom_logo' ) ) { the_custom_logo(); } ?>
        <nav class="main-menu">
          <?php wp_nav_menu(array( 'theme_location' => 'main' )); ?>
        </nav>
      </div>
    </header>

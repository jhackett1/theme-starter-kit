<?php
// CUSTOMISER SETTINGS

// SOCIAL SHARING
function smallwins_social_customiser($wp_customize){
  // Section
  $wp_customize->add_section('smallwins_sharing', array(
    'title' => __('Social Sharing', 'Portra 2017'),
    'priority' => 30
  ));
  // Settings
  $wp_customize->add_setting('smallwins_default_social_share_image', array(
    'transport' => 'refresh',
  ));
  $wp_customize->add_setting('smallwins_twitter_account', array(
    'transport' => 'refresh',
  ));
  // Controls
  $wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'smallwins_default_social_share_image', array(
    'label' => __('Default social share image'),
    'settings' => 'smallwins_default_social_share_image',
    'section' => 'smallwins_sharing'
  )));
  $wp_customize->add_control(
    'smallwins_twitter_account',
    array(
        'label' => 'Associated Twitter username (without @ symbol)',
        'section' => 'smallwins_sharing',
        'type' => 'text',
    )
  );
};
add_action('customize_register', 'smallwins_social_customiser');

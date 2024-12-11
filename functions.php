<?php

function load_stylesheets()
{
  wp_register_style('main-stylesheet', get_template_directory_uri() .
    '/css/main.css', array(), false, 'all');
  wp_enqueue_style('main-stylesheet');

  if (is_page('gallery')):
    wp_register_style('gallery-stylesheet', get_template_directory_uri() .
      '/css/gallery.css', array(), false, 'all');
    wp_enqueue_style('gallery-stylesheet');
  endif;

  if (is_page('contact')):
    wp_register_style('contact-stylesheet', get_template_directory_uri() .
      '/css/contact.css', array(), false, 'all');
    wp_enqueue_style('contact-stylesheet');
  endif;
}

add_action('wp_enqueue_scripts', 'load_stylesheets');

function load_form_js()
{
  if (is_page('contact')):
    wp_enqueue_script(
      'kwcpt-contact-form',
      get_template_directory_uri() . '/javascript/contact-form.js',
      array('jquery'),
      '1.0',
      true
    );

    wp_localize_script('kwcpt-contact-form', 'ajaxObj', array(
      'ajaxUrl' => admin_url('admin-ajax.php'),
      'nonce' => wp_create_nonce('formNonce'),
    ));
  endif;
}

add_action('wp_enqueue_scripts', 'load_form_js');

function processFormData()
{
  if (!wp_verify_nonce($_POST['nonce'], 'formNonce')) {
    wp_send_json_error('Invalid nonce');
    die();
  }

  $fullName = sanitize_text_field($_POST['fullname']);
  $company = sanitize_text_field($_POST['company']);
  $email = sanitize_email($_POST['email']);
  $phone = sanitize_text_field($_POST['phone']);
  $textarea = sanitize_textarea_field($_POST['contact-text']);
  $to = get_option('admin_email');
  $headers = 'From: ' . $email;

  $message = "From: " . $fullName . "\n" .
             "Company: " . $company . "\n" .
             "Email: " . $email . "\n" .
             "Phone: " . $phone . "\n" .
             "Message: " . $textarea;

           

  // if condition: return value of wp_mail() function to send email

  $emailSent = wp_mail($to, 'test_email', $message, $headers);

  if ($emailSent) {
    wp_send_json_success($message);
    die();
  } else {
    wp_send_json_error(['errorMsg' => 'Error, email not sent', 'origMsg' => $message]);
  }
}

add_action('wp_ajax_contact_form_submit', 'processFormData');
add_action('wp_ajax_nopriv_contact_form_submit', 'processFormData');

// theme options

function add_support_menus_thumbnails()
{
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'add_support_menus_thumbnails');



function register_header_menu()
{
  register_nav_menu('header-menu', 'Top Menu Location');
}

add_action('after_setup_theme', 'register_header_menu');


function register_gallery_footer_menu()
{
  register_nav_menu('footer-menu', 'Footer Menu Location');
}

add_action('after_setup_theme', 'register_gallery_footer_menu');

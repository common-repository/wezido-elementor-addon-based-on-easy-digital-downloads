<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'wezido_blog_taxonomy';

  //
  // Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'category',
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

     array(
          'id'      => 'wiz_cat_image',
          'type'    => 'media',
          'title'   => 'Category Featured Image',
          'library' => 'image',
        ),

    )
  ) );

}

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'wezido_edd_taxonomy';

  //
  // Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'download_category',
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

     array(
          'id'      => 'wiz_edd_cat_image',
          'type'    => 'media',
          'title'   => 'Category Featured Image',
          'library' => 'image',
        ),

    )
  ) );

}

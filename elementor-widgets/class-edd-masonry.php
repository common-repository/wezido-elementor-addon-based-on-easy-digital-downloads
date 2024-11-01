<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.0.0
 */
class Wezido_edd_masonry extends Elementor\Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
	   
    }
 
    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'wezido-edd-masonry';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Edd Masonry', 'wezido' );
    }
 
    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-gallery-masonry';
    }
 
    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'wezido-general' ];
    }

  

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Wezido EDD Masonry Grid', 'wezido' ),
            ]
        );
        
        $this->add_control(
            'item_per_page',
            [
                'label'   => esc_html_x( 'Amount of item to display', 'Admin Panel', 'wezido' ),
                'type'    => Controls_Manager::NUMBER,
                'default' =>  "10",
                'label_block' => true,
            ]
        );
       
         $this->add_control(
      'category',
      array(
        'label'       => esc_html__( 'Select Categories', 'wezido' ),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        
        'options'     => array_flip(wezido_items_extracts( 'categories', array(
          'sort_order'  => 'ASC',
          'taxonomy'    => 'download_category',
          'hide_empty'  => false,
        ) )),
        'label_block' => true,
      )
    );
    
        $this->add_control(
            'categorynotin',
            [
                'label' => __( 'Exclude Category', 'wezido' ),
                'description' => __('Add one category slug','wezido'),
                'type' =>  Controls_Manager::SELECT2,
                'multiple'    => true,
                 'options'     => array_flip(wezido_items_extracts( 'categories', array(
                      'sort_order'  => 'ASC',
                      'taxonomy'    => 'download_category',
                      'hide_empty'  => false,
                    ) )),
                    'label_block' => true,
                
            ]
        );
        
  $this->add_control(
      'tags',
      array(
        'label'       => esc_html__( 'Select Tags', 'wezido' ),
        'type'        => Controls_Manager::SELECT2,
        'multiple'    => true,
        
        'options'     => array_flip(wezido_items_extracts( 'tags', array(
          'sort_order'  => 'ASC',
          'taxonomies'    => 'download_tag',
          'hide_empty'  => false,
        ) )),
        'label_block' => true,
      )
    );
    
    $this->add_control(
            'order',
            [
                'label' => __( 'Order', 'wezido' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'asc' => 'Ascending',
                    'desc' => 'Descending'
                ],
                'default' => 'desc',

            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
			'style',
			[
				'label' => __( 'Style', 'wezido' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'wezido' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .wezido-edd-item,{{WRAPPER}} .wezido-edd-thumbnail,{{WRAPPER}} .wezido-edd-thumbnail img,{{WRAPPER}} .wez-product-masonry-description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
	
		$this->add_control(
			'image_gap',
			[
				'label' => __( 'Gap Between Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10,
			]
		);

		
		
			$this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                array(
                    'name'      => 'title_typography',
                    'label'     => __( 'Title Typography', 'wezido' ),
                    'selector'  => '{{WRAPPER}} .wez-product-masonry-description h5 a',
                )
            );  
            
            $this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'wezido' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wez-product-masonry-description h5 a' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings();
        $post_count = ! empty( $settings['item_per_page'] ) ? (int)$settings['item_per_page'] : 5;
        $post_order_term=$settings['order'];
        $categories= $settings['category'];
        $tags = $settings['tags'];
        $downloads_category_not=$settings['categorynotin'];
        $image_gap=$settings['image_gap'];
        

        ?>
        
        <div class="wezido-edd-masonry gridzy flex flex-wrap overflow-hidden sm:-mx-2 lg:-mx-2 xl:-mx-2" data-gridzy-layout="waterfall" data-gridzy-spaceBetween="<?php echo esc_html($image_gap);?>">
            <?php
              
        global $post;
          global $wp_query; 
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} else if ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						
						
						    
						     $args = array(
                            'post_type' => 'download',
                            'posts_per_page' => $post_count,
                            'order' => (string)trim($post_order_term),);
						
           
        
        
         if(!empty($categories[0])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'download_category',
          'field'    => 'ids',
          'terms'    => $categories
        )
      );
    }
    
    if(!empty($tags[0])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'download_tag',
          'field'    => 'ids',
          'terms'    => $tags
        )
      );
    }
    
    
     if(!empty($downloads_category_not[0])) {
      $args['tax_query'] = array(
        array(
          'taxonomy' => 'download_category',
          'field'    => 'ids',
          'terms'    => $downloads_category_not,
          'operator' => 'NOT IN'
        )
      );
    }
      $the_query =new \WP_Query($args);
    while ($the_query -> have_posts()) : $the_query -> the_post();
    $max_num_pages = $the_query->max_num_pages;?>
    
        <div class="wezido-edd-masonry-item relative">
            <div class="wezido-edd-thumbnail">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    <?php endif; ?>
                </div>
                
                <div class="wez-product-masonry-description">
                                    
                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
                                    </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
        </div>
           
        <?php
    }
 
    /**
     * Render the widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _content_template() {
        
    }

}

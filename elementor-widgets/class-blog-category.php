<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class Wezido_blog_catgeory extends Elementor\Widget_Base {

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
        return 'wezido-blog-category';
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
        return __( 'Blog Category', 'wezido' );
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
        return 'eicon-flow';
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
                'label' => __( 'Wezido Blog Post Catgeory', 'wezido' ),
            ]
        );

        $this->add_control(
            'cats_per_page',
            [
                'label'   => esc_html_x( 'Amount of item to display', 'Admin Panel', 'wezido' ),
                'type'    => Controls_Manager::NUMBER,
                'default' =>  "10",
                'label_block' => true,
            ]
        );

        $this->add_control(
            'cat_style',
            [
                'label'     => esc_html_x( 'Style', 'Admin Panel','wezido' ),
                'description' => esc_html_x('Style for category', 'wezido' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "grid",
                'label_block' => true,
                "options"    => array(
                    "grid" => "Grid",
                    "list" => "List",
                ),
            ]

        );
        $this->add_control(
            'grid_layout',
            [
                'label'     => esc_html_x( 'Column', 'Admin Panel','wezido' ),
                'description' => esc_html_x('Column layout for the list', 'wezido' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "1/3",
                'label_block' => true,
                "options"    => array(
                    "full" => "1",
                    "1/2" => "2",
                    "1/3" => "3",
                    "1/4" => "4",
                    "1/5" => "5",
                    "1/6" => "6",
                ),
                
                 'condition' => [
                    'cat_style' => array('grid'),
                ],
            ]

        );
        
        $this->add_control(
            'list_layout',
            [
                'label'     => esc_html_x( 'Column', 'Admin Panel','wezido' ),
                'description' => esc_html_x('Column layout for the list', 'wezido' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "3",
                'label_block' => true,
                "options"    => array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                ),
                 'condition' => [
                    'cat_style' => array('list'),
                ],
            ]

        );
        $this->add_control(
            'moblist_layout',
            [
                'label'     => esc_html_x( 'Mobile Column', 'Admin Panel','wezido' ),
                'description' => esc_html_x('Column layout for the list', 'wezido' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "2",
                'label_block' => true,
                "options"    => array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                ),
                 'condition' => [
                    'cat_style' => array('list'),
                ],
            ]

        );
        
         $this->add_control(
            'grid_gap',
            [
                'label'     => esc_html_x( 'Grid Gap', 'Admin Panel','wezido' ),
                'description' => esc_html_x('gap of the grid', 'wezido' ),
                'type'      =>  Controls_Manager::SELECT,
                'default'    =>  "2",
                'label_block' => true,
                "options"    => array(
                    "0" => "No gap",
                    "1" => "Narrow",
                    "2" => "Normal",
                    "3" => "Extended",
                    "4" => "Extra Extended",
                ),
                
                 'condition' => [
                    'cat_style' => array('grid'),
                ],
            ]

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
                    '{{WRAPPER}} .wz-grid-post-cat,{{WRAPPER}} .wz-grid-catbox,{{WRAPPER}} .wiz-img-box img,{{WRAPPER}} .bg-gradient-to-t' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                
                 'condition' => [
                    'cat_style' => array('grid'),
                ],
            ]
        );





        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name'      => 'title_typography',
                'label'     => __( 'Typography', 'wezido' ),
                'selector'  => '{{WRAPPER}} .bg-gradient-to-t h3,{{WRAPPER}} .wz-list-post-cat li a',
            )
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Color', 'wezido' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .bg-gradient-to-t h3,{{WRAPPER}} .wz-list-post-cat li a' => 'color: {{VALUE}}',
                ],
            ]
        );


         $this->add_control(
            'hover_list_item',
            [
                'label' => __( 'Hover Color', 'wezido' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wz-list-post-cat li a:hover' => 'color: {{VALUE}}',
                ],
                 'condition' => [
                    'cat_style' => array('list'),
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
        $cats_count = ! empty( $settings['cats_per_page'] ) ? (int)$settings['cats_per_page'] : 5;
        $cat_order_term=$settings['order'];
        $cat_style = $settings['cat_style'];
        $grid_layout = $settings['grid_layout'];
        $list_layout = $settings['list_layout'];
        $grid_gap =$settings['grid_gap'];
        $moblist_layout = $settings['moblist_layout'];

        ?>


        <?php
        $categories=get_categories(
            array( 'number' => $cats_count, 'order'   => (string)trim($cat_order_term),)
        );
        ?>

        <?php if($cat_style=="grid"){?>
            <div class="wezido-blog-category-grid flex flex-wrap overflow-hidden sm:-mx-<?php echo esc_html($grid_gap);?> lg:-mx-<?php echo esc_html($grid_gap);?> xl:-mx-<?php echo esc_html($grid_gap);?>">
                <?php foreach ( $categories as $term ) : ?>
                    <?php
                    $wizcat_tax = get_term_meta($term->term_id, 'wezido_blog_taxonomy', true );
                     $wiz_cat_bg = $wizcat_tax['wiz_cat_image']['url'];
                    ?>
                    <div class="wz-grid-post-cat relative w-full md:w-<?php echo esc_html($grid_layout);?> px-<?php echo esc_html($grid_gap);?> my-<?php echo esc_html($grid_gap);?>">

                        

                        <div class="wz-grid-catbox relative overflow-hidden bg-gray-100 m-auto">
                            <div class="wiz-img-box">
                                <img src="<?php echo esc_url($wiz_cat_bg);?>" alt="featured-img">
                            </div>
                             <a href="<?php echo esc_attr( get_term_link( $term) ); ?>" title="<?php echo $term->name; ?>" class="absolute w-full h-full top-0 left-0"></a>
                            
                                <div class="absolute bottom-0 flex flex-col w-full pb-3 pt-10 px-3 bg-gradient-to-t from-black text-gray-200">
                                    <h3 class="text-base font-bold leading-5 uppercase"><span><?php echo $term->name; ?></span></h3>


                                </div>
                            
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php } else { ?>
        <ul class="wz-list-post-cat grid grid-cols-<?php echo esc_html($moblist_layout);?> md:grid-cols-<?php echo esc_html($list_layout);?> list-none m-0 p-0">
            <?php foreach ( $categories as $term ) : ?>
             <li><a href="<?php echo esc_attr( get_term_link( $term) ); ?>"><?php echo $term->name; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php } ?>
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

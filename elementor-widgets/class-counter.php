<?php
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * @since 1.0.0
 */
class Wezido_counter extends Elementor\Widget_Base {

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
        return 'wezido-counter';
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
        return __( 'Counter', 'wezido' );
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
        return 'eicon-counter';
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
                'label' => __( 'Wezido Counter', 'wezido' ),
            ]
        );


       $this->add_control(
         'title',
         [
            'label' => __( 'Counter Title', 'mayosis' ),
            'type' => Controls_Manager::TEXT,
            'default' => 'Title',
            
         ]
      );
       
       $this->add_control(
         'counter_type',
         [
            'label' => __( 'Counter Type', 'mayosis' ),
            'type' => Controls_Manager::SELECT,
            'default' => 'user',
            'title' => __( 'Select Counter Type', 'mayosis' ),
             'options' => [
                    'user'  => __( 'Total User', 'mayosis' ),
                    'product' => __( 'Total Products', 'mayosis' ),
                    'download' => __( 'Total Download', 'mayosis' ),
                    'site_sales' => __( 'Site Total Sales', 'mayosis' ),
                    'custom' => __( 'Custom', 'mayosis' ),
                 ],
         ]
      );
       
       $this->add_control(
         'count',
         [
            'label' => __( 'Custom Count', 'mayosis' ),
            'type' => Controls_Manager::TEXT,
            'default' => '4515',
            
         ]
      );
       
       $this->add_control(
         'count_suffix',
         [
            'label' => __( 'Counter Suffix', 'mayosis' ),
            'type' => Controls_Manager::TEXT,
            'default' => '',
            
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

        

        $this->add_responsive_control(
			'align_text',
			[
				'label' => __( 'Alignment', 'mayosis' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mayosis' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'mayosis' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'mayosis' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .wiz-counter-box' => 'text-align: {{VALUE}};',
				],
			]
		);
        $this->add_group_control(
			 \Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'counter_typo',
				'label' => __( 'Counter Typography', 'mayosis' ),
				'selector' => '{{WRAPPER}} .wez-statistic-counter,{{WRAPPER}}  .counter-suffix',
			]
		);
		
       $this->add_control(
         'count_color',
         [
            'label' => __( 'Color of Count', 'mayosis' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'title' => __( 'Select Count Color', 'mayosis' ),
            'selectors' => [
					'{{WRAPPER}} .wez-statistic-counter,{{WRAPPER}}  .counter-suffix' => 'color: {{VALUE}};',
				],
         ]
      );
      
       $this->add_group_control(
		\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typo',
				'label' => __( 'Title Typography', 'mayosis' ),
				'selector' => '{{WRAPPER}} .mcounter_title_promo',
			]
		);
       $this->add_control(
         'title_color',
         [
            'label' => __( 'Color of Title', 'mayosis' ),
            'type' => Controls_Manager::COLOR,
            'default' => '#ffffff',
            'title' => __( 'Select Title Color', 'mayosis' ),
            'selectors' => [
					'{{WRAPPER}} .mcounter_title_promo' => 'color: {{VALUE}};',
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
        

        ?>

        <div class="wiz-counter-box">
               	<?php if($settings['counter_type'] == "user"){ ?>
               	
                	<h4 class="wez-statistic-counter">
                	<?php
                        $result = count_users();
                        echo  $result['total_users'];
                        
                        ?></h4>
                 <p class="mcounter_title_promo"><?php echo $settings['title']; ?></p>
                  <?php } elseif($settings['counter_type'] == "product"){ ?>
                   <?php
			$count_products = wp_count_posts('download');
	        $total_products = $count_products->publish;
            ?>
			<h4 class="wez-statistic-counter"><?php
			echo $total_products; ?></h4>
                 <p class="mcounter_title_promo"><?php echo $settings['title']; ?></p>

                <?php } elseif($settings['counter_type'] == "site_sales"){ ?>
                    <h4 class="wez-statistic-counter"><?php
                        echo edd_get_total_sales(); ?></h4>
                    <p class="mcounter_title_promo"><?php echo $settings['title']; ?></p>

                    <?php } elseif($settings['counter_type'] == "download"){ ?>
                     <h4 class="wez-statistic-counter"><?php
			echo edd_count_total_file_downloads(); ?></h4>
                   <p class="mcounter_title_promo"><?php echo $settings['title']; ?></p>
                    <?php
			}
		  else
			{ ?>
			<h4 class="wez-statistic-counter"><?php echo $settings['count']; ?></h4> <span class="counter-suffix"><?php echo $settings['count_suffix']; ?></span>
				   <p class="mcounter_title_promo"><?php echo $settings['title']; ?></p> 
					   <?php
			} ?>
                    
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

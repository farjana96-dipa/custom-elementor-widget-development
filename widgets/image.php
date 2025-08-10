<?php
namespace Elementor;

class DP_Image extends Widget_Base {

    public function get_name() {
        return 'dp-image';
    }

    public function get_title() {
        return esc_html__('Image', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-image';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

   
    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls(){
        
        //Image Layout

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('CONTENT','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //Image

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'dynamic' => [
                    'active' => true,
                ]
			]
		);

      
        $this->end_controls_section();

            $this->style_tab();
    }

    public function style_tab(){


        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__('Style','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

      $this->start_controls_tabs('image_style');

       


        // Border

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Border','my-elementor-widget'),
                'selectors' => '{{WRAPPER}} .dp-container a img'
            ]
        );


        //Border-radius

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%','em'],
                'selectors' => [
                    '{{WRAPPER}} .dp-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );


        // Padding
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => __( 'Padding', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .dp-container ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tabs();

    $this->end_controls_section();
    }

    
    public function render() {
        $settings = $this->get_settings_for_display();


    ?>
     <div class="dp-container">
        <a href="">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" />
        </a>
     </div>

    <?php


    }


        

    

}
    Plugin::instance()->widgets_manager->register(new DP_Image());


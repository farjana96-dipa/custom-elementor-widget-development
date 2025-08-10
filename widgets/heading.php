<?php
namespace Elementor;

class DP_Heading extends Widget_Base {

    public function get_name() {
        return 'dp-heading';
    }

    public function get_title() {
        return esc_html__('Heading Text', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-e-heading';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls(){
            $this->start_controls_section(
                'Content Section',
                [
                    'label' => esc_html__('Heading Text', 'my-elementor-widget'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'heading_text',
                [
                    'label' => esc_html__('DP Heading Text','my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => esc_html__('Write Your Heading Text Here...','my-elementor-widget'),
                ]
            );

            $this->add_control(
                'heading_link',
                [
                    'label' => esc_html('Heading Link','my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::URL,
                    'optioins' => ['url', 'is_external', 'nofollow'],
                    'placeholder' => esc_html__('https://your-link.com', 'my-elementor-widget'),
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true
                    ]
                ]
            );

            $this->add_control(
                'heading_tag',
                [
                    'label' => esc_html__('Heading Tag','my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'h1' => esc_html__('H1','my-elementor-widget'),
                        'h2' => esc_html__('H2','my-elementor-widget'),
                        'h3' => esc_html__('H3','my-elementor-widget'),
                        'h4' => esc_html__('H4','my-elementor-widget'),
                        'h5' => esc_html__('H5','my-elementor-widget'),
                        'h6' => esc_html__('H6','my-elementor-widget'),
                        'p' => esc_html__('P','my-elementor-widget'),
                    ],
                    'default' => 'h2'

                ]
            );

            $this->end_controls_section();

            $this->style_tab();
    }

    public function style_tab(){


        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Heading Style','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Heading Alignment

        $this->start_controls_tabs('Heading Alignment');

        $this->add_responsive_control(
            'alignment',
            [
                'label' => esc_html('Heading Alignment','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                 'options' => [
                    'left' => ['title' => __('Left', 'my-elementor-widget'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => __('Center', 'my-elementor-widget'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => __('Right', 'my-elementor-widget'), 'icon' => 'eicon-text-align-right'],
                    'justify' => ['title' => __('Justify', 'my-elementor-widget'), 'icon' => 'eicon-text-align-justify'],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .custom-heading' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tabs();

           // Heading Color

        $this->start_controls_tabs('Heading Colors tabs');

     // Normal Color
        $this->start_controls_tab(
            'normal_color',
            [
                'label'=> esc_html__('Normal','my-elementor-widget'),
            ]
        );

        $this->add_control(
            'head_normal_color',
            [
                'label' => esc_html__('Text Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => [
                    '{{WRAPPER}} .custom-heading ' => 'color: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_tab();




        // Heading Hover Color

         // Hover Color
        $this->start_controls_tab(
            'hover_color',
            [
                'label'=> esc_html__('Hover','my-elementor-widget'),
            ]
        );

        $this->add_control(
            'head_hover_color',
            [
                'label' => esc_html__('Text Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
               
                'selectors' => [
                    '{{WRAPPER}} .custom-heading:hover ' => 'color: {{VALUE}};',
                ]
            ]
        );


        $this->end_controls_tab();

    $this->end_controls_tabs();

    $this->start_controls_tabs('heading_typography');
        // Heading Typography

       $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'heading_typography',
				'selector' => '{{WRAPPER}} .custom-heading',
			]
		);


    $this->end_controls_tabs();

    //Heading Text Stroke

    $this->start_controls_tabs('text_stroke');
       

       $this->add_group_control(
			\Elementor\Group_Control_Text_Stroke::get_type(),
			[
				'name' => 'text_stroke',
				'selector' => '{{WRAPPER}} .custom-heading',
			]
		);


    $this->end_controls_tabs();


      //Heading Text Shadow

    $this->start_controls_tabs('text_shadow');
       

       $this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .custom-heading',
			]
		);


    $this->end_controls_tabs();



$this->end_controls_section();


    }

    public function render(){

        $settings = $this->get_settings_for_display();

        $title_target = $settings['heading_link']['is_external'] ? ' target="_blank" ' : '';
        $title_nofollow = $settings['heading_link']['nofollow'] ? ' rel="nofollow" ' : '';

        $tag = $settings['heading_tag'];
        $title = $settings['heading_text'];

        echo sprintf( '<%1$s class="custom-heading">%2$s</%1$s>', esc_attr( $tag ), esc_html( $title ) );


        

    }

}
    Plugin::instance()->widgets_manager->register(new DP_Heading());


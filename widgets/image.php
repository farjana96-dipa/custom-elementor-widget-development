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

        //Image Link
        $this->add_control(
            'image_link',
            [
                'label' => esc_html__('Image Link','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url','is_external','nofollow'],
                'placeholder' => esc_html__('https://example.com','my-elementor-widget'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
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

       //Image alignment

       $this->add_responsive_control(
            'image_alignment',
            [
                'label' => esc_html__('Image Alignment','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'my-elementor-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'my-elementor-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'my-elementor-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify', 'my-elementor-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .dp-container .dp-image' => 'text-align: {{VALUE}};',
                ],
            ]
       );


       // Width

		$this->add_control(
			'width',
			[
				'label' => esc_html__( 'Width', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .dp-container .dp-image' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

         // Height

		$this->add_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'vh' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
                        'step' => 1,
					],
                    'vh' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ]
                    
				],
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .dp-container .dp-image  img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);


         // image object-fit control
        $this->add_control(
            'image_object_fit',
            [
                'label' => esc_html__('Object Fit', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'cover' => esc_html__('Cover', 'my-elementor-widget'),
                    'contain' => esc_html__('Contain', 'my-elementor-widget'),
                    'fill' => esc_html__('Fill', 'my-elementor-widget'),
                    'none' => esc_html__('None', 'my-elementor-widget'),
                    'scale-down' => esc_html__('Scale Down', 'my-elementor-widget'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-container .dp-image img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        // Image CSS filters control

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'custom_css_filters',
				'selector' => '{{WRAPPER}} .dp-container .dp-image img',
			]
		);

        // Border

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Border','my-elementor-widget'),
                'selector' => '{{WRAPPER}} .dp-container .dp-image img'
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
                    '{{WRAPPER}} .dp-container .dp-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .dp-container .dp-image ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tabs();

    $this->end_controls_section();
    }

    
    public function render() {
        $settings = $this->get_settings_for_display();


        $image_target = $settings['image_link']['is_external'] ? ' target = "_blank" ' : '';
        $image_nofollow = $settings['image_link']['nofollow'] ? 'rel="nofollow" ' : '';
        $image_url = $settings['image']['url'];

    ?>
     <div class="dp-container">
        <div class="dp-image">
        <a href="<?php echo $image_url; ?>" <?php echo $image_target; ?>  <?php echo $image_nofollow; ?>  >
            <img src="<?php echo esc_url($settings['image']['url']); ?>" />
        </a>
    </div>
     </div>

    <?php


    }


        

    

}
    Plugin::instance()->widgets_manager->register(new DP_Image());


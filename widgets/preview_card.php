<?php


namespace Elementor;

class myEw_Preview_Card_Widget extends Widget_Base{

    public function get_name(){
        return 'myew_preview_card_widget';
    }

    public function get_title(){
        return esc_html__('Preview Card Widget', 'my-elementor-widget');
    }



    public function get_script_depends(){
        return [
            'my-elementor-widget-script'
        ];
    }

    public function get_icon(){
         return 'eicon-code';
    }

    public function get_categories(){
        return ['my-elementor-widget'];
    }


    public function _register_controls(){
        //controls

        $this->start_controls_section(
            'image_section',
            [
                'label' => __('Image', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
            );

            // Image Control

            $this->add_control(
                'image',
                [
                    'label' => __('Select Image', 'my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'dynamic' => [
                        'active' => true,
                    ]
                ]
            );


            // Show image link switcher control

            $this->add_control(
                'show_image_link',
                [
                    'label' => __('Show Image Link', 'my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __('SHOW', 'my-elementor-widget'),
                    'label_off' => __('HIDE', 'my-elementor-widget'),
                    'return_value' => 'yes',
                    'default' => 'yes',
                    
                ]
            );

            // Image Link Control

            $this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Image Link', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
                'placeholder' => esc_html__( 'https://your-link.com', 'my-elementor-widget' ),
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'condition' => [
                    'show_image_link' => 'yes'
                ]
			]
		);

        $this->end_controls_section();



         // Badge control
        $this->start_controls_section(
            'badge_section',[
                'label' => __('Badge', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        // Show Badge Switcher Control
          $this->add_control(
            'show_badge',[
                'label' => __('Show Badge', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('SHOW', 'my-elementor-widget'),
                'label_off' => __('HIDE', 'my-elementor-widget'),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );

        // Badge Text Control
        $this->add_control(
            'badge_text',[
                'label' => __('Badge Text', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('New', 'my-elementor-widget'),
                'placeholder' => esc_html__('Type your badge text here', 'my-elementor-widget'),
                'dynamic' => [
                    'active' => true
                ],
                'condition' => [
                    'show_badge' => 'yes'
                ]
            ]
        );

      $this->end_controls_section();


        // Title Control
        $this->start_controls_section(
            'title_section',[
                'label' => __('Title', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );
        $this->add_control(
            'title', [
                'label' => __('Title', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Add your title text here', 'my-elementor-widget'),
                'placeholder' => esc_html__('Type your title here', 'my-elementor-widget'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        // Title link control
        $this->add_control(
            'title_link',
            [
                'label' => __('Title Link', 'my-elementor-widget'),
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

     



         // Show DIVIDER  control

        

            $this->add_control(
                'show_divider',
                [
                    'label' => __('Show Divider', 'my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __('SHOW', 'my-elementor-widget'),
                    'label_off' => __('HIDE', 'my-elementor-widget'),
                    'return_value' => 'yes',
                    'default' => 'yes'
                    
                    
                ]
                
               
            );


         $this->end_controls_section();
        

        // WYSIWYG Excerpt Control
        $this->start_controls_section(
            'excerpt_section',[
                'label' => __('Content', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );


        $this->add_control(
            'excerpt',[
                'label' => __('Excerpt', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__("Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ", 'my-elementor-widget'),
                'placeholder' => esc_html__('Type your excerpt here', 'my-elementor-widget'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );


        $this->end_controls_section();

       


      //Button Control
      $this->start_controls_section(
            'button_section',[
                'label' => __('Button', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
            ]
        );

        //Button Text Control
        $this->add_control(
            'button_text',[
                'label' => __('Button Text', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'my-elementor-widget'),
                'placeholder' => esc_html__('Type your button text here', 'my-elementor-widget'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        //Button Link Control
        $this->add_control(
            'button_link',
            [
                'label' => __('Button Link', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'placeholder' => esc_html__('https://your-link.com', 'my-elementor-widget'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true
                ],
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
                'default' => [
                    'value' => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );


       
      
        $this->end_controls_section();

        //style tabs
        $this->style_tab();
    }

    public function style_tab(){

        // Image style seciton
        $this->start_controls_section(
            'image_style_section',
            [
                'label' => __('Image', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Image alignment control
            $this->add_responsive_control(
            'image_alignment',
            [
                'label' => esc_html__('Image Alignment', 'my-elementor-widget'),
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
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .image_card .image' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .image_card .image img' => 'display: inline-block;',
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
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .image_card .image img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);


       // Height Control

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
					],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} .image_card .image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		// Image CSS filters control

		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'custom_css_filters',
				'selector' => '{{WRAPPER}} .image_card .image',
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
                    '{{WRAPPER}} .image_card .image img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        // Border Control
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Border', 'your-text-domain'),
                'selector' => '{{WRAPPER}} .image_card .image',
            ]
        );

        // Border Radius Control
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'your-text-domain'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .image_card .image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		$this->end_controls_section();


        // Title Style section
        $this->start_controls_section(
            'title_style_section',
            [
                'label' => __('Title', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Title alignment control
        $this->add_responsive_control(
            'title_alignment',
            [
                'label' => esc_html__('Title Alignment', 'my-elementor-widget'),
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
                    '{{WRAPPER}} .image_card .content .title h2' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Title typography control

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .image_card .content .title h2',
			]
		);

        // Title color control
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image_card .content .title h2' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();





        // Excerpt Style Section
       
        $this->start_controls_section(
            'excerpt_style_section',
            [
                'label' => __('Excerpt', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Title alignment control
        $this->add_responsive_control(
            'excerpt_alignment',
            [
                'label' => esc_html__('Text Alignment', 'my-elementor-widget'),
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
                    '{{WRAPPER}} .image_card .content .excerpt p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Excerpt typography control

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'selector' => '{{WRAPPER}} .image_card .content .excerpt p',
			]
		);

        // Excerpt color control
        $this->add_control(
			'excerpt_color',
			[
				'label' => esc_html__( 'Text Color', 'my-elementor-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .image_card .content .excerpt p' => 'color: {{VALUE}}',
				],
			]
		);

        $this->end_controls_section();

        //Button Style Section
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __('Button', 'my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Button Alignment Control
        $this->add_responsive_control(
            'button_alignment',
            [
                'label' => __('Button Alignment', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => __('Left', 'my-elementor-widget'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => __('Center', 'my-elementor-widget'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => __('Right', 'my-elementor-widget'), 'icon' => 'eicon-text-align-right'],
                    'justify' => ['title' => __('Justify', 'my-elementor-widget'), 'icon' => 'eicon-text-align-justify'],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .image_card .content .read_more_btn' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // Text Color
            $this->add_control(
                'button_text_color',
                [
                    'label' => esc_html__('Text Color', 'plugin-name'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .image_card .content .read_more_btn a' => 'color: {{VALUE}};',
                    ],
                ]
            );

            // Background Color
            $this->add_control(
                'button_bg_color',
                [
                    'label' => esc_html__('Background Color', 'plugin-name'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .image_card .content .read_more_btn a' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            // Typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button_typography',
                    'selector' => '{{WRAPPER}} .image_card .content .read_more_btn a',
                ]
            );

            // Button Icon Color 
            $this->add_control(
                'button_icon_color',
                [
                    'label' => esc_html__('Icon Color', 'plugin-name'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .read_more_btn .card-button  i' => 'color: {{VALUE}};',
                        '{{WRAPPER}} .read_more_btn .card-button  svg path' => 'fill: {{VALUE}};',
                    ],
                ]
            );


            // Button Icon size 

            $this->add_responsive_control(
            
            'button_icon_size',
                [
                    'label' => esc_html__('Icon Size', 'plugin-name'),
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
                        'unit' => 'px',
                        'size' => 14,
                        'width' => 20,
                        'height' => 20,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .read_more_btn .card-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                         '{{WRAPPER}} .read_more_btn .card-button  i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
        );

            // Button Padding
            $this->add_responsive_control(
                'button_padding',
                [
                    'label' => esc_html__('Padding', 'plugin-name'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .image_card .content .read_more_btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top' => '10',
                        'right' => '20',
                        'bottom' => '10',
                        'left' => '20',
                        'unit' => 'px',
                    ],
                ]
            );

            // Button Margin
            $this->add_responsive_control(
                'button_margin',
                [
                    'label' => esc_html__('Margin', 'plugin-name'),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%', 'em'],
                    'selectors' => [
                        '{{WRAPPER}} .image_card .content .read_more_btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'default' => [
                        'top' => '10',
                        'right' => '20',
                        'bottom' => '10',
                        'left' => '20',
                        'unit' => 'px',
                    ],
                ]
            );

    }

   
    // Render function to display the widget content 
    public function render() {

    $settings = $this->get_settings_for_display();

    // Prepare link attributes
    $image_link = '';
    $image_target = '';
    $image_nofollow = '';
    
    if ($settings['show_image_link'] === 'yes') {
        $image_url = $settings['image']['url'] ;
        $image_link = esc_url($settings['image_link']['url']);
        $image_target = $settings['image_link']['is_external'] ? ' target="_blank" ' : '';
        $image_nofollow = $settings['image_link']['nofollow'] ? ' rel="nofollow" ' : '';
    }

    
        $title_target = $settings['title_link']['is_external'] ? ' target="_blank" ' : '';
        $title_nofollow = $settings['title_link']['nofollow'] ? ' rel="nofollow" ' : '';

        $button_link_target = $settings['button_link']['is_external'] ? ' target="_blank" ' : '';
        $button_link_nofollow = $settings['button_link']['nofollow'] ? ' rel="nofollow" ' : '';
        $button_link = esc_url($settings['button_link']['url']);
    


           
    ?>
    <div class="image_card">
        <div class="image" >
          
             
            <a href="<?php echo $image_link; ?>" class="image-link" <?php echo $image_target; ?> <?php echo $image_nofollow; ?>>
                  <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr__('Preview Image', 'my-elementor-widget'); ?>" />
            </a>
             <?php  if($settings['show_badge'] == 'yes') : ?>
            <span class="top-price-badge badge-blue"><?php echo $settings['badge_text']; ?></span>
            <?php endif; ?>
        </div>
        <div class="content">
            <div class="title">
               <a href="<?php echo esc_url($settings['title_link']['url']); ?>" <?php echo $title_target; ?> <?php echo $title_nofollow; ?> > <h2><?php echo $settings['title']; ?></h2> </a>
            </div>
            <?php if($settings['show_divider'] == 'yes') : ?>
            <div class="divider"></div>
            <?php endif; ?>
            <div class="excerpt">
                <p><?php echo $settings['excerpt']; ?></p>
            </div>

           

            <div class="read_more_btn">
                <a href="<?php echo esc_url($button_link); ?>" <?php echo $button_link_target; ?> <?php echo $button_link_nofollow; ?> class="card-button">
                    <?php 
                    echo esc_html($settings['button_text']); 
                    
                     if( !empty($settings['button_icon']['value'])){
                           
                            \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']);
                           
                        }
                    ?>
                   
                   
                </a>

            </div>


           
        </div>
    </div>
    <?php
}


    public function content_template(){

    }
}

\Elementor\Plugin::instance()->widgets_manager->register(new \Elementor\myEw_Preview_Card_Widget() );
<?php
namespace Elementor;

class DP_Button_Group extends Widget_Base {

    public function get_name() {
        return 'dp-button-group';
    }

    public function get_title() {
        return esc_html__('Button Group', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'my-elementor-widget'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        

        $repeater = new Repeater();

        $repeater->add_control(
            'button_style_preset',
            [
                'label' => esc_html__('Button Style', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'style1' => esc_html__('Style 1', 'my-elementor-widget'),
                    'style2' => esc_html__('Style 2', 'my-elementor-widget'),
                    'style3' => esc_html__('Style 3', 'my-elementor-widget'),
                ],
                'default' => 'style1',
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => esc_html__('Button Text', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'my-elementor-widget'),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'color: {{VALUE}};',
                ],
            ]
        );


        $repeater->add_control(
            'button_border_style',
            [
                'label' => esc_html__('Border Style', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => 'None',
                    'solid' => 'Solid',
                    'dashed' => 'Dashed',
                    'dotted' => 'Dotted',
                    'double' => 'Double',
                ],
                'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'border-style: {{VALUE}};',
                ],
            ]
        );



        $repeater->add_control(
            'button_border_width',
            [
                'label' => esc_html__('Border Width (px)', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 1,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'border-width: {{VALUE}}px;',
                ],
            ]
        );




        $repeater->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'my-elementor-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'border-color: {{VALUE}};',
                ]
            ]
        );

        $repeater->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'my-elementor-widget'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // padding control
        $repeater->add_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .dp-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        // Button Icon
        $repeater->add_control(
            'button_icon',
            [
                'label' => esc_html__('Button Icon', 'my-elementor-widget'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'fa-solid',
                ],
                'label_block' => true
                
            ]
        );

        $repeater->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 8,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .dp-button i' => 'font-size: {{SIZE}}{{UNIT}};', // For fallback (font icons)
                
                ],
                'default' => [
                    
                    'width' => 20,
                    'height' => 20,
                    'size' => 16,
                    'unit' => 'px',
                ],
            ]
        );





$repeater->add_control(
    'icon_color',
    [
        'label' => esc_html__('Icon Color', 'plugin-name'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .dp-button i' => 'color: {{VALUE}};',
            '{{WRAPPER}} .dp-button svg path' => 'fill: {{VALUE}};', // For SVG icons
        ],
    ]
);


        $this->add_control(
            'button_list',
            [
                'label' => esc_html__('Buttons', 'my-elementor-widget'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [],
                'title_field' => '{{{ button_text }}}',
            ]
        );

        $this->end_controls_section();
    }

    public function render() {
    $settings = $this->get_settings_for_display();

        if (!empty($settings['button_list'])) {
        echo '<div class="dp-button-group">';
        
                foreach ($settings['button_list'] as $index => $item) {
                // Important: assign unique class for CURRENT_ITEM
                $repeater_id = $item['_id']; // This is required to target CURRENT_ITEM

                echo '<div class="elementor-repeater-item-' . esc_attr($repeater_id) . '">';
                echo '<a href="' . esc_url($item['button_link']['url']) . '" class="dp-button" >';
                
                echo esc_html($item['button_text']);
                
                if( !empty($item['button_icon']['value'])){
                    echo '<span class="elementor-repeater-icon-'. esc_attr($repeater_id) . '">';
                    \Elementor\Icons_Manager::render_icon($item['button_icon'], ['aria-hidden' => 'true']);
                    echo '</span>';
                }
               

            echo '</a>';
            echo '</div>';
        }

            echo '</div>';
        }

    }

}

Plugin::instance()->widgets_manager->register(new DP_Button_Group());

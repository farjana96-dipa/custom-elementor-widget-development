<?php
namespace Elementor;

class DP_divider extends Widget_Base {

    public function get_name() {
        return 'dp-divider';
    }

    public function get_title() {
        return esc_html__('Divider', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-divider';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

   
    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls(){

   $this->start_controls_section(
    'section_divider',
    [ 'label' => __( 'Divider', 'my-elementor-widget' ) ]
);

// Line / Pattern type
$this->add_control(
    'divider_style',
    [
        'label' => __( 'Style', 'my-elementor-widget' ),
        'type' => \Elementor\Controls_Manager::SELECT,
        'default' => 'solid',
        'options' => [
            'solid'  => __( 'Solid', 'my-elementor-widget' ),
            'double' => __( 'Double', 'my-elementor-widget' ),
            'dotted' => __( 'Dotted', 'my-elementor-widget' ),
            'dashed' => __( 'Dashed', 'my-elementor-widget' ),
            'pattern' => __( 'Pattern', 'my-elementor-widget' ),
        ],
    ]
);

// Pattern variant (only when pattern)
$this->add_control(
    'divider_pattern',
    [
        'label' => __( 'Pattern Type', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::SELECT,
        'default' => 'dots',
        'options' => [
        
        'arrow'   => __( 'Arrow', 'plugin-name' ),
        'plus'    => __( 'Pluses', 'plugin-name' ),
        'star'    => __( 'Stars', 'plugin-name' ),
        'dots'    => __( 'Dots', 'plugin-name' ),
        'fir'     => __( 'Fir Tree', 'plugin-name' ),
        'halves'  => __( 'Half Rounds', 'plugin-name' ),
            // add more if you like (arrows, pluses, etc.)
        ],
        'condition' => [ 'divider_style' => 'pattern' ],
    ]
);


// Width
$this->add_responsive_control(
    'divider_width',
    [
        'label' => __( 'Width', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ '%', 'px' ],
        'range' => [
            '%' => [ 'min' => 0, 'max' => 100 ],
            'px' => [ 'min' => 0, 'max' => 2000 ],
        ],
        'default' => [ 'unit' => '%', 'size' => 100 ],
        'selectors' => [
            '{{WRAPPER}} .dp-divider' => 'width: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Alignment (left/center/right) — instant live via selectors_dictionary
$this->add_responsive_control(
    'divider_align',
    [
        'label' => __( 'Alignment', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::CHOOSE,
        'options' => [
            'left' => [
                'title' => __( 'Left', 'my-elementor-widget' ),
                'icon'  => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => __( 'Center', 'my-elementor-widget' ),
                'icon'  => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => __( 'Right', 'my-elementor-widget' ),
                'icon'  => 'eicon-text-align-right',
            ],
        ],
        'default' => 'center',
        'selectors' => [
            '{{WRAPPER}} .dp-divider' => '{{VALUE}}',
        ],
        'selectors_dictionary' => [
            'left'   => 'margin-left:0;margin-right:auto;',
            'center' => 'margin-left:auto;margin-right:auto;',
            'right'  => 'margin-left:auto;margin-right:0;',
        ],
    ]
);

// Gap around the middle element
$this->add_responsive_control(
    'element_gap',
    [
        'label' => __( 'Gap', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::SLIDER,
        'size_units' => [ 'px' ],
        'range' => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
        'default' => [ 'unit' => 'px', 'size' => 12 ],
        'selectors' => [
            '{{WRAPPER}} .dp-divider' => '--dp-divider-gap: {{SIZE}}{{UNIT}};',
        ],
    ]
);

// Add Element (none/icon/text)
$this->add_control(
    'element_type',
    [
        'label' => __( 'Add Element', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::SELECT,
        'default' => 'none',
        'options' => [
            'none' => __( 'None', 'my-elementor-widget' ),
            'icon' => __( 'Icon', 'my-elementor-widget' ),
            'text' => __( 'Text', 'my-elementor-widget' ),
        ],
    ]
);

$this->add_control(
    'element_icon',
    [
        'label' => __( 'Choose Icon', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::ICONS,
        'condition' => [ 'element_type' => 'icon' ],
    ]
);

$this->add_control(
    'element_text',
    [
        'label' => __( 'Text', 'my-elementor-widget' ),
        'type'  => \Elementor\Controls_Manager::TEXT,
        'default' => __( 'Divider', 'my-elementor-widget' ),
        'condition' => [ 'element_type' => 'text' ],
    ]
);

$this->end_controls_section();


        $this->style_tab();

    }


    public function style_tab(){

        $this->start_controls_section(
            'style',
            [
                'label' => esc_html__('Style','my-elementor-widget'),
            ]
        );

                // Thickness
        $this->add_responsive_control(
            'divider_thickness',
            [
                'label' => __( 'Thickness', 'my-elementor-widget' ),
                'type'  => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [ 'px' => [ 'min' => 1, 'max' => 20 ] ],
                'default' => [ 'unit' => 'px', 'size' => 2 ],
                'selectors' => [
                    '{{WRAPPER}} .dp-divider' => '--dp-divider-thickness: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Color
        $this->add_control(
            'divider_color',
            [
                'label' => __( 'Color', 'my-elementor-widget' ),
                'type'  => \Elementor\Controls_Manager::COLOR,
                'default' => '#222222',
                'selectors' => [
                    '{{WRAPPER}} .dp-divider' => '--dp-divider-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();


    }

  public function render() {
    $s = $this->get_settings_for_display();

    $classes = [ 'dp-divider' ];
    $classes[] = 'dp-divider--style-' . $s['divider_style'];
    if ( 'pattern' === $s['divider_style'] && ! empty( $s['divider_pattern'] ) ) {
        $classes[] = 'dp-divider--pattern-' . $s['divider_pattern'];
    }
    if ( ! empty( $s['element_type'] ) && 'none' !== $s['element_type'] ) {
        $classes[] = 'dp-divider--has-element';
    }

    echo '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">';
        echo '<span class="dp-divider__line" aria-hidden="true"></span>';

        if ( 'icon' === $s['element_type'] && ! empty( $s['element_icon']['value'] ) ) {
            echo '<span class="dp-divider__element">';
            \Elementor\Icons_Manager::render_icon( $s['element_icon'], [ 'aria-hidden' => 'true' ] );
            echo '</span>';
        } elseif ( 'text' === $s['element_type'] && ! empty( $s['element_text'] ) ) {
            echo '<span class="dp-divider__element">' . esc_html( $s['element_text'] ) . '</span>';
        }

        echo '<span class="dp-divider__line" aria-hidden="true"></span>';
    echo '</div>';
}



}


Plugin::instance()->widgets_manager->register(new DP_divider());


?>
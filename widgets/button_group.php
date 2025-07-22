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
        return 'eicon-button-group';
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
            'button_text',
            [
                'label' => esc_html__('Button Text', 'my-elementor-widget'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Click Here', 'my-elementor-widget'),
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'my-elementor-widget'),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'button_background_color',
            [
                'label' => esc_html__('Background Color', 'my-elementor-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} a' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'my-elementor-widget'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_control(
           'button_font_size',
           [
            'label' => esc_html__('Font Size', 'my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 16,
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}} a' => 'font-size: {{VALUE}}px;',
            ]
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
            foreach ($settings['button_list'] as $item) {
                $this->add_render_attribute('button-wrapper', 'class', 'elementor-repeater-item-' . esc_attr($item['_id']) . ' read_more_btn');
                $this->add_render_attribute('button-link', 'href', esc_url($item['button_link']['url']));
                $this->add_render_attribute('button-link', 'class', 'dp-button');

                echo '<div ' . $this->get_render_attribute_string('button-wrapper') . '>';
                echo '<a ' . $this->get_render_attribute_string('button-link') . '>';
                echo esc_html($item['button_text']);
                echo '</a>';
                echo '</div>';
            }
            echo '</div>';
        }
    }
}

Plugin::instance()->widgets_manager->register(new DP_Button_Group());

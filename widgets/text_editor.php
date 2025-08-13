<?php
namespace Elementor;

class DP_TextEditor extends Widget_Base {

    public function get_name() {
        return 'dp-texteditor';
    }

    public function get_title() {
        return esc_html__('Text Editor', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-text-align-left';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

   
    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls(){
        
       

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('CONTENT','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => esc_html__('Text Editor','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'this is my first text editor widget development code.',
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
            'text_style',
            [
                'label' => esc_html__('Text Editor','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );


        // Alignment

     

        $this->add_responsive_control(
            'alignment',
            [
                'label' => esc_html__('Alignment','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left','my-elementor-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center','my-elementor-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right','my-elementor-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justify','my-elementor-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],

                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .dp-text p' => 'text-align:{{VALUE}};',
                    
                ]
            ]
        );

        // Typography

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'text_typography',
               
                'selector' => '{{WRAPPER}} .dp-text p',
            ]
        );


        // Text Shadow

        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow',
                
                'selector' => '{{WRAPPER}} .dp-text p',
            ]
        );


       $this->start_controls_tabs('Normal Color');
        
        //Normal Color

            $this->start_controls_tab(
                'normal_color',
                [
                    'label' => esc_html__('Normal Color','my-elementor-widget'),
                ]
                );

            $this->add_control(
                'text_normal_color',
                [
                    'label' => esc_html__('Text Color','my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dp-text p ' => 'color: {{VALUE}}',
                    ]
                ]
            );

            

            $this->end_controls_tab();

            // Hover Color

            $this->start_controls_tab(
                'hover_color',
                [
                    'label' => esc_html__('Hover Color','my-elementor-widget'),
                ]
                );

            $this->add_control(
                'text_hover_color',
                [
                    'label' => esc_html__('Hover Color','my-elementor-widget'),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .dp-text p:hover ' => 'color: {{VALUE}}',
                    ]
                ]
                    );

                 $this->end_controls_tab();

        $this->end_controls_tabs();

    $this->end_controls_section();
    }

    
    public function render() {
        $text = $this->get_settings_for_display();


        ?>
            <div class="dp-text">
                <p><?php echo $text['text']; ?></p>
            </div>
        <?php


    }


        

    

}
    Plugin::instance()->widgets_manager->register(new DP_TextEditor());


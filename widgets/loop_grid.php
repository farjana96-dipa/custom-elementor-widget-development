<?php

namespace Elementor;






class DP_loop_grid extends Widget_Base {

    public function get_name() {
        return 'dp-loop-grid';
    }

    public function get_title() {
        return esc_html__('Loop Grid', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-loop-builder';
    }

    public function get_categories() {
        return ['my-elementor-widget'];
    }

   
    public function get_script_depends() {
        return ['my-elementor-widget-script'];
    }

    public function _register_controls(){

        $this->start_controls_section(
            'content',
            [
                'label' => esc_html__('Content','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        //template type

        $this->add_control(
            'layout',
            [
                'label' => esc_html__('Layout','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'post' => esc_html__('Posts','my-elementor-widget'),
                    'taxonomy' => esc_html__('Post Taxonomy','my-elementor-widget'),
                    'product' => esc_html__('Product', 'my-elementor-widget'),
                ],
                'default' => 'post',
            ]
        );

        //loop template

        $this->add_control(
            'loop_template',
            [
                'label' => esc_html__('Loop Template', 'my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => $this->get_loop_templates(),
                'default' => '',
            ]
        );

       // Columns Control
        $this->add_control(
            'columns',
            [
                'label'   => __( 'Columns', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 6,
                'step'    => 1,
                'default' => 3,
            ]
        );

        // Posts Per Page
        $this->add_control(
            'posts_per_page',
            [
                'label'   => __( 'Posts Per Page', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 50,
                'step'    => 1,
                'default' => 6,
            ]
        );

        $this->end_controls_section();

   
       //Query 

        $this->start_controls_section(
            'query',
            [
                'label' => esc_html__('Query','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

       // Source 

       $this->add_control(
        'source',
        [
            'label' => esc_html__('Source','my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'post' => __('Posts', 'my-elementor-widget'),
                'page' => __('Pages', 'my-elementor-widget'),
                'manual' => __('Manual Selection', 'my-elementor-widget'),
                'current_query' => __('Current Query', 'my-elementor-widget'),
            ]
        ]
       );

       // Manual Selection 

       $this->add_control(
        'manual_ids',
        [
             'label' => esc_html__('Manual Selection','my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_all_posts(),
            'multiple' => true,
            'label_block' => true,
            'condition' => [
                'source' => 'manual',
            ]
        ]
       );


                // 🔹 Include Tab
    $this->start_controls_tabs( 'query_include_exclude' );

    $this->start_controls_tab(
        'tab_include',
        [ 'label' => __( 'Include', 'your-textdomain' ) ]
    );

    $this->add_control(
        'include_authors',
        [
            'label'       => __( 'Authors', 'your-textdomain' ),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'options'     => $this->get_authors(),
            'multiple'    => true,
            'label_block' => true,
        ]
    );

    $this->add_control(
        'include_terms',
        [
            'label'       => __( 'Include by Terms', 'your-textdomain' ),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'options'     => $this->get_terms_list(),
            'multiple'    => true,
            'label_block' => true,
        ]
    );

    $this->end_controls_tab();

    // 🔹 Exclude Tab
    $this->start_controls_tab(
        'tab_exclude',
        [ 'label' => __( 'Exclude', 'your-textdomain' ) ]
    );

    $this->add_control(
        'exclude_authors',
        [
            'label'       => __( 'Authors', 'your-textdomain' ),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'options'     => $this->get_authors(),
            'multiple'    => true,
            'label_block' => true,
        ]
    );

    $this->add_control(
        'exclude_terms',
        [
            'label'       => __( 'Exclude by Terms', 'your-textdomain' ),
            'type'        => \Elementor\Controls_Manager::SELECT2,
            'options'     => $this->get_terms_list(),
            'multiple'    => true,
            'label_block' => true,
        ]
    );

    $this->end_controls_tab();

    $this->end_controls_tabs();




    // 🔹 Date
    $this->add_control(
        'date',
        [
            'label'   => __( 'Date', 'your-textdomain' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'all'       => __( 'All', 'your-textdomain' ),
                'past_day'  => __( 'Past Day', 'your-textdomain' ),
                'past_week' => __( 'Past Week', 'your-textdomain' ),
                'past_month'=> __( 'Past Month', 'your-textdomain' ),
                'past_year' => __( 'Past Year', 'your-textdomain' ),
            ],
            'default' => 'all',
        ]
    );


     // Order By
    $this->add_control(
        'orderby',
        [
            'label'   => __( 'Order By', 'your-textdomain' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'date',
            'options' => [
                'date'          => __( 'Date', 'your-textdomain' ),
                'title'         => __( 'Title', 'your-textdomain' ),
                'menu_order'    => __( 'Menu Order', 'your-textdomain' ),
                'rand'          => __( 'Random', 'your-textdomain' ),
            ],
        ]
    );


     // Order
    $this->add_control(
        'order',
        [
            'label'   => __( 'Order', 'your-textdomain' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'DESC',
            'options' => [
                'ASC'  => __( 'ASC', 'your-textdomain' ),
                'DESC' => __( 'DESC', 'your-textdomain' ),
            ],
        ]
    );

    // Categories

    $this->add_control(
        'categories',
        [
             'label'   => __( 'Select Categories', 'my-elementor-widget' ),
            'type'    => \Elementor\Controls_Manager::SELECT2,
            'options' => $this->get_terms_list('category'),
            'multiple' => true,
            'label_block' => true,
            'condition' => [
                'post_type' => 'post',
            ]
        ]
    );

    // Query ID
    $this->add_control(
        'query_id',
        [
            'label' => __( 'Query ID (for filters)', 'your-textdomain' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ]
    );






        $this->end_controls_section();
       

        // Pagination

        $this->start_controls_section(
            'pagination',
            [
                'label' => __('Pagination','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'pagination_type',
            [
                'label' => __('Pagination Type','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None','my-elementor-widget'),
                    'numbers' => __('Numbers','my-elementor-widget'),
                    'prev_next' => __('Previous/Next','my-elementor-widget'),
                    'both' => __('Numbers + Previous/Next','my-elementor-widget'),
                ],
                'default' => 'numbers',
            ]
        );

        $this->end_controls_section();

        $this->style_tab();

    }


    public function style_tab(){

        $this->start_controls_section(
            'style',
            [
                'label' => __('Style','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

      

         // pagination typography
         $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'pagination_typography',
                'label' => __('Pagination Typography','my-elementor-widget'),
                'selector' => '{{WRAPPER}} .dipa-pagination .page-numbers',
            ]
         );

         //color tabs
         $this->start_controls_tabs('pagenumber_colors',
        [
            'label' => __('Pagination Page Number Colors','my-elementor-widget'),
        ]);

         // Normal Tab
          $this->start_controls_tab(
                'normal',
                [
                    'label'=> __('Normal','my-elementor-widget'),
                ]
            );

         $this->add_control(
            'normal_background',
            [
                'label' => __('Background Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers' => 'background-color: {{VALUE}};',
                ]
            ]
         );

            $this->add_control(
            'normal_color',
            [
                'label' => __('Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers' => 'color: {{VALUE}};',
                ]
            ]
         );

         $this->end_controls_tab();

         // Hover Tab

          $this->start_controls_tab(
                'hover',
                [
                    'label'=> __('Hover','my-elementor-widget'),
                ]
            );

            $this->add_control(
            'hover_background',
            [
                'label' => __('Background Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers:hover' => 'background-color: {{VALUE}};',
                ]
            ]
         );

            $this->add_control(
            'hover_color',
            [
                'label' => __('Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers:hover' => 'color: {{VALUE}};',
                ]
            ]
         );

         $this->end_controls_tab();

         // Active Tab

            $this->start_controls_tab(
                'active',
                [
                    'label'=> __('Active','my-elementor-widget'),
                ]
            );

            $this->add_control(
            'active_background',
            [
                'label' => __('Background Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers.current' => 'background-color: {{VALUE}};',
                ]
            ]
         );

            $this->add_control(
            'active_color',
            [
                'label' => __('Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .dipa-pagination .page-numbers.current' => 'color: {{VALUE}};',
                ]
            ]
         );

         $this->end_controls_tab();

         $this->end_controls_tabs();


         $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __('Border','my-elementor-widget'),
                'selector' => '{{WRAPPER}} .dipa-pagination .page-numbers',
            ]
         );


         $this->add_control(
            'border_radius',
            [
                'label' => __('Border Radius','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%','em'],
                'default' => [
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left'  => 0,
                    'unit' => 'px',
                ],
               'selectors' => [
					'{{WRAPPER}} .dipa-pagination .page-numbers' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
         );


         // Margin 

         $this->add_control(
            'margin',
            [
                'label' => __('Margin','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px','%','em'],
                'default' => [
                    'top' => 0,
                    'right' => 5,
                    'bottom' => 0,
                    'left'  => 5,
                    'unit' => 'px',
                ],
               'selectors' => [
					'{{WRAPPER}} .dipa-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
            ]
         );

 

        $this->end_controls_section();


        $this->start_controls_section(
            'gap',
            [
                'label' => __('Gap','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        //Column Gap 

       $this->add_responsive_control(
            'columns_gap',
            [
                'label' => __( 'Columns Gap', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-loop-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Rows gap

        $this->add_responsive_control(
            'rows_gap',
            [
                'label' => __( 'Rows Gap', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 20,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .dp-loop-grid' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );


       $this->end_controls_section();




    }
    

    /* ======================== Helper Funcitons start ======================== */

    // Fetch loop templates

    private function get_loop_templates(){
        $templates = [];

        $query = new \Wp_Query([
            'post_type' => 'elementor_library',
            'posts_per_page' => -1,
            'meta_query' => [
                [
                    'key' => '_elementor_template_type',
                    'value' => 'loop-item',
                ]
            ]
        ]);


        foreach($query->posts as $post){
            $templates[$post->ID] = $post->post_title;
        }

        return $templates;
    }

    // Fetch get All Posts
    private function get_all_posts(){
        $posts = get_posts(['numberposts' => -1, 'post_type' => ['post','page']]);

        $options = [];

        foreach($posts as $post){
            $options[$post->ID] = $post->post_title;
        }

        return $options;
    }

    // get authors 

    private function get_authors(){
        $author = get_users(['who' => 'authors']);

        $options = [];

        foreach($author as $user){
            $options[$user->ID] = $user->display_name;
        }

        return $options;
    }

    // get terms list 

    private function get_terms_list(){
        $terms = get_terms(['taxonomy' => 'category', 'hide_empty' => false]);

        $options = [];

        foreach($terms as $term){
            $options[$term->term_id] = $term->name;
        }

        return $options;
    }

     /* ======================== Helper Funcitons End ======================== */

    // get query args builder 

   private function get_query_args( $settings, $paged ) {
    $args = [
        'post_type'      => $settings['source'] === 'page' ? 'page' : 'post',
        'posts_per_page' => ! empty( $settings['posts_per_page'] ) ? (int) $settings['posts_per_page'] : 3,
        'orderby'        => $settings['orderby'],
        'order'          => $settings['order'],
        'paged'          => $paged,
    ];

    // Manual selection
    if ( $settings['source'] === 'manual' && ! empty( $settings['manual_ids'] ) ) {
        $args['post__in'] = $settings['manual_ids'];
        $args['orderby']  = 'post__in';
    }

    // Current query
    if ( $settings['source'] === 'current_query' && is_main_query() ) {
        global $wp_query;
        return $wp_query->query_vars;
    }

    // Include authors
    if ( ! empty( $settings['include_authors'] ) ) {
        $args['author__in'] = $settings['include_authors'];
    }

    // Exclude authors
    if ( ! empty( $settings['exclude_authors'] ) ) {
        $args['author__not_in'] = $settings['exclude_authors'];
    }

    // Include terms
    if ( ! empty( $settings['include_terms'] ) ) {
        $args['tax_query'][] = [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $settings['include_terms'],
        ];
    }

    // Exclude terms
    if ( ! empty( $settings['exclude_terms'] ) ) {
        $args['tax_query'][] = [
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $settings['exclude_terms'],
            'operator' => 'NOT IN',
        ];
    }

    // Date filter
    if ( $settings['date'] !== 'all' ) {
        $after = '';
        switch ( $settings['date'] ) {
            case 'past_day': $after = '1 day ago'; break;
            case 'past_week': $after = '1 week ago'; break;
            case 'past_month': $after = '1 month ago'; break;
            case 'past_year': $after = '1 year ago'; break;
        }
        if ( $after ) {
            $args['date_query'][] = [ 'after' => $after ];
        }
    }

         return $args;
    }




     

    // render function 

    public function render(){

        $settings = $this->get_settings_for_display();

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
       

        $query_args = $this->get_query_args($settings, $paged);
        $query = new \Wp_Query($query_args);


        echo '<div class="dipa-loop-grid" style="display:grid; grid-template-columns: repeat('.esc_attr($settings['columns']).',1fr);gap:20px;">'; 

        if($query->have_posts() && $settings['loop_template']){
            while($query->have_posts()){
                $query->the_post();

                 // Render loop template
                 echo '<div class="dp-loop-item">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display(
                        $settings['loop_template'],
                        true
                    );

                    echo '</div>';
            }
             wp_reset_postdata();
        }

        echo '</div>';



        // Pagination
        if ( $settings['pagination_type'] !== 'none' ) {
            echo '<div class="dipa-pagination">';

            if ( $settings['pagination_type'] === 'numbers' ) {
                echo paginate_links([
                    'total'   => $query->max_num_pages,
                    'current' => $paged,
                ]);
            } elseif ( $settings['pagination_type'] === 'prev_next' ) {
                previous_posts_link( __( '« Previous', 'dipa' ), $query->max_num_pages );
                next_posts_link( __( 'Next »', 'dipa' ), $query->max_num_pages );
            } elseif ( $settings['pagination_type'] === 'both' ) {
                previous_posts_link( __( '« Previous', 'dipa' ), $query->max_num_pages );
                echo paginate_links([
                    'total'   => $query->max_num_pages,
                    'current' => $paged,
                ]);
                next_posts_link( __( 'Next »', 'dipa' ), $query->max_num_pages );
            }

            echo '</div>';
        }


    }


}


Plugin::instance()->widgets_manager->register(new DP_loop_grid());

?>
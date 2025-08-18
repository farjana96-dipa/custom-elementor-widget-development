<?php
namespace Elementor;

class DP_Video extends Widget_Base {

    public function get_name() {
        return 'dp-video';
    }

    public function get_title() {
        return esc_html__('Video', 'my-elementor-widget');
    }

    public function get_icon() {
        return 'eicon-video';
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
                'label' => esc_html__('Video','my-elementor-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        //Video SOURCE

       
    $this->add_control(
        'video_source',
        [
            'label' => __( 'Source', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'youtube',
            'options' => [
                'youtube' => __( 'YouTube', 'my-elementor-widget' ),
                'vimeo' => __( 'Vimeo', 'my-elementor-widget' ),
                'self' => __( 'Self Hosted', 'my-elementor-widget' ),
            ],
        ]
    );

    $this->add_control(
        'youtube_url',
        [
            'label' => __( 'YouTube URL', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'https://www.youtube.com/watch?v=XHOmBV4js_E', 'my-elementor-widget' ),
            'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
            'condition' => [
                'video_source' => 'youtube',
            ],
        ]
    );

    $this->add_control(
        'vimeo_url',
        [
            'label' => __( 'Vimeo URL', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => __( 'https://vimeo.com/123456', 'my-elementor-widget' ),
            'condition' => [
                'video_source' => 'vimeo',
            ],
        ]
    );

    $this->add_control(
        'self_video',
        [
            'label' => __( 'Upload Video', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => [ 'video' ],
            'condition' => [
                'video_source' => 'self',
            ],
        ]
    );

      

    // Start Time
    $this->add_control(
        'start_time',
        [
            'label' => esc_html__('Start Time','my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 0,
            'min' => 0,
            'description' => esc_html__('Specify a start time (in seconds)','my-elementor-widget'),
        ]
    );


     // End Time
    $this->add_control(
        'end_time',
        [
            'label' => esc_html__('End Time','my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'description' => esc_html__('Specify a end time (in seconds)','my-elementor-widget'),
            
        ]
    );



    // Video Options

    
   

    // Autoplay
   $this->add_control(
    'autoplay',
    [
        'label' => __( 'Autoplay', 'my-elementor-widget' ),
        'type' => \Elementor\Controls_Manager::SWITCHER,
        'label_on' => __( 'Yes', 'my-elementor-widget' ),
        'label_off' => __( 'No', 'my-elementor-widget' ),
        'return_value' => 'yes',
        'default' => 'yes', // ✅ This makes it "Yes" by default
        'description' => esc_html__('Note: Autoplay is affected by Google’s Autoplay policy on Chrome browsers.','my-elementor-widget'),
    ]
);


    // Mute
    $this->add_control(
        'mute',
        [
            'label' => __( 'Mute', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
        ]
    );

    // Loop
    $this->add_control(
        'loop',
        [
         'label' => __( 'Loop', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
        ]
    );

     // Player Controls
    $this->add_control(
        'player_controls',[
         'label' => __( 'Player Controls', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'yes',
        ]
    );

     // Privacy Mode
    $this->add_control(
        'privacy_mode',
        [
         'label' => __( 'Privacy Mode', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
            'description' => esc_html__('When you turn on privacy mode, YouTube/Vimeo will not store information about visitors on your website unless they play the video.','my-elementor-widget'),
        ]
    );
      
     // Caption
    $this->add_control(
        'caption',
        [
         'label' => __( 'Caption', 'my-elementor-widget' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'no',
        ]
    );

      // Lazy Lood
        $this->add_control(
            'lazy_load',
            [
                'label' => __( 'Lazy Load', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'text-domain' ),
                'label_off' => __( 'Off', 'text-domain' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'description' => __( 'Enable to load the video only when it becomes visible, improving performance.', 'text-domain' ),
            ]
        );

        $this->end_controls_section();

         //Image Overlay

    $this->start_controls_section(
        'image_over',
        [
         'label' => esc_html__('Image Overlay','my-elementor-widget'),
         'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );


     // imgage overlay control
            $this->add_control(
                'image_overlay11',
                [
                    'label' => __( 'Image Overlay', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no',
                    
                ]
            );

           // Image Overlay Control
            $this->add_control(
                'image_overlay',
                [
                    'label' => __( 'Image Overlay', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'description' => __( 'Select an image to show before playing the video.', 'my-elementor-widget' ),
                    'condition' => [
                        'image_overlay11' => 'yes'
                    ]
                ]
            );

            // Play Icon Control
            $this->add_control(
                'play_icon',
                [
                    'label' => __( 'Play Icon', 'my-elementor-widget' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'fas fa-play',
                        'library' => 'solid',
                    ],
                    'description' => __( 'Select an icon for the play button overlay.', 'my-elementor-widget' ),
                     'label_block' => true,
                     'condition' => [
                        'image_overlay11' => 'yes'
                    ]
                ]
            );


            //Icon size 

        $this->add_responsive_control(
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
                    '{{WRAPPER}} .dp-play-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .dp-play-icon i' => 'font-size: {{SIZE}}{{UNIT}};', // For fallback (font icons)
                
                ],
                'default' => [
                    
                    'width' => 20,
                    'height' => 20,
                    'size' => 16,
                    'unit' => 'px',
                ],
            ]
        );


        //Icon Color

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Icon Color','my-elementor-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .dp-play-icon svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .dp-play-icon i' => 'color: {{VALUE}};', // For fallback (font icons)
                
                ],
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
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

       $this->add_control(
        'aspect_ratio',
        [
            'label' => esc_html__('Aspect Ratio','my-elementor-widget'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '1-1' => esc_html__('1:1','my-elementor-widget'),
                '3-2' => esc_html__('3:2','my-elementor-widget'),
                '4-3' => esc_html__('4:3','my-elementor-widget'),
                '16-9' => esc_html__('16:9','my-elementor-widget'),
                '21-9' => esc_html__('21:9','my-elementor-widget'),
                '9-16' => esc_html__('9:16','my-elementor-widget'),

            ],
            'default' => '16-9'
        ]
    );


    $this->end_controls_section();



   

    }

    
public function render() {
    $settings = $this->get_settings_for_display();

    $ratio_class = 'aspect-ratio-' . $settings['aspect_ratio'];
    
    $image_url = !empty($settings['image_overlay']['url']) ? esc_url($settings['image_overlay']['url']) : '';
   
   

    if ( $settings['video_source'] === 'youtube' && !empty($settings['youtube_url']) ) {

        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $settings['youtube_url'], $matches);
        $video_id = $matches[1] ?? '';

        $autoplay = $settings['autoplay'] === 'yes' ? 1 : 0;
        $muted = $settings['mute'] === 'yes' ? 1 : 0 ;
        $loop = $settings['loop'] === 'yes' ? 1 : 0 ;
        $player_controls = $settings['player_controls'] === 'yes' ? 1 : 0 ;
        $privacy_mode = $settings['privacy_mode'] === 'yes' ? 1 : 0 ;
        $caption = $settings['caption'] === 'yes' ? 1 : 0 ;
        $lazy_attr = $settings['lazy_load'] === 'yes' ? 'loading="lazy"' : '';

        $src = "https://www.youtube.com/embed/{$video_id}?autoplay={$autoplay}&muted={$muted}&start={$settings['start_time']}&loop={$loop}&controls={$player_controls}&cc_policy_mode={$privacy_mode}&caption={$caption}";

        if(! empty($settings['end_time'])){
            $src .= "&end={$settings['end_time']}";
        }


            if ($image_url) {
                 echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . '">';

                 echo '<iframe class="dp-video-iframe" width="100%" height="650" src="' . esc_url($src) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

                echo '<div class="dp-video-overlay">';
                    echo '<img src="' . esc_url($image_url) . '" alt="Video Thumbnail" class="dp-overlay-image" />';
                    echo '<div class="dp-play-icon">';
                        \Elementor\Icons_Manager::render_icon($settings['play_icon'], ['aria-hidden' => 'true']);
                    echo '</div>';
                echo '</div>';

                echo '</div>';
            }

            else{
                echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . '">';
                 echo '<iframe class="dp-video-iframe" width="100%" height="650" src="' . esc_url($src) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
                echo '</div>';
            }

            

            
    }
    elseif ( $settings['video_source'] === 'vimeo' && ! empty( $settings['vimeo_url'] ) ) {
       preg_match('/vimeo\.com\/([0-9]+)/', $settings['vimeo_url'], $matches);
       $video_id = $matches[1] ?? '';
       $autoplay = $settings['autoplay'] === 'yes' ? 1 : 0;
       $mute     = $settings['mute'] === 'yes' ? 1 : 0;


       $src = "https://player.vimeo.com/video/{$video_id}?autoplay={$autoplay}&muted={$mute}";




       if ( $image_url ) {
           echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . ' ">';
          
           echo '<iframe class="dp-video-iframe" width="100%" height="650px" autoplay="true" src="' . esc_url( $src ) . '" '. $lazy_attr .' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
          
           echo '<div class="dp-video-overlay ' . esc_attr($ratio_class) . '">';
           echo '<img src="' . $image_url . '" alt="Video Thumbnail" class="overlay" />';
           echo '<div class="dp-play-icon">' ;
            \Elementor\Icons_Manager::render_icon($settings['play_icon'], ['aria-hidden' => 'true']);
           echo '</div>';
           echo '</div>';
           echo '</div>';
       }


       else{
            echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . '">';
           echo '<iframe class="dp-video-iframe" width="100%" height="650px" autoplay="true" src="' . esc_url( $src ) . '" '. $lazy_attr .' frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
           echo '</div>';
       }


    
   }


   elseif ( $settings['video_source'] === 'self' && ! empty( $settings['self_video']['url'] ) ) {
       $autoplay_attr = $settings['autoplay'] === 'yes' ? 'autoplay' : '';
       $mute_attr     = $settings['mute'] === 'yes' ? 'muted' : '';


       $src = $settings['self_video']['url'];
      
       if ( $image_url ) {
           echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . ' ">';


            echo '<video ' . $autoplay_attr . ' ' . $mute_attr . ' controls playsinline>';
           echo '<source src="' . esc_url( $settings['self_video']['url'] ) . '" type="video/mp4">';
           echo __( 'Your browser does not support the video tag.', 'my-elementor-widget' );
           echo '</video>';




           echo '<div class="dp-video-overlay ' . esc_attr($ratio_class) . '">';
           echo '<img src="' . $image_url . '" alt="Video Thumbnail" class="overlay" />';
           echo '<div class="dp-play-icon">' ;
            \Elementor\Icons_Manager::render_icon($settings['play_icon'], ['aria-hidden' => 'true']);
           echo '</div>';
           echo '</div>';
           echo '</div>';
       }
       else{
           echo '<div class="dp-video-wrapper ' . esc_attr($ratio_class) . '">';
           echo '<video ' . $autoplay_attr . ' ' . $mute_attr . ' controls playsinline>';
           echo '<source src="' . esc_url( $settings['self_video']['url'] ) . '" type="video/mp4">';
           echo __( 'Your browser does not support the video tag.', 'my-elementor-widget' );
           echo '</video>';
           echo '</div>';
       }
     


   }


     




}


}

    
    Plugin::instance()->widgets_manager->register(new DP_Video());

    ?>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dp-video-wrapper").forEach(wrapper => {
        const overlay = wrapper.querySelector(".dp-video-overlay");
        const iframe = wrapper.querySelector(".dp-video-iframe");

        //console.log("the video is loaded");

        if (overlay && iframe) {
            overlay.addEventListener("click", function () {
                let src = iframe.getAttribute("src");

                // Force autoplay & mute so browsers allow playback
                src = src.replace("autoplay=0", "autoplay=1");
                src = src.replace("muted=0", "muted=1");

                if (!src.includes("autoplay=1")) {
                    const joiner = src.includes("?") ? "&" : "?";
                    src += joiner + "autoplay=1&mute=1";
                }

                iframe.setAttribute("src", src);

                // Hide overlay
                overlay.style.display = "none";
                wrapper.classList.add("playing");
            });
        }
    });
});


</script>


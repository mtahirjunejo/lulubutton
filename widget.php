<?php

class Elementor_Widget_1 extends \Elementor\Widget_Base {

  public function get_name()
  {
    return 'lulu-button';
  }

  public function get_title()
  {
    return esc_html__('LuLu Button', 'textdomain');
  }

  public function get_icon()
  {
    return 'eicon-code';
  }

  public function get_custom_help_url()
  {
    return 'https://go.elementor.com/widget-name';
  }

  public function get_categories()
  {
    return ['general'];
  }

  public function get_keywords()
  {
    return ['keyword', 'keyword'];
  }

  public function register_controls()
  {

    $this->start_controls_section(
      'title_section',
      [
        'label' => __('Button', 'text-domain'),
      ]
    );

    $this->add_control(

      'custom_title',
      [
        'label' => __('Title', 'text-domain'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'default' => 'Blob Button', // Default title text
        'placeholder' => 'Enter your title here', // Placeholder text
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(

      'style_section',
      [
        'label' => esc_html__('Style Section', 'textdomain'),
        'tab' => \Elementor\Controls_Manager::TAB_STYLE,
      ]
    );

    $this->add_control(

      'title_color',
      [
        'label' => __('Title Color', 'text-domain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0505A9', // Default title color
        'selectors' => [
          '{{WRAPPER}} .blob-btn' => 'color: {{VALUE}};',
        ],
      ]
    );

    $this->add_control(

      'title_hover_color',
      [
        'label' => __('Title Hover Color', 'text-domain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#FFFFFF', // Default title hover color
        'selectors' => [
          '{{WRAPPER}} .blob-btn:hover' => 'color: {{VALUE}};', // Apply the color to the title on hover
        ],
      ]
    );

    $this->add_control(

      'background_color',
      [
        'label' => __('Background Color', 'text-domain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => 'transparent', // Default background color before hover
        'selectors' => [
          '{{WRAPPER}} .blob-btn__inner' => 'background-color: {{VALUE}};', // Apply the color to the background
        ],
      ]
    );

    $this->add_control(
      'background_hover_color',
      [
        'label' => __('Background Hover Color', 'text-domain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#333333', // Default background color on hover
        'selectors' => [
          '{{WRAPPER}} .blob-btn__blob' => 'background-color: {{VALUE}};', // Apply the color to the background on hover
        ],
      ]
    );


    $this->add_group_control(
      \Elementor\Group_Control_Typography::get_type(),
      [
        'name' => 'title_typography',
        'label' => __('Typography', 'text-domain'),
        'selector' => '{{WRAPPER}} .blob-btn',
      ]
    );
    
    $this->add_control(

      'padding',
      [
          'label' => __( 'Padding', 'text-domain' ),
          'type' => \Elementor\Controls_Manager::DIMENSIONS,
          'size_units' => [ 'px', '%', 'em' ],
          'selectors' => [
              '{{WRAPPER}} .blob-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
          ],
      ]
  );

    $this->add_control(

      'border_color',
      [
        'label' => __('Border Color', 'text-domain'),
        'type' => \Elementor\Controls_Manager::COLOR,
        'default' => '#0505A9', // Default border color
      ]
    );

    $this->add_control(

      'border_radius',
      [
        'label' => __('Border Radius', 'text-domain'),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => ['px', '%', 'em'],
        'selectors' => [
          '{{WRAPPER}} .blob-btn__inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
      ]
    );

    $this->end_controls_section();
  }


  protected function render()
  {

    $settings = $this->get_settings();

    $custom_title = isset($settings['custom_title']) ? $settings['custom_title'] : 'Blob Button';



?>
    <style>

      .blob-btn {
        z-index: 1;
        position: relative;
        padding: 20px 46px;
        text-align: center;
        text-transform: uppercase;
        color: #0505A9;
        font-size: 16px;
        font-weight: bold;
        border: 2px solid <?php echo $settings['border_color']; ?>;

        outline: none;
        border: none;
        transition: color 0.5s;
        cursor: pointer;
      }

      .blob-btn:before {
        content: "";
        z-index: 1;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
      }

      .blob-btn:after {
        content: "";
        z-index: -2;
        position: absolute;
        left: 3px;
        top: 3px;
        width: 100%;
        height: 100%;
        transition: all 0.3s 0.2s;
      }

      .blob-btn:hover {
        color: #FFFFFF;
      }

      .blob-btn:hover:after {
        transition: all 0.3s;
        left: 0;
        top: 0;
      }

      .blob-btn__inner {
        z-index: -1;
        overflow: hidden;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        /* background: #ffffff; */
      }

      .blob-btn__blobs {
        position: relative;
        display: block;
        height: 100%;
        filter: url('#goo');
      }

      .blob-btn__blob {
        position: absolute;
        top: 2px;
        width: 25%;
        height: 100%;
        background: #0505A9;
        border-radius: 100%;
        transform: translate3d(0, 150%, 0) scale(1.7);
        transition: transform 0.45s;
      }

      .blob-btn__blob:nth-child(1) {
        left: 0;
        transition-delay: 0s;
      }

      .blob-btn__blob:nth-child(2) {
        left: 30%;
        transition-delay: 0.08s;
      }

      .blob-btn__blob:nth-child(3) {
        left: 60%;
        transition-delay: 0.16s;
      }

      .blob-btn__blob:nth-child(4) {
        left: 90%;
        transition-delay: 0.24s;
      }

      .blob-btn:hover .blob-btn__blob {
        transform: translateZ(0) scale(1.7);
      }
    </style>

    <div class="buttons">
      <button class="blob-btn" style="background-color:  <?php echo $settings['background_color']; ?>;padding: <?php echo $settings['padding']['top']; ?><?php echo $settings['padding']['unit']; ?> <?php echo $settings['padding']['right']; ?><?php echo $settings['padding']['unit']; ?> <?php echo $settings['padding']['bottom']; ?><?php echo $settings['padding']['unit']; ?> <?php echo $settings['padding']['left']; ?><?php echo $settings['padding']['unit']; ?>;">
        <?php echo esc_html($custom_title); ?>
        <span class="blob-btn__inner" style="border: 2px solid <?php echo $settings['border_color']; ?>;">
          <span class="blob-btn__blobs">
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
            <span class="blob-btn__blob"></span>
          </span>
        </span>
      </button>
      <br />

      <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none;">
        <defs>
          <filter id="goo">
            <feGaussianBlur in="SourceGraphic" result="blur" stdDeviation="10"></feGaussianBlur>
            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 21 -7"></feColorMatrix>
            <feBlend in2="goo" in="SourceGraphic" result="mix"></feBlend>
          </filter>
        </defs>
      </svg>
    </div>
<?php
  }
}

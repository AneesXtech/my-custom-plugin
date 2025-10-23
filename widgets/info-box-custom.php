<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Info_Box_Custom extends \Elementor\Widget_Base {

    public function get_name() {
        return 'info_box_custom';
    }

    public function get_title() {
        return __( 'Info Box Custom', 'my-custom-plugin' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'my-custom-category' ];
    }

    // ============================
    //  CONTENT CONTROLS
    // ============================
    protected function register_controls() {

        // --- ICON SECTION ---
        $this->start_controls_section(
            'icon_section',
            [
                'label' => __( 'Icon / Image', 'my-custom-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'my-custom-plugin' ),
                        'icon' => 'eicon-star',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'my-custom-plugin' ),
                        'icon' => 'eicon-image-bold',
                    ],
                    'svg' => [
                        'title' => __( 'SVG', 'my-custom-plugin' ),
                        'icon' => 'eicon-code',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'selected_icon',
            [
                'label' => __( 'Select Icon', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => ['icon_type' => 'icon']
            ]
        );

        $this->add_control(
            'icon_image',
            [
                'label' => __( 'Upload Image', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => ['icon_type' => 'image']
            ]
        );

        $this->add_control(
            'icon_svg',
            [
                'label' => __( 'SVG Code', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => ['icon_type' => 'svg'],
                'placeholder' => __( '<svg>...</svg>', 'my-custom-plugin' ),
            ]
        );

        $this->end_controls_section();

        // --- CONTENT SECTION ---
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'my-custom-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Heading', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'This is the heading', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Learn More', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Button Link', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                ],
            ]
        );

        $this->end_controls_section();

        // ============================
        //  STYLE CONTROLS
        // ============================

        // --- BOX STYLE ---
        $this->start_controls_section(
            'box_style',
            [
                'label' => __( 'Box', 'my-custom-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __( 'Padding', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .info-box-custom' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_alignment',
            [
                'label' => __( 'Alignment', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => 'Left', 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => 'Center', 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => 'Right', 'icon' => 'eicon-text-align-right'],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .info-box-custom' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_background',
                'selector' => '{{WRAPPER}} .info-box-custom',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'selector' => '{{WRAPPER}} .info-box-custom',
            ]
        );

        $this->add_responsive_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .info-box-custom' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'selector' => '{{WRAPPER}} .info-box-custom',
            ]
        );

        $this->add_control(
            'hover_animation',
            [
                'label' => __( 'Hover Animation', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'my-custom-plugin' ),
                    'scale' => __( 'Scale Up', 'my-custom-plugin' ),
                    'rotate' => __( 'Rotate', 'my-custom-plugin' ),
                    'shadow' => __( 'Shadow Glow', 'my-custom-plugin' ),
                ],
                'default' => 'scale',
            ]
        );

        $this->end_controls_section();

        // --- BUTTON STYLE ---
        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button', 'my-custom-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __( 'Normal', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#6C63FF',
                'selectors' => [
                    '{{WRAPPER}} .info-box-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Text Color', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .info-box-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __( 'Hover', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'button_bg_hover',
            [
                'label' => __( 'Hover Background', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#514ED8',
                'selectors' => [
                    '{{WRAPPER}} .info-box-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_color',
            [
                'label' => __( 'Hover Text Color', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .info-box-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .info-box-btn',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .info-box-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .info-box-btn',
            ]
        );

        $this->end_controls_section();
    }

    // ============================
    //  RENDER OUTPUT
    // ============================
    protected function render() {
        $settings = $this->get_settings_for_display();
        $hover_class = 'hover-' . $settings['hover_animation'];
        ?>
        <div class="info-box-custom <?php echo esc_attr( $hover_class ); ?>">
            <div class="info-box-icon">
                <?php
                if ( 'icon' === $settings['icon_type'] && ! empty( $settings['selected_icon']['value'] ) ) {
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                } elseif ( 'image' === $settings['icon_type'] && ! empty( $settings['icon_image']['url'] ) ) {
                    echo '<img src="' . esc_url( $settings['icon_image']['url'] ) . '" alt="" />';
                } elseif ( 'svg' === $settings['icon_type'] && ! empty( $settings['icon_svg'] ) ) {
                    echo $settings['icon_svg']; // Render raw SVG
                }
                ?>
            </div>

            <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h3><?php echo esc_html( $settings['title'] ); ?></h3>
            <?php endif; ?>

            <?php if ( ! empty( $settings['description'] ) ) : ?>
                <p><?php echo esc_html( $settings['description'] ); ?></p>
            <?php endif; ?>

            <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="info-box-btn">
                    <?php echo esc_html( $settings['button_text'] ); ?>
                </a>
            <?php endif; ?>
        </div>
        <?php
    }
}

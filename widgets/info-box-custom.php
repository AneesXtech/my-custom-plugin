<?php
if ( ! defined( 'ABSPATH' ) ) exit;

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

    protected function register_controls() {

        // === Content Tab ===
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'my-custom-plugin' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'svg' => [
                        'title' => __( 'SVG', 'my-custom-plugin' ),
                        'icon' => 'eicon-code',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'my-custom-plugin' ),
                        'icon' => 'eicon-image',
                    ],
                ],
                'default' => 'svg',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icon_svg',
            [
                'label' => __( 'SVG Icon Code', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '<svg width="40" height="40" fill="#6C63FF"><circle cx="20" cy="20" r="20"/></svg>',
                'condition' => ['icon_type' => 'svg']
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
            'heading',
            [
                'label' => __( 'Heading', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Content Managed', 'my-custom-plugin' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'my-custom-plugin' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Netflix has struck a deal to set a permanent production base at Shepperton Studios, from Alien to Mary Poppins Returns', 'my-custom-plugin' ),
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
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="info-box-custom">
            <div class="info-box-icon">
                <?php
                if ($settings['icon_type'] === 'svg') {
                    echo $settings['icon_svg'];
                } else {
                    echo '<img src="' . esc_url($settings['icon_image']['url']) . '" alt="" />';
                }
                ?>
            </div>
            <h3><?php echo esc_html($settings['heading']); ?></h3>
            <p><?php echo esc_html($settings['description']); ?></p>

            <?php if ( ! empty( $settings['button_text'] ) ) : ?>
                <a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="info-box-btn">
                    <?php echo esc_html( $settings['button_text'] ); ?>
                </a>
            <?php endif; ?>
        </div>
        <?php
    }
}

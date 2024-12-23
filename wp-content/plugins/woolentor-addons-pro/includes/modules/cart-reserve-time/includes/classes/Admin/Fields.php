<?php
namespace WoolentorPro\Modules\CartReserveTime\Admin;
use WooLentorPro\Traits\Singleton;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Fields {
    use Singleton;

    /**
     * Settings Fields Fields;
     */
    public function sitting_fields(){
        
        $fields = [
            [
                'name'   => 'cart_reserve_timer_settings',
                'label'  => esc_html__( 'Cart Reserved Timer', 'woolentor' ),
                'type'   => 'module',
                'default'=> 'off',
                'section'  => 'woolentor_cart_reserve_timer_settings',
                'option_id' => 'enable',
                'documentation' => esc_url('https://woolentor.com/doc/cart-reserved-timer-reduce-cart-abandonment-in-woocommerce/'),
                'require_settings'  => true,
                'setting_fields' => [
                    [
                        'name'    => 'enable',
                        'label'   => esc_html__( 'Enable / Disable', 'woolentor' ),
                        'desc'    => esc_html__( 'Enable / disable this module.', 'woolentor' ),
                        'type'    => 'checkbox',
                        'default' => 'off',
                        'class'   => 'woolentor-action-field-left'
                    ],
                    [
                        'name'    => 'reserve_time',
                        'label'   => esc_html__( 'Reserve Time (Minutes)', 'woolentor' ),
                        'desc'    => esc_html__( 'Set the cart reserve time in minutes.', 'woolentor' ),
                        'type'    => 'number',
                        'default' => '15',
                        'class'   => 'woolentor-action-field-left'
                    ],
                    [
                        'name'    => 'cart_message',
                        'label'   => esc_html__( 'Demand Message', 'woolentor' ),
                        'desc'    => esc_html__( 'Message to show high demand status.', 'woolentor' ),
                        'type'    => 'text',
                        'default' => esc_html__('An item of your cart is in high demand.', 'woolentor'),
                        'class'   => 'woolentor-action-field-left'
                    ],
            
                    [
                        'name'    => 'timer_message',
                        'label'   => esc_html__( 'Timer Message', 'woolentor' ),
                        'desc'    => esc_html__( 'Use {time} placeholder to display the countdown timer.', 'woolentor' ),
                        'type'    => 'text',
                        'default' => esc_html__('Your cart is saved for {time} minutes!', 'woolentor'),
                        'class'   => 'woolentor-action-field-left'
                    ],
            
                    [
                        'name'    => 'expire_action',
                        'label'   => esc_html__( 'Expiration Action', 'woolentor' ),
                        'desc'    => esc_html__( 'Select action to perform when timer expires.', 'woolentor' ),
                        'type'    => 'select',
                        'default' => 'hide',
                        'options' => [
                            'hide'  => esc_html__('Hide Timer', 'woolentor'),
                            'clear' => esc_html__('Clear Cart', 'woolentor'),
                            'redirect' => esc_html__('Custom Redirect', 'woolentor'),
                            'coupon'   => esc_html__('Apply Coupon', 'woolentor'),
                        ],
                        'class'   => 'woolentor-action-field-left'
                    ],

                    [
                        'name'    => 'redirect_url',
                        'label'   => esc_html__( 'Redirect URL', 'woolentor' ),
                        'type'    => 'text',
                        'class'   => 'woolentor-action-field-left',
                        'condition' => [ 'expire_action', '==', 'redirect' ]
                    ],
        
                    [
                        'name'    => 'coupon_code',
                        'label'   => esc_html__( 'Coupon Code', 'woolentor' ),
                        'type'    => 'text',
                        'class'   => 'woolentor-action-field-left',
                        'condition' => [ 'expire_action', '==', 'coupon' ]
                    ],
    
                    [
                        'name'    => 'notice_icon',
                        'label'   => esc_html__( 'Notice Icon', 'woolentor' ),
                        'desc'    => esc_html__( 'Choose an icon to display with the message.', 'woolentor' ),
                        'type'    => 'select',
                        'default' => 'fire',
                        'options' => [
                            'none'      => esc_html__('None', 'woolentor'),
                            'fire'      => esc_html__('🔥 Fire', 'woolentor'),
                            'hourglass' => esc_html__('⌛ Hourglass', 'woolentor'),
                            'bell'      => esc_html__('🔔 Bell', 'woolentor'),
                            'watch'     => esc_html__('⏱️ Watch', 'woolentor'),
                            'timer'     => esc_html__('⏳ Timer', 'woolentor'),
                            'rocket'    => esc_html__('🚀 Rocket', 'woolentor'),
                            'alert'     => esc_html__('🚨 Alert', 'woolentor'),
                            'spark'     => esc_html__('✨ Spark', 'woolentor'),
                        ],
                        'class'   => 'woolentor-action-field-left'
                    ],

                    array(
                        'name'    => 'product_specific_settings',
                        'headding'=> esc_html__( 'Product Specific Settings', 'woolentor' ),
                        'type'    => 'title'
                    ),
        
                    array(
                        'name'    => 'enable_per_product',
                        'label'   => esc_html__( 'Enable Per Product Timer', 'woolentor' ),
                        'desc'    => esc_html__( 'Enable different timer settings for individual products.', 'woolentor' ),
                        'type'    => 'checkbox',
                        'default' => 'off',
                        'class'   => 'woolentor-action-field-left'
                    ),
        
                    array(
                        'name'    => 'product_categories',
                        'label'   => esc_html__( 'Product Categories', 'woolentor' ),
                        'desc'    => esc_html__( 'Apply timer to specific product categories.', 'woolentor' ),
                        'type'    => 'multiselect',
                        'options' => woolentor_taxonomy_list('product_cat','term_id'),
                        'class'   => 'woolentor-action-field-left',
                        'condition' => [ 'enable_per_product', '==', 'true' ]
                    ),
        
                    array(
                        'name'    => 'style_settings',
                        'headding'=> esc_html__( 'Style Settings', 'woolentor' ),
                        'type'    => 'title'
                    ),
        
                    array(
                        'name'    => 'notice_style',
                        'label'   => esc_html__( 'Notice Style', 'woolentor' ),
                        'type'    => 'select',
                        'options' => array(
                            'style-1' => esc_html__('Style One', 'woolentor'),
                            'style-2' => esc_html__('Style Two', 'woolentor'),
                            'style-3' => esc_html__('Style Three', 'woolentor'),
                        ),
                        'default' => 'style-1',
                        'class'   => 'woolentor-action-field-left'
                    ),
        
                    array(
                        'name'    => 'background_color',
                        'label'   => esc_html__( 'Background Color', 'woolentor' ),
                        'type'    => 'color',
                        'default' => '#f7f6f7',
                        'class'   => 'woolentor-action-field-left'
                    ),
        
                    array(
                        'name'    => 'text_color',
                        'label'   => esc_html__( 'Text Color', 'woolentor' ),
                        'type'    => 'color',
                        'default' => '#515151',
                        'class'   => 'woolentor-action-field-left'
                    ),
        
                    array(
                        'name'    => 'timer_color',
                        'label'   => esc_html__( 'Timer Color', 'woolentor' ),
                        'type'    => 'color',
                        'default' => '#ff6b6b',
                        'class'   => 'woolentor-action-field-left'
                    ),

                    array(
                        'name'    => 'content_align',
                        'type'    => 'select',
                        'label'   => esc_html__('Content Align', 'woolentor'),
                        'options' => array(
                            'left'   => esc_html__('Left', 'woolentor'),
                            'center' => esc_html__('Center', 'woolentor'),
                            'right'  => esc_html__('Right', 'woolentor'),
                        ),
                        'default'   => 'left',
                        'class'     => 'woolentor-action-field-left'
                    ),

                ]
            ]
        ];

        return $fields;

    }

}
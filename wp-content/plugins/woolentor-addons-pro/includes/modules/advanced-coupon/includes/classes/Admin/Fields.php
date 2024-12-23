<?php
namespace WoolentorPro\Modules\AdvancedCoupon\Admin;
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
                'name'   => 'advanced_coupon_settings',
                'label'  => esc_html__( 'Advanced Coupon', 'woolentor-pro' ),
                'type'   => 'module',
                'default'=> 'off',
                'section'  => 'woolentor_advanced_coupon_settings',
                'option_id' => 'enable',
                'documentation' => esc_url('https://woolentor.com/doc/advanced-coupon/'),
                'require_settings'  => true,
                'setting_fields' => [
                    [
                        'name'    => 'enable',
                        'label'   => esc_html__( 'Enable / Disable', 'woolentor-pro' ),
                        'desc'    => esc_html__( 'Enable / disable this module.', 'woolentor-pro' ),
                        'type'    => 'checkbox',
                        'default' => 'off',
                        'class'   => 'woolentor-action-field-left'
                    ],
                    [
                        'name'    => 'url_coupon',
                        'label'   => esc_html__( 'URL Coupons', 'woolentor-pro' ),
                        'desc'    => esc_html__( 'Enable / disable URL Coupon.', 'woolentor-pro' ),
                        'type'    => 'checkbox',
                        'default' => 'off',
                        'class'   => 'woolentor-action-field-left'
                    ],
                    [
                        'name'    => 'url_coupon_slug',
                        'label'   => esc_html__( 'URL Coupon Slug', 'woolentor-pro' ),
                        'desc'    => esc_html__( 'You can change URL coupon slug from here.', 'woolentor-pro' ),
                        'type'    => 'text',
                        'default' => 'discount',
                        'class'   => 'woolentor-action-field-left',
                        'condition' => [ 'url_coupon', '==', 'true' ],
                    ]

                ]
            ]
        ];

        return $fields;

    }

}
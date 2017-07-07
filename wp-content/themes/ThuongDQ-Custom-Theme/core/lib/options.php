<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'ThuongDQ_Theme_Options' ) ) {

    class ThuongDQ_Theme_Options {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if ( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
            }

        }

        public function initSettings() {

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if ( ! isset( $this->args['opt_name'] ) ) { // No errors please
                return;
            }

            $this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
        }

        public function setSections() {

            // ACTUAL DECLARATION OF SECTIONS
            //Global
            $this->sections[] = array(
                'title'  => __( 'Tổng quát', 'ThuongDQ' ),
                'desc'   => __( 'Cấu hình chung cho toàn Website.', 'ThuongDQ' ),
                'icon'   => 'el el-globe',
                // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
                'fields' => array(
                    array(
                        'id'    => 'default-image',
                        'type'  => 'media',
                        'title' => __('Hình ảnh mặc định', 'ThuongDQ'),
                        'desc'  => __('Hình ảnh thay thế cho những khu vực không có ảnh.', 'ThuongDQ')
                    )
                )
            );

            $this->sections[] = array(
                'title'  => __( 'Đầu trang', 'ThuongDQ' ),
                'desc'   => __( 'Nội dung hiển thị trên cùng của trang.', 'ThuongDQ' ),
                'icon'   => 'el el-arrow-down',
                'fields' => array(

                    array(
                        'id'       => 'logo-on',
                        'type'     => 'switch',
                        'title'    => __( 'Bật hình ảnh', 'ThuongDQ' ),
                        'compiler' => 'bool',
                        // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'     => __( 'Bạn có muốn hiển thị logo và banner trên website ?', 'ThuongDQ' ),
                        'on'        => __('Hiển thị', 'ThuongDQ'),
                        'off'       => __('Tắt', 'ThuongDQ')
                    ),
                    array(
                        'id'    => 'logo-image',
                        'type'  => 'media',
                        'title' => __('Hình ảnh Logo', 'ThuongDQ'),
                        'desc'  => __('Hình ảnh bạn muốn sử dụng làm logo.', 'ThuongDQ')
                    ),
                    array(
                        'id'    => 'banner-image',
                        'type'  => 'media',
                        'title' => __('Hình ảnh Banner', 'ThuongDQ'),
                        'desc'  => __('Hình ảnh bạn muốn sử dụng làm banner.', 'ThuongDQ')
                    ),
                    array(
                        'id'       => 'menu-main',
                        'type'     => 'select',
                        'title'    => __('Menu Chính', 'redux-framework-demo'), 
                        'subtitle' => __('Nằm trên cùng của website', 'redux-framework-demo'),
                        'desc'     => __('Đây là menu chính nằm trên cùng website (menu đa cấp)', 'ThuongDQ'),
                        'data'     => 'menu'
                    ),
                )
            );

            $this->sections[] = array(
                'title'  => __( 'Nội dung lề', 'ThuongDQ' ),
                'desc'   => __( 'Nội dung hiển thị bên lề của website', 'ThuongDQ' ),
                'icon'   => 'el el-indent-left',
                'fields' => array(
                    array(
                        'id'       => 'support',
                        'type'     => 'select',
                        'title'    => __('Tư vấn giảm cân', 'ThuongDQ'), 
                        'subtitle' => __('Support', 'ThuongDQ'),
                        'desc'     => __('Là có class SUPPORT', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'skill',
                        'type'     => 'select',
                        'title'    => __('Bí quyết giảm cân', 'ThuongDQ'), 
                        'subtitle' => __('Skill', 'ThuongDQ'),
                        'desc'     => __('Là có class SKILL', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'success',
                        'type'     => 'select',
                        'title'    => __('Giảm cân thành công', 'ThuongDQ'), 
                        'subtitle' => __('success', 'ThuongDQ'),
                        'desc'     => __('Là có class SUCCESS', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                     array(
                        'id'       => 'link',
                        'type'     => 'select',
                        'title'    => __('Liên kết Website', 'ThuongDQ'), 
                        'subtitle' => __('link', 'ThuongDQ'),
                        'desc'     => __('Là có class Link', 'ThuongDQ'),
                        'data'     => 'menu'
                    ),
                    array(
                        'id'       => 'involve',
                        'type'     => 'select',
                        'title'    => __('Bệnh liên quan', 'ThuongDQ'), 
                        'subtitle' => __('involve', 'ThuongDQ'),
                        'desc'     => __('Là có class INVOLVE', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                )
            );

            $this->sections[] = array(
                'title'  => __( 'Nội dung chính', 'ThuongDQ' ),
                'desc'   => __( 'Nội dung hiển thị trên chính giữa website. (Nội dung thay đổi theo từng trang)', 'ThuongDQ' ),
                'icon'   => 'el el-home',
                'fields' => array(
                    array(
                        'id'       => 'home-box-1',
                        'type'     => 'select',
                        'title'    => __('Home Box 1', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-1', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-2',
                        'type'     => 'select',
                        'title'    => __('Home Box 2', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-2', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-3',
                        'type'     => 'select',
                        'title'    => __('Home Box 3', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-3', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-4',
                        'type'     => 'select',
                        'title'    => __('Home Box 4', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-4', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-5',
                        'type'     => 'select',
                        'title'    => __('Home Box 5', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-5', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-6',
                        'type'     => 'select',
                        'title'    => __('Home Box 6', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-6', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-7',
                        'type'     => 'select',
                        'title'    => __('Home Box 7', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-7', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    ),
                    array(
                        'id'       => 'home-box-8',
                        'type'     => 'select',
                        'title'    => __('Home Box 8', 'ThuongDQ'), 
                        'subtitle' => __('', 'ThuongDQ'),
                        'desc'     => __('Là có class home-box-8', 'ThuongDQ'),
                        'data'     => 'categories',
                        'args' => array(
                            'orderby' => 'term_id',
                            'order'   => 'ASC'
                        )
                    )
                    
                )
            );

            $this->sections[] = array(
                'title'  => __( 'Quảng cáo', 'ThuongDQ' ),
                'desc'   => __( 'Nội dung hiển thị bên phải Website (Sidebar Right)', 'ThuongDQ' ),
                'icon'   => 'el el-indent-right',

                'fields' => array(
                    array(
                        'id'          => 'home',
                        'type'        => 'slides',
                        'title'       => __('Quảng cáo trang chủ', 'ThuongDQ'),
                        'subtitle'    => __('Các box quảng cáo trên trang chủ', 'ThuongDQ'),
                        'desc'        => __('Đây là box chứa tất cả hình ảnh quảng cáo trên trang chủ', 'ThuongDQ'),
                        'placeholder' => array(
                            'title'           => __('Tiêu đề', 'ThuongDQ'),
                            'description'     => __('Mô tả', 'ThuongDQ'),
                            'url'             => __('Liên kết', 'ThuongDQ'),
                        ),
                    ),
                    array(
                        'id'          => 'weight-category',
                        'type'        => 'slides',
                        'title'       => __('Quảng cáo trang chuyên mục giảm cân', 'ThuongDQ'),
                        'subtitle'    => __('Các box quảng cáo trên trang chuyên mục giảm cân', 'ThuongDQ'),
                        'desc'        => __('Đây là box chứa tất cả hình ảnh quảng cáo trên trang chuyên mục giảm cân', 'ThuongDQ'),
                        'placeholder' => array(
                            'title'           => __('Tiêu đề', 'ThuongDQ'),
                            'description'     => __('Mô tả', 'ThuongDQ'),
                            'url'             => __('Liên kết', 'ThuongDQ'),
                        ),
                    ),
                    array(
                        'id'          => 'child-weight-category',
                        'type'        => 'slides',
                        'title'       => __('Quảng cáo trang chuyên mục con giảm cân và trang chi tiết', 'ThuongDQ'),
                        'subtitle'    => __('Các box quảng cáo trên trang chuyên mục con giảm cân và trang chi tiết', 'ThuongDQ'),
                        'desc'        => __('Đây là box chứa tất cả hình ảnh quảng cáo trên trang chuyên mục con giảm cân và trang chi tiết', 'ThuongDQ'),
                        'placeholder' => array(
                            'title'           => __('Tiêu đề', 'ThuongDQ'),
                            'description'     => __('Mô tả', 'ThuongDQ'),
                            'url'             => __('Liên kết', 'ThuongDQ'),
                        ),
                    ),
                    array(
                        'id'          => 'video-category',
                        'type'        => 'slides',
                        'title'       => __('Quảng cáo trang chuyên mục video', 'ThuongDQ'),
                        'subtitle'    => __('Các box quảng cáo trên trang chuyên mục video và chuyên mục con của video', 'ThuongDQ'),
                        'desc'        => __('Đây là box chứa tất cả hình ảnh quảng cáo trên trang chuyên mục video  và chuyên mục con của video', 'ThuongDQ'),
                        'placeholder' => array(
                            'title'           => __('Tiêu đề', 'ThuongDQ'),
                            'description'     => __('Mô tả', 'ThuongDQ'),
                            'url'             => __('Liên kết', 'ThuongDQ'),
                        ),
                    ),
                )
            );

            $this->sections[] = array(
                'title'  => __( 'Cuối trang', 'ThuongDQ' ),
                'desc'   => __( 'Nội dung hiển thị bên dưới cùng của Website (Footer)', 'ThuongDQ' ),
                'icon'   => 'el el-arrow-up',
                'fields' => array(
                    array(
                        'id'       => 'footer-name',
                        'type'     => 'text',
                        'title'    => __('Tên công ty', 'redux-framework-demo'),
                        'subtitle' => __(''),
                        'desc'     => __('', 'redux-framework-demo'),
                    ),
                    array(
                        'id'               => 'footer-address',
                        'type'             => 'editor',
                        'title'            => __('Địa chỉ công ', 'redux-framework-demo'), 
                        'subtitle'         => __('Thông tin hỗ trợ để khách hàng có thể liên hệ khi cần thiết.', 'redux-framework-demo'),
                        'default'          => 'Powered by Redux.',
                        'args'   => array(
                            'teeny'            => true,
                            'textarea_rows'    => 10
                        )
                    ),
                )
            );


            
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-1',
                'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
                'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
            );

            $this->args['help_tabs'][] = array(
                'id'      => 'redux-help-tab-2',
                'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
                'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'           => 'tp_options',
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'       => $theme->get( 'Name' ),
                // Name that appears at the top of your panel
                'display_version'    => $theme->get( 'Version' ),
                // Version that appears at the top of your panel
                'menu_type'          => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'     => true,
                // Show the sections below the admin menu item or not
                'menu_title'         => __( 'Tuỳ chỉnh giao diện', 'redux-framework-demo' ),
                'page_title'         => __( 'Tuỳ chỉnh giao diện', 'redux-framework-demo' ),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key'     => 'AIzaSyAs0iVWrG4E_1bG244-z4HRKJSkg7JVrVQ',
                // Must be defined to add google fonts to the typography module

                'async_typography'   => false,
                // Use a asynchronous font on the front end or font string
                'admin_bar'          => true,
                // Show the panel pages on the admin bar
                'global_variable'    => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode'           => true,
                // Show the time the page took to load, etc
                'customizer'         => true,
                // Enable basic customizer support

                // OPTIONAL -> Give you extra features
                'page_priority'      => null,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'        => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'   => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon'          => '',
                // Specify a custom URL to an icon
                'last_tab'           => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon'          => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug'          => '_options',
                // Page slug used to denote the panel
                'save_defaults'      => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show'       => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark'       => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time'     => 60 * MINUTE_IN_SECONDS,
                'output'             => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'         => true,
                // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'           => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info'        => false,
                // REMOVE

                // HINTS
                'hints'              => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'   => 'light',
                        'shadow'  => true,
                        'rounded' => false,
                        'style'   => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
            $this->args['share_icons'][] = array(
                'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
                'title' => 'Visit us on GitHub',
                'icon'  => 'el el-github'
                //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
            );
            $this->args['share_icons'][] = array(
                'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon'  => 'el el-facebook'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon'  => 'el el-twitter'
            );
            $this->args['share_icons'][] = array(
                'url'   => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon'  => 'el el-linkedin'
            );

            // Panel Intro text -> before the form
            if ( ! isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
                if ( ! empty( $this->args['global_variable'] ) ) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace( '-', '_', $this->args['opt_name'] );
                }
                $this->args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
            } else {
                $this->args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
            }

            // Add content after the form.
            $this->args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );
        }

    }

    global $reduxConfig;
    $reduxConfig = new ThuongDQ_Theme_Options();
}

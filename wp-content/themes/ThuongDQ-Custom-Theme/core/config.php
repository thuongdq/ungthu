<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "tp_options";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Cấu hình', 'ThuongDQ' ),
        'page_title'           => __( 'Cấu hình', 'ThuongDQ' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
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

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'ThuongDQ' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'ThuongDQ' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'ThuongDQ' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'ThuongDQ' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'ThuongDQ' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'ThuongDQ' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'ThuongDQ' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ThuongDQ' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'ThuongDQ' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ThuongDQ' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'ThuongDQ' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    // BEGIN GLOBAL
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Tổng quát', 'ThuongDQ' ),
        'desc'   => __( 'Cấu hình chung cho toàn Website.', 'ThuongDQ' ),
        'icon'   => 'el el-globe',
        'id'     => 'global',
        'fields' => array(
                array(
                    'id'    => 'default-image',
                    'type'  => 'media',
                    'title' => __('Hình ảnh mặc định', 'ThuongDQ'),
                    'desc'  => __('Hình ảnh thay thế cho những khu vực không có ảnh.', 'ThuongDQ')
                )
            )
    ) );
    // END GLOBAL

    // -> START Basic Fields
    // BEGIN HEADER
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Đầu trang', 'ThuongDQ' ),
        'desc'   => __( 'Cấu hình chung cho toàn Website.', 'ThuongDQ' ),
        'icon'   => 'el el-arrow-down',
        'id'     => 'header',
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
                    'title'    => __('Menu Chính', 'ThuongDQ'), 
                    'subtitle' => __('Nằm trên cùng của website', 'ThuongDQ'),
                    'desc'     => __('Đây là menu chính nằm trên cùng website (menu đa cấp)', 'ThuongDQ'),
                    'data'     => 'menu'
                ),
            )
    ) );
    // END HEADER

    // -> START Basic Fields
    // BEGIN CONTENT
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Nội dung chính', 'ThuongDQ' ),
        'id'               => 'content',
        'desc'             => __( 'Cấu hình tất cả nội dung nằm giữa trang!', 'ThuongDQ' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields' => array(
                array(
                    'id'       => 'category-hot',
                    'type'     => 'select',
                    'title'    => __('Chuyên mục hot', 'ThuongDQ'), 
                    'desc'             => __( 'Là chuyển hiển thị trên trang chủ', 'ThuongDQ' ) ,
                    'subtitle' => __('', 'ThuongDQ'),
                    'data'     => 'categories',
                    'args' => array(
                        'orderby' => 'term_id',
                        'order'   => 'ASC'
                )
            ),
            )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 1', 'ThuongDQ' ),
        'id'               => 'home-box-1',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 1 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-1',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-1-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-1-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 2', 'ThuongDQ' ),
        'id'               => 'home-box-2',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 2 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-2',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-2-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-2-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 3', 'ThuongDQ' ),
        'id'               => 'home-box-3',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 3 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-3',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-3-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-3-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 4', 'ThuongDQ' ),
        'id'               => 'home-box-4',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 4 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-4',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-4-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-4-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 5', 'ThuongDQ' ),
        'id'               => 'home-box-5',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 5 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-5',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-5-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-5-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 6', 'ThuongDQ' ),
        'id'               => 'home-box-6',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 6 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-6',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-6-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-6-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 7', 'ThuongDQ' ),
        'id'               => 'home-box-7',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 7 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-7',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-7-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-7-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home box 8', 'ThuongDQ' ),
        'id'               => 'home-box-8',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'Nội dung hiển thị box 8 trên trang chủ (box có class "có class home-box-1" )', 'ThuongDQ' ) ,
        'fields'           => array(
            array(
                'id'       => 'home-box-8',
                'type'     => 'select',
                'title'    => __('Danh mục chính', 'ThuongDQ'), 
                'subtitle' => __('', 'ThuongDQ'),
                'data'     => 'categories',
                'args' => array(
                    'orderby' => 'term_id',
                    'order'   => 'ASC'
                )
            ),
            array(
                'id'       => 'home-box-8-sub-category-1',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 1', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị cùng hàng so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'home-box-8-sub-category-2',
                'type'     => 'select',
                'title'    => __('Danh sách danh mục con hàng 2', 'ThuongDQ'), 
                'subtitle' => __('link', 'ThuongDQ'),
                'desc'     => __('Là các danh mục con hiển thị hàng dưới so với danh mục chính', 'ThuongDQ'),
                'data'     => 'menu'
            ),
        )
    ) );
    // END CONTENT










































































    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Basic Fields', 'ThuongDQ' ),
        'id'               => 'basic',
        'desc'             => __( 'These are really basic fields!', 'ThuongDQ' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Checkbox', 'ThuongDQ' ),
        'id'               => 'basic-checkbox',
        'subsection'       => true,
        'customizer_width' => '450px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/checkbox/" target="_blank">docs.reduxframework.com/core/fields/checkbox/</a>',
        'fields'           => array(
            array(
                'id'       => 'opt-checkbox',
                'type'     => 'checkbox',
                'title'    => __( 'Checkbox Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'opt-multi-check',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    '1' => '1',
                    '2' => '0',
                    '3' => '0'
                )
            ),
            array(
                'id'       => 'opt-checkbox-data',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option (with menu data)', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'data'     => 'menu'
            ),
            array(
                'id'       => 'opt-checkbox-sidebar',
                'type'     => 'checkbox',
                'title'    => __( 'Multi Checkbox Option (with sidebar data)', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'data'     => 'sidebars'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Radio', 'ThuongDQ' ),
        'id'               => 'basic-Radio',
        'subsection'       => true,
        'customizer_width' => '500px',
        'desc'             => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/radio/" target="_blank">docs.reduxframework.com/core/fields/radio/</a>',
        'fields'           => array(
            array(
                'id'       => 'opt-radio',
                'type'     => 'radio',
                'title'    => __( 'Radio Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-radio-data',
                'type'     => 'radio',
                'title'    => __( 'Radio Option w/ Menu Data', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'data'     => 'menu'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sortable', 'ThuongDQ' ),
        'id'         => 'basic-Sortable',
        'subsection' => true,
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/sortable/" target="_blank">docs.reduxframework.com/core/fields/sortable/</a>',
        'fields'     => array(
            array(
                'id'       => 'opt-sortable',
                'type'     => 'sortable',
                'title'    => __( 'Sortable Text Option', 'ThuongDQ' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'label'    => true,
                'options'  => array(
                    'Text One'   => 'Item 1',
                    'Text Two'   => 'Item 2',
                    'Text Three' => 'Item 3',
                )
            ),
            array(
                'id'       => 'opt-check-sortable',
                'type'     => 'sortable',
                'mode'     => 'checkbox', // checkbox or text
                'title'    => __( 'Sortable Text Option', 'ThuongDQ' ),
                'subtitle' => __( 'Define and reorder these however you want.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'options'  => array(
                    'cb1' => 'Checkbox One',
                    'cb2' => 'Checkbox Two',
                    'cb3' => 'Checkbox Three',
                ),
                'default'  => array(
                    'cb1' => false,
                    'cb2' => true,
                    'cb3' => false,
                )
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Text', 'ThuongDQ' ),
        'desc'             => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/text/" target="_blank">docs.reduxframework.com/core/fields/text/</a>',
        'id'               => 'basic-Text',
        'subsection'       => true,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
                'id'       => 'text-example',
                'type'     => 'text',
                'title'    => __( 'Text Field', 'ThuongDQ' ),
                'subtitle' => __( 'Subtitle', 'ThuongDQ' ),
                'desc'     => __( 'Field Description', 'ThuongDQ' ),
                'default'  => 'Default Text',
            ),
            array(
                'id'        => 'text-example-hint',
                'type'      => 'text',
                'title'     => __( 'Text Field w/ Hint', 'ThuongDQ' ),
                'subtitle'  => __( 'Subtitle', 'ThuongDQ' ),
                'desc'      => __( 'Field Description', 'ThuongDQ' ),
                'default'   => 'Default Text',
                'text_hint' => array(
                    'title'   => 'Hint Title',
                    'content' => 'Hint content about this field!'
                )
            ),
            array(
                'id'          => 'text-placeholder',
                'type'        => 'text',
                'title'       => __( 'Text Field', 'ThuongDQ' ),
                'subtitle'    => __( 'Subtitle', 'ThuongDQ' ),
                'desc'        => __( 'Field Description', 'ThuongDQ' ),
                'placeholder' => 'Placeholder Text',
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Multi Text', 'ThuongDQ' ),
        'id'         => 'basic-Multi Text',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/multi-text/" target="_blank">docs.reduxframework.com/core/fields/multi-text/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-multitext',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Text Option', 'ThuongDQ' ),
                'subtitle' => __( 'Field subtitle', 'ThuongDQ' ),
                'desc'     => __( 'Field Decription', 'ThuongDQ' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Password', 'ThuongDQ' ),
        'id'         => 'basic-Password',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/password/" target="_blank">docs.reduxframework.com/core/fields/password/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'password',
                'type'     => 'password',
                'username' => true,
                'title'    => 'Password Field',
                //'placeholder' => array(
                //    'username' => 'Username',
                //    'password' => 'Password',
                //)
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Textarea', 'ThuongDQ' ),
        'id'         => 'basic-Textarea',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/textarea/" target="_blank">docs.reduxframework.com/core/fields/textarea/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-textarea',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - HTML Validated Custom', 'ThuongDQ' ),
                'subtitle' => __( 'Subtitle', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => 'Default Text',
            )
        )
    ) );

    // -> START Editors
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Editors', 'ThuongDQ' ),
        'id'               => 'editor',
        'customizer_width' => '500px',
        'icon'             => 'el el-edit',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'WordPress Editor', 'ThuongDQ' ),
        'id'         => 'editor-wordpress',
        //'icon'  => 'el el-home'
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-editor',
                'type'     => 'editor',
                'title'    => __( 'Editor', 'ThuongDQ' ),
                'subtitle' => __( 'Use any of the features of WordPress editor inside your panel!', 'ThuongDQ' ),
                'default'  => 'Powered by Redux Framework.',
            ),
            array(
                'id'      => 'opt-editor-tiny',
                'type'    => 'editor',
                'title'   => __( 'Editor w/o Media Button', 'ThuongDQ' ),
                'default' => 'Powered by Redux Framework.',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    'quicktags'     => false,
                )
            ),
            array(
                'id'         => 'opt-editor-full',
                'type'       => 'editor',
                'title'      => __( 'Editor - Full Width', 'ThuongDQ' ),
                'full_width' => true
            ),
        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/editor/" target="_blank">docs.reduxframework.com/core/fields/editor/</a>',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'ACE Editor', 'ThuongDQ' ),
        'id'         => 'editor-ace',
        //'icon'  => 'el el-home'
        'subsection' => true,
        'desc'       => __( 'For full documentation on the this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/ace-editor/" target="_blank">docs.reduxframework.com/core/fields/ace-editor/</a>',
        'fields'     => array(
            array(
                'id'       => 'opt-ace-editor-css',
                'type'     => 'ace_editor',
                'title'    => __( 'CSS Code', 'ThuongDQ' ),
                'subtitle' => __( 'Paste your CSS code here.', 'ThuongDQ' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "#header{\n   margin: 0 auto;\n}"
            ),
            array(
                'id'       => 'opt-ace-editor-js',
                'type'     => 'ace_editor',
                'title'    => __( 'JS Code', 'ThuongDQ' ),
                'subtitle' => __( 'Paste your JS code here.', 'ThuongDQ' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'desc'     => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'  => "jQuery(document).ready(function(){\n\n});"
            ),
            array(
                'id'         => 'opt-ace-editor-php',
                'type'       => 'ace_editor',
                'full_width' => true,
                'title'      => __( 'PHP Code', 'ThuongDQ' ),
                'subtitle'   => __( 'Paste your PHP code here.', 'ThuongDQ' ),
                'mode'       => 'php',
                'theme'      => 'chrome',
                'desc'       => 'Possible modes can be found at <a href="' . 'http://' . 'ace.c9.io" target="_blank">' . 'http://' . 'ace.c9.io/</a>.',
                'default'    => '<?php
    echo "PHP String";'
            ),


        )
    ) );

    // -> START Color Selection
    Redux::setSection( $opt_name, array(
        'title' => __( 'Color Selection', 'ThuongDQ' ),
        'id'    => 'color',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color', 'ThuongDQ' ),
        'id'         => 'color-Color',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/color/" target="_blank">docs.reduxframework.com/core/fields/color/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-title',
                'type'     => 'color',
                'output'   => array( '.site-title' ),
                'title'    => __( 'Site Title Color', 'ThuongDQ' ),
                'subtitle' => __( 'Pick a title color for the theme (default: #000).', 'ThuongDQ' ),
                'default'  => '#000000',
            ),
            array(
                'id'       => 'opt-color-footer',
                'type'     => 'color',
                'title'    => __( 'Footer Background Color', 'ThuongDQ' ),
                'subtitle' => __( 'Pick a background color for the footer (default: #dd9933).', 'ThuongDQ' ),
                'default'  => '#dd9933',
                'validate' => 'color',
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color Gradient', 'ThuongDQ' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/color-gradient/" target="_blank">docs.reduxframework.com/core/fields/color-gradient/</a>',
        'id'         => 'color-gradient',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-header',
                'type'     => 'color_gradient',
                'title'    => __( 'Header Gradient Color Option', 'ThuongDQ' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => array(
                    'from' => '#1e73be',
                    'to'   => '#00897e'
                )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color RGBA', 'ThuongDQ' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/color-rgba/" target="_blank">docs.reduxframework.com/core/fields/color-rgba/</a>',
        'id'         => 'color-rgba',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-color-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Color RGBA', 'ThuongDQ' ),
                'subtitle' => __( 'Gives you the RGBA color.', 'ThuongDQ' ),
                'default'  => array(
                    'color' => '#7e33dd',
                    'alpha' => '.8'
                ),
                //'output'   => array( 'body' ),
                'mode'     => 'background',
                //'validate' => 'colorrgba',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Link Color', 'ThuongDQ' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/link-color/" target="_blank">docs.reduxframework.com/core/fields/link-color/</a>',
        'id'         => 'color-link',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-link-color',
                'type'     => 'link_color',
                'title'    => __( 'Links Color Option', 'ThuongDQ' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //'regular'   => false, // Disable Regular Color
                //'hover'     => false, // Disable Hover Color
                //'active'    => false, // Disable Active Color
                //'visited'   => true,  // Enable Visited Color
                'default'  => array(
                    'regular' => '#aaa',
                    'hover'   => '#bbb',
                    'active'  => '#ccc',
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Palette Colors', 'ThuongDQ' ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/palette-color/" target="_blank">docs.reduxframework.com/core/fields/palette-color/</a>',
        'id'         => 'color-palette',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-palette-color',
                'type'     => 'palette',
                'title'    => __( 'Palette Color Option', 'ThuongDQ' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => 'red',
                'palettes' => array(
                    'red'  => array(
                        '#ef9a9a',
                        '#f44336',
                        '#ff1744',
                    ),
                    'pink' => array(
                        '#fce4ec',
                        '#f06292',
                        '#e91e63',
                        '#ad1457',
                        '#f50057',
                    ),
                    'cyan' => array(
                        '#e0f7fa',
                        '#80deea',
                        '#26c6da',
                        '#0097a7',
                        '#00e5ff',
                    ),
                )
            ),
        )
    ) );


    // -> START Design Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Design Fields', 'ThuongDQ' ),
        'id'    => 'design',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-wrench'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Background', 'ThuongDQ' ),
        'id'         => 'design-background',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-background',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => __( 'Body Background', 'ThuongDQ' ),
                'subtitle' => __( 'Body background with image, color, etc.', 'ThuongDQ' ),
                //'default'   => '#FFFFFF',
            ),

        ),
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/background/" target="_blank">docs.reduxframework.com/core/fields/background/</a>',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Border', 'ThuongDQ' ),
        'id'         => 'design-border',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/border/" target="_blank">docs.reduxframework.com/core/fields/border/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-header-border',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'ThuongDQ' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'ThuongDQ' ),
                'output'   => array( '.site-header' ),
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
            array(
                'id'       => 'opt-header-border-expanded',
                'type'     => 'border',
                'title'    => __( 'Header Border Option', 'ThuongDQ' ),
                'subtitle' => __( 'Only color validation can be done on this field type', 'ThuongDQ' ),
                'output'   => array( '.site-header' ),
                'all'      => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'default'  => array(
                    'border-color'  => '#1e73be',
                    'border-style'  => 'solid',
                    'border-top'    => '3px',
                    'border-right'  => '3px',
                    'border-bottom' => '3px',
                    'border-left'   => '3px'
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Dimensions', 'ThuongDQ' ),
        'id'         => 'design-dimensions',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/dimensions/" target="_blank">docs.reduxframework.com/core/fields/dimensions/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'             => 'opt-dimensions',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width/Height) Option', 'ThuongDQ' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'ThuongDQ' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'ThuongDQ' ),
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
            array(
                'id'             => 'opt-dimensions-width',
                'type'           => 'dimensions',
                'units'          => array( 'em', 'px', '%' ),    // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',  // Allow users to select any type of unit
                'title'          => __( 'Dimensions (Width) Option', 'ThuongDQ' ),
                'subtitle'       => __( 'Allow your users to choose width, height, and/or unit.', 'ThuongDQ' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Width, Height, or Units.', 'ThuongDQ' ),
                'height'         => false,
                'default'        => array(
                    'width'  => 200,
                    'height' => 100,
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Spacing', 'ThuongDQ' ),
        'id'         => 'design-spacing',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/spacing/" target="_blank">docs.reduxframework.com/core/fields/spacing/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-spacing',
                'type'     => 'spacing',
                'output'   => array( '.site-header' ),
                // An array of CSS selectors to apply this font style to
                'mode'     => 'margin',
                // absolute, padding, margin, defaults to padding
                'all'      => true,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                //'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                //'left'          => false,     // Disable the left
                //'units'         => 'em',      // You can specify a unit value. Possible: px, em, %
                //'units_extended'=> 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'    => __( 'Padding/Margin Option', 'ThuongDQ' ),
                'subtitle' => __( 'Allow your users to choose the spacing or margin they want.', 'ThuongDQ' ),
                'desc'     => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'ThuongDQ' ),
                'default'  => array(
                    'margin-top'    => '1px',
                    'margin-right'  => '2px',
                    'margin-bottom' => '3px',
                    'margin-left'   => '4px'
                )
            ),
            array(
                'id'             => 'opt-spacing-expanded',
                'type'           => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'           => 'margin',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                //'top'           => false,     // Disable the top
                //'right'         => false,     // Disable the right
                //'bottom'        => false,     // Disable the bottom
                //'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                //'display_units' => 'false',   // Set to false to hide the units if the units are specified
                'title'          => __( 'Padding/Margin Option', 'ThuongDQ' ),
                'subtitle'       => __( 'Allow your users to choose the spacing or margin they want.', 'ThuongDQ' ),
                'desc'           => __( 'You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'ThuongDQ' ),
                'default'        => array(
                    'margin-top'    => '1px',
                    'margin-right'  => '2px',
                    'margin-bottom' => '3px',
                    'margin-left'   => '4px'
                )
            ),
        )
    ) );

    // -> START Media Uploads
    Redux::setSection( $opt_name, array(
        'title' => __( 'Media Uploads', 'ThuongDQ' ),
        'id'    => 'media',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-picture'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Gallery', 'ThuongDQ' ),
        'id'         => 'media-gallery',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/gallery/" target="_blank">docs.reduxframework.com/core/fields/gallery/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-gallery',
                'type'     => 'gallery',
                'title'    => __( 'Add/Edit Gallery', 'ThuongDQ' ),
                'subtitle' => __( 'Create a new Gallery by selecting existing or uploading new images using the WordPress native uploader', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Media', 'ThuongDQ' ),
        'id'         => 'media-media',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/media/" target="_blank">docs.reduxframework.com/core/fields/media/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Media w/ URL', 'ThuongDQ' ),
                'compiler' => 'true',
                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'     => __( 'Basic media uploader with disabled URL input field.', 'ThuongDQ' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'ThuongDQ' ),
                'default'  => array( 'url' => 'http://s.wordpress.org/style/images/codeispoetry.png' ),
                //'hint'      => array(
                //    'title'     => 'Hint Title',
                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                //)
            ),
            array(
                'id'       => 'media-no-url',
                'type'     => 'media',
                'title'    => __( 'Media w/o URL', 'ThuongDQ' ),
                'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'ThuongDQ' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'media-no-preview',
                'type'     => 'media',
                'preview'  => false,
                'title'    => __( 'Media No Preview', 'ThuongDQ' ),
                'desc'     => __( 'This represents the minimalistic view. It does not have the preview box or the display URL in an input box. ', 'ThuongDQ' ),
                'subtitle' => __( 'Upload any media using the WordPress native uploader', 'ThuongDQ' ),
                'hint'     => array(
                    'title'   => 'Test',
                    'content' => 'This is a <b>hint</b> tool-tip for the webFonts field.<br/><br/>Add any HTML based text you like here.',
                )
            ),
            array(
                'id'         => 'opt-random-upload',
                'type'       => 'media',
                'title'      => __( 'Upload Anything - Disabled Mode', 'ThuongDQ' ),
                'full_width' => true,
                'mode'       => false,
                // Can be set to false to allow any media type, or can also be set to any mime type.
                'desc'       => __( 'Basic media uploader with disabled URL input field.', 'ThuongDQ' ),
                'subtitle'   => __( 'Upload any media using the WordPress native uploader', 'ThuongDQ' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slides', 'ThuongDQ' ),
        'id'         => 'additional-slides',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/slides/" target="_blank">docs.reduxframework.com/core/fields/slides/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'          => 'opt-slides',
                'type'        => 'slides',
                'title'       => __( 'Slides Options', 'ThuongDQ' ),
                'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'ThuongDQ' ),
                'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'ThuongDQ' ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'ThuongDQ' ),
                    'description' => __( 'Description Here', 'ThuongDQ' ),
                    'url'         => __( 'Give us a link!', 'ThuongDQ' ),
                ),
            ),
        )
    ) );

    // -> START Presentation Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Presentation Fields', 'ThuongDQ' ),
        'id'    => 'presentation',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-screen'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Divide', 'ThuongDQ' ),
        'id'         => 'presentation-divide',
        'desc'       => __( 'The spacer to the section menu as seen to the left (after this section block) is the divide "section". Also the divider below is the divide "field".', 'ThuongDQ' ) . '<br />' . __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/divide/" target="_blank">docs.reduxframework.com/core/fields/divide/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'opt-divide',
                'type' => 'divide'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Info', 'ThuongDQ' ),
        'id'         => 'presentation-info',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/info/" target="_blank">docs.reduxframework.com/core/fields/info/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'opt-info-field',
                'type' => 'info',
                'desc' => __( 'This is the info field, if you want to break sections up.', 'ThuongDQ' )
            ),
            array(
                'id'    => 'opt-notice-info1',
                'type'  => 'info',
                'style' => 'info',
                'title' => __( 'This is a title.', 'ThuongDQ' ),
                'desc'  => __( 'This is an info field with the <strong>info</strong> style applied. By default the <strong>normal</strong> style is applied.', 'ThuongDQ' )
            ),
            array(
                'id'    => 'opt-info-warning',
                'type'  => 'info',
                'style' => 'warning',
                'title' => __( 'This is a title.', 'ThuongDQ' ),
                'desc'  => __( 'This is an info field with the <strong>warning</strong> style applied.', 'ThuongDQ' )
            ),
            array(
                'id'    => 'opt-info-success',
                'type'  => 'info',
                'style' => 'success',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'ThuongDQ' ),
                'desc'  => __( 'This is an info field with the <strong>success</strong> style applied and an icon.', 'ThuongDQ' )
            ),
            array(
                'id'    => 'opt-info-critical',
                'type'  => 'info',
                'style' => 'critical',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'ThuongDQ' ),
                'desc'  => __( 'This is an info field with the <strong>critical</strong> style applied and an icon.', 'ThuongDQ' )
            ),
            array(
                'id'    => 'opt-info-custom',
                'type'  => 'info',
                'style' => 'custom',
                'color' => 'purple',
                'icon'  => 'el el-info-circle',
                'title' => __( 'This is a title.', 'ThuongDQ' ),
                'desc'  => __( 'This is an info field with the <strong>custom</strong> style applied, color arg passed, and an icon.', 'ThuongDQ' )
            ),
            array(
                'id'     => 'opt-info-normal',
                'type'   => 'info',
                'notice' => false,
                'title'  => __( 'This is a title.', 'ThuongDQ' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>normal</strong> style applied.', 'ThuongDQ' )
            ),
            array(
                'id'     => 'opt-notice-info',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'info',
                'title'  => __( 'This is a title.', 'ThuongDQ' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>info</strong> style applied.', 'ThuongDQ' )
            ),
            array(
                'id'     => 'opt-notice-warning',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'warning',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'ThuongDQ' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>warning</strong> style applied and an icon.', 'ThuongDQ' )
            ),
            array(
                'id'     => 'opt-notice-success',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'success',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'ThuongDQ' ),
                'desc'   => __( 'This is an info non-notice field with the <strong>success</strong> style applied and an icon.', 'ThuongDQ' )
            ),
            array(
                'id'     => 'opt-notice-critical',
                'type'   => 'info',
                'notice' => false,
                'style'  => 'critical',
                'icon'   => 'el el-info-circle',
                'title'  => __( 'This is a title.', 'ThuongDQ' ),
                'desc'   => __( 'This is an non-notice field with the <strong>critical</strong> style applied and an icon.', 'ThuongDQ' )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Section', 'ThuongDQ' ),
        'id'         => 'presentation-section',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/section/" target="_blank">docs.reduxframework.com/core/fields/section/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'section-start',
                'type'     => 'section',
                'title'    => __( 'Section Example', 'ThuongDQ' ),
                'subtitle' => __( 'With the "section" field you can create indented option sections.', 'ThuongDQ' ),
                'indent'   => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'section-test',
                'type'     => 'text',
                'title'    => __( 'Field Title', 'ThuongDQ' ),
                'subtitle' => __( 'Field Subtitle', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'section-test-media',
                'type'     => 'media',
                'title'    => __( 'Field Title', 'ThuongDQ' ),
                'subtitle' => __( 'Field Subtitle', 'ThuongDQ' ),
            ),
            array(
                'id'     => 'section-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'   => 'section-info',
                'type' => 'info',
                'desc' => __( 'And now you can add more fields below and outside of the indent.', 'ThuongDQ' ),
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'id'   => 'presentation-divide-sample',
        'type' => 'divide',
    ) );

    // -> START Switch & Button Set
    Redux::setSection( $opt_name, array(
        'title' => __( 'Switch & Button Set', 'ThuongDQ' ),
        'id'    => 'switch_buttonset',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-cogs'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Button Set', 'ThuongDQ' ),
        'id'         => 'switch_buttonset-set',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/button-set/" target="_blank">docs.reduxframework.com/core/fields/button-set/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-button-set',
                'type'     => 'button_set',
                'title'    => __( 'Button Set Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-button-set-multi',
                'type'     => 'button_set',
                'title'    => __( 'Button Set, Multi Select', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'multi'    => true,
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'  => array( '2', '3' )
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Switch', 'ThuongDQ' ),
        'id'         => 'switch_buttonset-switch',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/switch/" target="_blank">docs.reduxframework.com/core/fields/switch/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'switch-on',
                'type'     => 'switch',
                'title'    => __( 'Switch On', 'ThuongDQ' ),
                'subtitle' => __( 'Look, it\'s on!', 'ThuongDQ' ),
                'default'  => true,
            ),
            array(
                'id'       => 'switch-off',
                'type'     => 'switch',
                'title'    => __( 'Switch Off', 'ThuongDQ' ),
                'subtitle' => __( 'Look, it\'s on!', 'ThuongDQ' ),
                //'options' => array('on', 'off'),
                'default'  => false,
            ),
            array(
                'id'       => 'switch-parent',
                'type'     => 'switch',
                'title'    => __( 'Switch - Nested Children, Enable to show', 'ThuongDQ' ),
                'subtitle' => __( 'Look, it\'s on! Also hidden child elements!', 'ThuongDQ' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'switch-child1',
                'type'     => 'switch',
                'required' => array( 'switch-parent', '=', '1' ),
                'title'    => __( 'Switch - This and the next switch required for patterns to show', 'ThuongDQ' ),
                'subtitle' => __( 'Also called a "fold" parent.', 'ThuongDQ' ),
                'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'ThuongDQ' ),
                'default'  => false,
            ),
            array(
                'id'       => 'switch-child2',
                'type'     => 'switch',
                'required' => array( 'switch-parent', '=', '1' ),
                'title'    => __( 'Switch2 - Enable the above switch and this one for patterns to show', 'ThuongDQ' ),
                'subtitle' => __( 'Also called a "fold" parent.', 'ThuongDQ' ),
                'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'ThuongDQ' ),
                'default'  => false,
            ),
        )
    ) );

    // -> START Select Fields
    Redux::setSection( $opt_name, array(
        'title' => __( 'Select Fields', 'ThuongDQ' ),
        'id'    => 'select',
        'icon'  => 'el el-list-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Select', 'ThuongDQ' ),
        'id'         => 'select-select',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/select/" target="_blank">docs.reduxframework.com/core/fields/select/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-select',
                'type'     => 'select',
                'title'    => __( 'Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-select-stylesheet',
                'type'     => 'select',
                'title'    => __( 'Theme Stylesheet', 'ThuongDQ' ),
                'subtitle' => __( 'Select your themes alternative color scheme.', 'ThuongDQ' ),
                'options'  => array( 'default.css' => 'default.css', 'color1.css' => 'color1.css' ),
                'default'  => 'default.css',
            ),
            array(
                'id'       => 'opt-select-optgroup',
                'type'     => 'select',
                'title'    => __( 'Select Option with optgroup', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    'Group 1' => array(
                        '1' => 'Opt 1',
                        '2' => 'Opt 2',
                        '3' => 'Opt 3',
                    ),
                    'Group 2' => array(
                        '4' => 'Opt 4',
                        '5' => 'Opt 5',
                        '6' => 'Opt 6',
                    ),
                    '7'       => 'Opt 7',
                    '8'       => 'Opt 8',
                    '9'       => 'Opt 9',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-multi-select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => __( 'Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                //'required' => array( 'opt-select', 'equals', array( '1', '3' ) ),
                'default'  => array( '2', '3' )
            ),
            array(
                'id'       => 'opt-select-image',
                'type'     => 'select_image',
                'title'    => __( 'Select Image', 'ThuongDQ' ),
                'subtitle' => __( 'A preview of the selected image will appear underneath the select box.', 'ThuongDQ' ),
                'options'  => $sample_patterns,
                // Alternatively
                //'options'   => Array(
                //                'img_name' => 'img_path'
                //             )
                'default'  => 'tree_bark.png',
            ),
            array(
                'id'   => 'opt-info',
                'type' => 'info',
                'desc' => __( 'You can easily add a variety of data from WordPress.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-categories',
                'type'     => 'select',
                'data'     => 'categories',
                'title'    => __( 'Categories Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-categories-multi',
                'type'     => 'select',
                'data'     => 'categories',
                'multi'    => true,
                'title'    => __( 'Categories Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-pages',
                'type'     => 'select',
                'data'     => 'pages',
                'title'    => __( 'Pages Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-pages',
                'type'     => 'select',
                'data'     => 'pages',
                'multi'    => true,
                'title'    => __( 'Pages Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-tags',
                'type'     => 'select',
                'data'     => 'tags',
                'title'    => __( 'Tags Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-tags',
                'type'     => 'select',
                'data'     => 'tags',
                'multi'    => true,
                'title'    => __( 'Tags Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-menus',
                'type'     => 'select',
                'data'     => 'menus',
                'title'    => __( 'Menus Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-menus',
                'type'     => 'select',
                'data'     => 'menu',
                'multi'    => true,
                'title'    => __( 'Menus Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-post-type',
                'type'     => 'select',
                'data'     => 'post_type',
                'title'    => __( 'Post Type Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-post-type',
                'type'     => 'select',
                'data'     => 'post_type',
                'multi'    => true,
                'title'    => __( 'Post Type Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-sortable',
                'type'     => 'select',
                'data'     => 'post_type',
                'multi'    => true,
                'sortable' => true,
                'title'    => __( 'Post Type Multi Select Option + Sortable', 'ThuongDQ' ),
                'subtitle' => __( 'This field also has sortable enabled!', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-posts',
                'type'     => 'select',
                'data'     => 'post',
                'title'    => __( 'Posts Select Option2', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-multi-select-posts',
                'type'     => 'select',
                'data'     => 'post',
                'multi'    => true,
                'title'    => __( 'Posts Multi Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-roles',
                'type'     => 'select',
                'data'     => 'roles',
                'title'    => __( 'User Role Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-capabilities',
                'type'     => 'select',
                'data'     => 'capabilities',
                'multi'    => true,
                'title'    => __( 'Capabilities Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-elusive',
                'type'     => 'select',
                'data'     => 'elusive-icons',
                'title'    => __( 'Elusive Icons Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'Here\'s a list of all the elusive icons by name and icon.', 'ThuongDQ' ),
            ),
            array(
                'id'       => 'opt-select-users',
                'type'     => 'select',
                'data'     => 'users',
                'title'    => __( 'Users Select Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Image Select', 'ThuongDQ' ),
        'id'         => 'select-image_select',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/image-select/" target="_blank">docs.reduxframework.com/core/fields/image-select/</a>',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-image-select-layout',
                'type'     => 'image_select',
                'title'    => __( 'Images Option for Layout', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This uses some of the built in images, you can use them for layout options.', 'ThuongDQ' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array(
                        'alt' => '1 Column',
                        'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                    ),
                    '2' => array(
                        'alt' => '2 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                    ),
                    '3' => array(
                        'alt' => '2 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                    ),
                    '4' => array(
                        'alt' => '3 Column Middle',
                        'img' => ReduxFramework::$_url . 'assets/img/3cm.png'
                    ),
                    '5' => array(
                        'alt' => '3 Column Left',
                        'img' => ReduxFramework::$_url . 'assets/img/3cl.png'
                    ),
                    '6' => array(
                        'alt' => '3 Column Right',
                        'img' => ReduxFramework::$_url . 'assets/img/3cr.png'
                    )
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'opt-patterns',
                'type'     => 'image_select',
                'tiles'    => true,
                'title'    => __( 'Images Option (with tiles => true)', 'ThuongDQ' ),
                'subtitle' => __( 'Select a background pattern.', 'ThuongDQ' ),
                'default'  => 0,
                'options'  => $sample_patterns
                ,
            ),
            array(
                'id'       => 'opt-image-select',
                'type'     => 'image_select',
                'title'    => __( 'Images Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                //Must provide key => value(array:title|img) pairs for radio options
                'options'  => array(
                    '1' => array( 'title' => 'Opt 1', 'img' => 'images/align-none.png' ),
                    '2' => array( 'title' => 'Opt 2', 'img' => 'images/align-left.png' ),
                    '3' => array( 'title' => 'Opt 3', 'img' => 'images/align-center.png' ),
                    '4' => array( 'title' => 'Opt 4', 'img' => 'images/align-right.png' )
                ),
                'default'  => '2'
            ),
            array(
                'id'         => 'opt-presets',
                'type'       => 'image_select',
                'presets'    => true,
                'full_width' => true,
                'title'      => __( 'Preset', 'ThuongDQ' ),
                'subtitle'   => __( 'This allows you to set a json string or array to override multiple preferences in your theme.', 'ThuongDQ' ),
                'default'    => 0,
                'desc'       => __( 'This allows you to set a json string or array to override multiple preferences in your theme.', 'ThuongDQ' ),
                'options'    => array(
                    '1' => array(
                        'alt'     => 'Preset 1',
                        'img'     => ReduxFramework::$_url . '../sample/presets/preset1.png',
                        'presets' => array(
                            'switch-on'     => 1,
                            'switch-off'    => 1,
                            'switch-parent' => 1
                        )
                    ),
                    '2' => array(
                        'alt'     => 'Preset 2',
                        'img'     => ReduxFramework::$_url . '../sample/presets/preset2.png',
                        'presets' => '{"opt-slider-label":"1", "opt-slider-text":"10"}'
                    ),
                ),
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Select Image', 'ThuongDQ' ),
        'id'         => 'select-select_image',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/select-image/" target="_blank">docs.reduxframework.com/core/fields/select-image/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'opt-select_image',
                'type'    => 'select_image',
                'presets' => true,
                'title'   => __( 'Select Image', 'ThuongDQ' ),
                'default' => 0,
                'options' => array(
                    '1' => array(
                        'alt' => 'Preset 1',
                        'img' => ReduxFramework::$_url . '../sample/presets/preset1.png',
                    ),
                    '2' => array(
                        'alt' => 'Preset 2',
                        'img' => ReduxFramework::$_url . '../sample/presets/preset2.png',
                    ),
                ),
            ),
        )
    ) );

    // -> START Slider / Spinner
    Redux::setSection( $opt_name, array(
        'title' => __( 'Slider / Spinner', 'ThuongDQ' ),
        'id'    => 'slider_spinner',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-adjust-alt'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Slider', 'ThuongDQ' ),
        'id'         => 'slider_spinner-slider',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/slider/" target="_blank">docs.reduxframework.com/core/fields/slider/</a>',
        'fields'     => array(

            array(
                'id'            => 'opt-slider-label',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 1', 'ThuongDQ' ),
                'subtitle'      => __( 'This slider displays the value as a label.', 'ThuongDQ' ),
                'desc'          => __( 'Slider description. Min: 1, max: 500, step: 1, default value: 250', 'ThuongDQ' ),
                'default'       => 250,
                'min'           => 1,
                'step'          => 1,
                'max'           => 500,
                'display_value' => 'label'
            ),
            array(
                'id'            => 'opt-slider-text',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 2 with Steps (5)', 'ThuongDQ' ),
                'subtitle'      => __( 'This example displays the value in a text box', 'ThuongDQ' ),
                'desc'          => __( 'Slider description. Min: 0, max: 300, step: 5, default value: 75', 'ThuongDQ' ),
                'default'       => 75,
                'min'           => 0,
                'step'          => 5,
                'max'           => 300,
                'display_value' => 'text'
            ),
            array(
                'id'            => 'opt-slider-select',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 3 with two sliders', 'ThuongDQ' ),
                'subtitle'      => __( 'This example displays the values in select boxes', 'ThuongDQ' ),
                'desc'          => __( 'Slider description. Min: 0, max: 500, step: 5, slider 1 default value: 100, slider 2 default value: 300', 'ThuongDQ' ),
                'default'       => array(
                    1 => 100,
                    2 => 300,
                ),
                'min'           => 0,
                'step'          => 5,
                'max'           => '500',
                'display_value' => 'select',
                'handles'       => 2,
            ),
            array(
                'id'            => 'opt-slider-float',
                'type'          => 'slider',
                'title'         => __( 'Slider Example 4 with float values', 'ThuongDQ' ),
                'subtitle'      => __( 'This example displays float values', 'ThuongDQ' ),
                'desc'          => __( 'Slider description. Min: 0, max: 1, step: .1, default value: .5', 'ThuongDQ' ),
                'default'       => .5,
                'min'           => 0,
                'step'          => .1,
                'max'           => 1,
                'resolution'    => 0.1,
                'display_value' => 'text'
            ),

        ),
        'subsection' => true,
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Spinner', 'ThuongDQ' ),
        'id'         => 'slider_spinner-spinner',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/spinner/" target="_blank">docs.reduxframework.com/core/fields/spinner/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'      => 'opt-spinner',
                'type'    => 'spinner',
                'title'   => __( 'JQuery UI Spinner Example 1', 'ThuongDQ' ),
                'desc'    => __( 'JQuery UI spinner description. Min:20, max: 100, step:20, default value: 40', 'ThuongDQ' ),
                'default' => '40',
                'min'     => '20',
                'step'    => '20',
                'max'     => '100',
            ),
        )
    ) );

    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'ThuongDQ' ),
        'id'     => 'typography',
        'desc'   => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/typography/" target="_blank">docs.reduxframework.com/core/fields/typography/</a>',
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'ThuongDQ' ),
                'subtitle' => __( 'Specify the body font properties.', 'ThuongDQ' ),
                'google'   => true,
                'default'  => array(
                    'color'       => '#dd9933',
                    'font-size'   => '30px',
                    'font-family' => 'Arial,Helvetica,sans-serif',
                    'font-weight' => 'Normal',
                ),
            ),
            array(
                'id'          => 'opt-typography',
                'type'        => 'typography',
                'title'       => __( 'Typography h2.site-description', 'ThuongDQ' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => true,
                // Select a backup non-google font in addition to a google font
                //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                //'subsets'       => false, // Only appears if google is true and subsets not set to false
                //'font-size'     => false,
                //'line-height'   => false,
                //'word-spacing'  => true,  // Defaults to false
                //'letter-spacing'=> true,  // Defaults to false
                //'color'         => false,
                //'preview'       => false, // Disable the previewer
                'all_styles'  => true,
                // Enable all Google Font style/weight variations to be added to the page
                'output'      => array( 'h2.site-description, .entry-title' ),
                // An array of CSS selectors to apply this font style to dynamically
                'compiler'    => array( 'h2.site-description-compiler' ),
                // An array of CSS selectors to apply this font style to dynamically
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'ThuongDQ' ),
                'default'     => array(
                    'color'       => '#333',
                    'font-style'  => '700',
                    'font-family' => 'Abel',
                    'google'      => true,
                    'font-size'   => '33px',
                    'line-height' => '40px'
                ),
            ),
        )
    ) );

    // -> START Additional Types
    Redux::setSection( $opt_name, array(
        'title' => __( 'Additional Types', 'ThuongDQ' ),
        'id'    => 'additional',
        'desc'  => __( '', 'ThuongDQ' ),
        'icon'  => 'el el-magic',
        //'fields' => array(
        //    array(
        //        'id'              => 'opt-customizer-only-in-section',
        //        'type'            => 'select',
        //        'title'           => __( 'Customizer Only Option', 'ThuongDQ' ),
        //        'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'ThuongDQ' ),
        //        'desc'            => __( 'The field desc is NOT visible in customizer.', 'ThuongDQ' ),
        //        'customizer_only' => true,
        //        //Must provide key => value pairs for select options
        //        'options'         => array(
        //            '1' => 'Opt 1',
        //            '2' => 'Opt 2',
        //            '3' => 'Opt 3'
        //        ),
        //        'default'         => '2'
        //    ),
        //)
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Date', 'ThuongDQ' ),
        'id'         => 'additional-date',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/date/" target="_blank">docs.reduxframework.com/core/fields/date/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-datepicker',
                'type'     => 'date',
                'title'    => __( 'Date Option', 'ThuongDQ' ),
                'subtitle' => __( 'No validation can be done on this field type', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' )
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sorter', 'ThuongDQ' ),
        'id'         => 'additional-sorter',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/sorter/" target="_blank">docs.reduxframework.com/core/fields/sorter/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-homepage-layout',
                'type'     => 'sorter',
                'title'    => 'Layout Manager Advanced',
                'subtitle' => 'You can add multiple drop areas or columns.',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'highlights' => 'Highlights',
                        'slider'     => 'Slider',
                        'staticpage' => 'Static Page',
                        'services'   => 'Services'
                    ),
                    'disabled' => array(),
                    'backup'   => array(),
                ),
                'limits'   => array(
                    'disabled' => 1,
                    'backup'   => 2,
                ),
            ),
            array(
                'id'       => 'opt-homepage-layout-2',
                'type'     => 'sorter',
                'title'    => 'Homepage Layout Manager',
                'desc'     => 'Organize how you want the layout to appear on the homepage',
                'compiler' => 'true',
                'options'  => array(
                    'disabled' => array(
                        'highlights' => 'Highlights',
                        'slider'     => 'Slider',
                    ),
                    'enabled'  => array(
                        'staticpage' => 'Static Page',
                        'services'   => 'Services'
                    ),
                ),
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Raw', 'ThuongDQ' ),
        'id'         => 'additional-raw',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/raw/" target="_blank">docs.reduxframework.com/core/fields/raw/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-raw_info_4',
                'type'     => 'raw',
                'title'    => __( 'Standard Raw Field', 'ThuongDQ' ),
                'subtitle' => __( 'Subtitle', 'ThuongDQ' ),
                'desc'     => __( 'Description', 'ThuongDQ' ),
                'content'  => $sampleHTML,
            ),
            array(
                'id'         => 'opt-raw_info_5',
                'type'       => 'raw',
                'full_width' => false,
                'title'      => __( 'Raw Field <code>full_width</code> False', 'ThuongDQ' ),
                'subtitle'   => __( 'Subtitle', 'ThuongDQ' ),
                'desc'       => __( 'Description', 'ThuongDQ' ),
                'content'    => $sampleHTML,
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Advanced Features', 'ThuongDQ' ),
        'icon'  => 'el el-thumbs-up',
        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Callback', 'ThuongDQ' ),
        'id'         => 'additional-callback',
        'desc'       => __( 'For full documentation on this field, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/fields/callback/" target="_blank">docs.reduxframework.com/core/fields/callback/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-custom-callback',
                'type'     => 'callback',
                'title'    => __( 'Custom Field Callback', 'ThuongDQ' ),
                'subtitle' => __( 'This is a completely unique field type', 'ThuongDQ' ),
                'desc'     => __( 'This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'ThuongDQ' ),
                'callback' => 'redux_my_custom_field'
            ),
        )
    ) );

    // -> START Validation
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Field Validation', 'ThuongDQ' ),
        'id'         => 'validation',
        'desc'       => __( 'For full documentation on validation, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/the-basics/validation/" target="_blank">docs.reduxframework.com/core/the-basics/validation/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-text-email',
                'type'     => 'text',
                'title'    => __( 'Text Option - Email Validated', 'ThuongDQ' ),
                'subtitle' => __( 'This is a little space under the Field Title in the Options table, additional info is good in here.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'email',
                'msg'      => 'custom error message',
                'default'  => 'test@test.com',
            ),
            array(
                'id'       => 'opt-text-post-type',
                'type'     => 'text',
                'title'    => __( 'Text Option with Data Attributes', 'ThuongDQ' ),
                'subtitle' => __( 'You can also pass an options array if you want. Set the default to whatever you like.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'data'     => 'post_type',
            ),
            array(
                'id'       => 'opt-multi-text',
                'type'     => 'multi_text',
                'title'    => __( 'Multi Text Option - Color Validated', 'ThuongDQ' ),
                'validate' => 'color',
                'subtitle' => __( 'If you enter an invalid color it will be removed. Try using the text "blue" as a color.  ;)', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' )
            ),
            array(
                'id'       => 'opt-text-url',
                'type'     => 'text',
                'title'    => __( 'Text Option - URL Validated', 'ThuongDQ' ),
                'subtitle' => __( 'This must be a URL.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'url',
                'default'  => 'http://reduxframework.com',
            ),
            array(
                'id'       => 'opt-text-numeric',
                'type'     => 'text',
                'title'    => __( 'Text Option - Numeric Validated', 'ThuongDQ' ),
                'subtitle' => __( 'This must be numeric.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'opt-text-comma-numeric',
                'type'     => 'text',
                'title'    => __( 'Text Option - Comma Numeric Validated', 'ThuongDQ' ),
                'subtitle' => __( 'This must be a comma separated string of numerical values.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'comma_numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'opt-text-no-special-chars',
                'type'     => 'text',
                'title'    => __( 'Text Option - No Special Chars Validated', 'ThuongDQ' ),
                'subtitle' => __( 'This must be a alpha numeric only.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'no_special_chars',
                'default'  => '0'
            ),
            array(
                'id'       => 'opt-text-str_replace',
                'type'     => 'text',
                'title'    => __( 'Text Option - Str Replace Validated', 'ThuongDQ' ),
                'subtitle' => __( 'You decide.', 'ThuongDQ' ),
                'desc'     => __( 'This field\'s default value was changed by a filter hook!', 'ThuongDQ' ),
                'validate' => 'str_replace',
                'str'      => array(
                    'search'      => ' ',
                    'replacement' => 'thisisaspace'
                ),
                'default'  => 'This is the default.'
            ),
            array(
                'id'       => 'opt-text-preg_replace',
                'type'     => 'text',
                'title'    => __( 'Text Option - Preg Replace Validated', 'ThuongDQ' ),
                'subtitle' => __( 'You decide.', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'preg_replace',
                'preg'     => array(
                    'pattern'     => '/[^a-zA-Z_ -]/s',
                    'replacement' => 'no numbers'
                ),
                'default'  => '0'
            ),
            array(
                'id'                => 'opt-text-custom_validate',
                'type'              => 'text',
                'title'             => __( 'Text Option - Custom Callback Validated', 'ThuongDQ' ),
                'subtitle'          => __( 'You decide.', 'ThuongDQ' ),
                'desc'              => __( 'Enter <code>1</code> and click <strong>Save Changes</strong> for an error message, or enter <code>2</code> and click <strong>Save Changes</strong> for a warning message.', 'ThuongDQ' ),
                'validate_callback' => 'redux_validate_callback_function',
                'default'           => '0'
            ),
            //array(
            //    'id'                => 'opt-text-custom_validate-class',
            //    'type'              => 'text',
            //    'title'             => __( 'Text Option - Custom Callback Validated - Class', 'ThuongDQ' ),
            //    'subtitle'          => __( 'You decide.', 'ThuongDQ' ),
            //    'desc'              => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
            //    'validate_callback' => array( 'Class_Name', 'validate_callback_function' ),
            //    // You can pass the current class
            //    // Or pass the class name and method
            //    //'validate_callback' => array(
            //    //    'Redux_Framework_sample_config',
            //    //    'validate_callback_function'
            //    //),
            //    'default'           => '0'
            //),
            array(
                'id'       => 'opt-textarea-no-html',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - No HTML Validated', 'ThuongDQ' ),
                'subtitle' => __( 'All HTML will be stripped', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'no_html',
                'default'  => 'No HTML is allowed in here.'
            ),
            array(
                'id'       => 'opt-textarea-html',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - HTML Validated', 'ThuongDQ' ),
                'subtitle' => __( 'HTML Allowed (wp_kses)', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
                'default'  => 'HTML is allowed in here.'
            ),
            array(
                'id'           => 'opt-textarea-some-html',
                'type'         => 'textarea',
                'title'        => __( 'Textarea Option - HTML Validated Custom', 'ThuongDQ' ),
                'subtitle'     => __( 'Custom HTML Allowed (wp_kses)', 'ThuongDQ' ),
                'desc'         => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate'     => 'html_custom',
                'default'      => '<p>Some HTML is allowed in here.</p>',
                'allowed_html' => array(
                    'a'      => array(
                        'href'  => array(),
                        'title' => array()
                    ),
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array()
                ) //see http://codex.wordpress.org/Function_Reference/wp_kses
            ),
            array(
                'id'       => 'opt-textarea-js',
                'type'     => 'textarea',
                'title'    => __( 'Textarea Option - JS Validated', 'ThuongDQ' ),
                'subtitle' => __( 'JS will be escaped', 'ThuongDQ' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'ThuongDQ' ),
                'validate' => 'js'
            ),
        )
    ) );

    // -> START Required
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Field Required / Linking', 'ThuongDQ' ),
        'id'         => 'required',
        'desc'       => __( 'For full documentation on validation, visit: ', 'ThuongDQ' ) . '<a href="//docs.reduxframework.com/core/the-basics/required/" target="_blank">docs.reduxframework.com/core/the-basics/required/</a>',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-required-basic',
                'type'     => 'switch',
                'title'    => 'Basic Required Example',
                'subtitle' => 'Click <code>On</code> to see the text field appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-basic-text',
                'type'     => 'text',
                'title'    => 'Basic Text Field',
                'subtitle' => 'This text field is only show when the above switch is set to <code>On</code>, using the <code>required</code> argument.',
                'required' => array( 'opt-required-basic', '=', true )
            ),
            array(
                'id'   => 'opt-required-divide-1',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-nested',
                'type'     => 'switch',
                'title'    => 'Nested Required Example',
                'subtitle' => 'Click <code>On</code> to see another set of options appear.',
                'default'  => false
            ),
            array(
                'id'       => 'opt-required-nested-buttonset',
                'type'     => 'button_set',
                'title'    => 'Multiple Nested Required Examples',
                'subtitle' => 'Click any buton to show different fields based on their <code>required</code> statements.',
                'options'  => array(
                    'button-text'     => 'Show Text Field',
                    'button-textarea' => 'Show Textarea Field',
                    'button-editor'   => 'Show WP Editor',
                    'button-ace'      => 'Show ACE Editor'
                ),
                'required' => array( 'opt-required-nested', '=', true ),
                'default'  => 'button-text'
            ),
            array(
                'id'       => 'opt-required-nested-text',
                'type'     => 'text',
                'title'    => 'Nested Text Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-text' )
            ),
            array(
                'id'       => 'opt-required-nested-textarea',
                'type'     => 'textarea',
                'title'    => 'Nested Textarea Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-textarea' )
            ),
            array(
                'id'       => 'opt-required-nested-editor',
                'type'     => 'editor',
                'title'    => 'Nested Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-editor' )
            ),
            array(
                'id'       => 'opt-required-nested-ace',
                'type'     => 'ace_editor',
                'title'    => 'Nested ACE Editor Field',
                'required' => array( 'opt-required-nested-buttonset', '=', 'button-ace' )
            ),
            array(
                'id'   => 'opt-required-divide-2',
                'type' => 'divide'
            ),
            array(
                'id'       => 'opt-required-select',
                'type'     => 'select',
                'title'    => 'Select Required Example',
                'subtitle' => 'Select a different option to display its value.  Required may be used to display multiple & reusable fields',
                'options'  => array(
                    'no-sidebar'    => 'No Sidebars',
                    'left-sidebar'  => 'Left Sidebar',
                    'right-sidebar' => 'Right Sidebar',
                    'both-sidebars' => 'Both Sidebars'
                ),
                'default'  => 'no-sidebar',
                'select2'  => array( 'allowClear' => false )
            ),
            array(
                'id'       => 'opt-required-select-left-sidebar',
                'type'     => 'select',
                'title'    => 'Select Left Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'left-sidebar', 'both-sidebars' ) )
            ),
            array(
                'id'       => 'opt-required-select-right-sidebar',
                'type'     => 'select',
                'title'    => 'Select Right Sidebar',
                'data'     => 'sidebars',
                'default'  => '',
                'required' => array( 'opt-required-select', '=', array( 'right-sidebar', 'both-sidebars' ) )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'WPML Integration', 'ThuongDQ' ),
        'desc'       => __( 'These fields can be fully translated by WPML (WordPress Multi-Language). This serves as an example for you to implement. For extra details look at our <a href="//docs.reduxframework.com/core/advanced/wpml-integration/" target="_blank">WPML Implementation</a> documentation.', 'ThuongDQ' ),
        'subsection' => true,
        // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields'     => array(
            array(
                'id'    => 'wpml-text',
                'type'  => 'textarea',
                'title' => __( 'WPML Text', 'ThuongDQ' ),
                'desc'  => __( 'This string can be translated via WPML.', 'ThuongDQ' ),
            ),
            array(
                'id'      => 'wpml-multicheck',
                'type'    => 'checkbox',
                'title'   => __( 'WPML Multi Checkbox', 'ThuongDQ' ),
                'desc'    => __( 'You can literally translate the values via key.', 'ThuongDQ' ),
                //Must provide key => value pairs for multi checkbox options
                'options' => array(
                    '1' => 'Option 1',
                    '2' => 'Option 2',
                    '3' => 'Option 3'
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'ThuongDQ' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'ThuongDQ' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'ThuongDQ' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'ThuongDQ' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'ThuongDQ' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'ThuongDQ' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'ThuongDQ' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'ThuongDQ' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }


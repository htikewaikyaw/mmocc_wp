<?php
/**
 * Describe child theme functions
 *
 * @package Construction Light
 * @subpackage Construction Agency
 * 
 */

 if ( ! function_exists( 'constructions_agency_setup' ) ) :

    function constructions_agency_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Construction Agency, use a find and replace
		* to change 'constructions-agency' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'constructions-agency', get_template_directory() . '/languages' );

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
        
        $constructions_agency_theme_info = wp_get_theme();
        $GLOBALS['constructions_agency_version'] = $constructions_agency_theme_info->get( 'Version' );

		add_theme_support( "title-tag" );
		add_theme_support( 'automatic-feed-links' );
    }
endif;
add_action( 'after_setup_theme', 'constructions_agency_setup' );


/**
 * Enqueue child theme styles and scripts
*/
function constructions_agency_scripts() {
    
    global $constructions_agency_version;

    wp_dequeue_style( 'construction-light-style' );
    
    wp_enqueue_style( 'construction-agency-parent-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'style.css', array(), esc_attr( $constructions_agency_version ) );
    
    wp_enqueue_style( 'construction-agency-responsive', get_template_directory_uri(). '/assets/css/responsive.css');
    
    wp_enqueue_style( 'construction-agency-style', get_stylesheet_uri(), esc_attr( $constructions_agency_version ) );

    wp_enqueue_script('constructions-agency', get_stylesheet_directory_uri() . '/js/construction-agency.js', array('jquery','masonry'), esc_attr( $constructions_agency_version ), true);

}
add_action( 'wp_enqueue_scripts', 'constructions_agency_scripts', 20 );

function constructions_agency_css_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}

/**
 * Dynamic Style
 */
add_filter( 'construction-light-dynamic-css', 'constructions_agency_dymanic_styles', 100 );
function constructions_agency_dymanic_styles($dynamic_css) {
    
    $services_bg = get_theme_mod('construction_light_service_image');
 
    $primar_color = get_theme_mod('construction_light_primary_color');
	if($primar_color){
		
		$dynamic_css .= "
		.box-header-nav .main-menu .page_item.current-page-item a, .box-header-nav .main-menu>.menu-item.current-menu-item >a,
		.site-header:not(.headertwo) .nav-classic .site-branding h1 a,
		.cons_light_feature.layout_four .feature-list .icon-box{
			color: {$primar_color};
		}
		";
	}
	
	wp_add_inline_style( 'construction-agency-style', constructions_agency_css_strip_whitespace($dynamic_css) );

}
/** modify customizer */
if ( ! function_exists( 'constructions_agency_child_options' ) ) {

    function constructions_agency_child_options( $wp_customize ) {
		$wp_customize->remove_control('construction_light_quick_info_hide_mobile');
		
		$wp_customize->get_control('construction_light_service_layout')->choices = array(
			'layout_one'  => esc_html__('Layout One', 'constructions-agency'),
			'layout_two'  =>esc_html__('Layout Two', 'constructions-agency'),
			'layout_three'  =>esc_html__('Layout Three', 'constructions-agency'),
			'layout_four'  =>esc_html__('Layout Four', 'constructions-agency'),
		);
		
		$wp_customize->get_control('construction_light_team_layout')->choices = array(
			'layout_one' => esc_html__('Layout One', 'constructions-agency'),
			'layout_two' => esc_html__('Layout Two', 'constructions-agency'),
			'layout_three' => esc_html__('Layout Three', 'constructions-agency'),
		);


		/** contact section */
		$wp_customize->add_section('construction_light_contact_section', array(
			'title' => esc_html__('Contact Section', 'constructions-agency'),
			'panel' => 'construction_light_frontpage_settings',
			'priority' => construction_light_get_section_position('construction_light_contact_section') or 100,
			'hiding_control' => 'construction_light_contact_section_disable'
		));

		//ENABLE/DISABLE SERVICE SECTION
		$wp_customize->add_setting('construction_light_contact_section_disable', array(
			'sanitize_callback' => 'sanitize_text_field',
			'transport' => 'postMessage',
			'default' => 'disable'
		));

		$wp_customize->add_control(new Construction_Light_Switch_Control($wp_customize, 'construction_light_contact_section_disable', array(
			'section' => 'construction_light_contact_section',
			'label' => esc_html__('Enable Section ', 'constructions-agency'),
			'switch_label' => array(
				'enable' => esc_html__('Yes', 'constructions-agency'),
				'disable' => esc_html__('No', 'constructions-agency'),
			),
			'class' => 'switch-section',
			'priority' => -1
		)));

		// Section Title.
		$wp_customize->add_setting( 'construction_light_contact_title', array(
			'sanitize_callback' => 'sanitize_text_field', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('construction_light_contact_title', array(
			'label'		=> esc_html__( 'Enter Section Title', 'constructions-agency' ),
			'section'	=> 'construction_light_contact_section',
			'type'      => 'text'
		));

		//Section Sub Title.
		$wp_customize->add_setting( 'construction_light_contact_sub_title', array(
			'sanitize_callback' => 'sanitize_text_field',			//done
			'transport' => 'postMessage'
		) );

		$wp_customize->add_control( 'construction_light_contact_sub_title', array(
			'label'    => esc_html__( 'Enter Section Sub Title', 'constructions-agency' ),
			'section'  => 'construction_light_contact_section',
			'type'     => 'text',
		));

		$wp_customize->add_setting('construction_light_contact_quick_link', array(
			'sanitize_callback' => 'sanitize_text_field'
		));
		$wp_customize->add_control(new ConstructionAgencyInfoText($wp_customize, 'construction_light_contact_quick_link', array(
			'label' => esc_html__('Contact Info', 'constructions-agency'),
			'section' => 'construction_light_contact_section',
			'description' => sprintf(esc_html__('Add your %s here, content is comes from top header quick info', 'constructions-agency'), '<a href="?autofocus[section]=construction_light_top_header" target="_blank">Contact Info</a>')
		)));

		$wp_customize->add_setting( 'construction_light_contact_shortcode', array(
			'sanitize_callback' => 'construction_light_sanitize_text', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('construction_light_contact_shortcode', array(
			'label'		=> esc_html__( 'Contact Form Shortcode', 'constructions-agency' ),
			'section'	=> 'construction_light_contact_section',
			'type'      => 'text'
		));

		$wp_customize->add_setting( 'construction_light_contact_map', array(
			'sanitize_callback' => 'construction_light_sanitize_text', 	 //done	
			'transport' => 'postMessage'
		));

		$wp_customize->add_control('construction_light_contact_map', array(
			'label'		=> esc_html__( 'Enter Map Iframe', 'constructions-agency' ),
			'section'	=> 'construction_light_contact_section',
			'type'      => 'textarea'
		));

		$wp_customize->selective_refresh->add_partial('construction_light_contact_title', array(
			'selector' => '#cl-contact-section .section-title',
			'container_inclusive' => true
		));

		$wp_customize->selective_refresh->add_partial('construction_light_contact_shortcode', array(
			'selector' => '#cl-contact-section .contact-and-map-section',
			'container_inclusive' => true
		));

		$wp_customize->selective_refresh->add_partial( 'construction_light_contact_refresh', array (
			'settings' => array( 
				'construction_light_contact_section_disable',
				'construction_light_contact_title',
				'construction_light_contact_sub_title',
				'construction_light_contact_shortcode',
				'construction_light_contact_map',
		
			),
			'selector' => '#cl-contact-section',
			'fallback_refresh' => false,
			'container_inclusive' => true,
			'render_callback' => function () {
				return get_template_part( 'section/section-contact' );
			}
		));


    }
}
add_action( 'customize_register' , 'constructions_agency_child_options', 11 );

/** include files */
require get_stylesheet_directory() . '/inc/theme-functions.php';

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'ConstructionAgencyInfoText' ) ) :
    /**
     * Info Text Control
     */
    class ConstructionAgencyInfoText extends WP_Customize_Control {
        public function render_content() {
            ?>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>
            <?php if ($this->description) { ?>
                <span class="customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php
            }
        }
    }
endif;

if( !function_exists('constructions_agency_allow_iframes')):
	function constructions_agency_allow_iframes( $allowedposttags ){

		$allowedposttags['iframe'] = array(
			'align' => true,
			'allow' => true,
			'allowfullscreen' => true,
			'class' => true,
			'frameborder' => true,
			'height' => true,
			'id' => true,
			'marginheight' => true,
			'marginwidth' => true,
			'name' => true,
			'scrolling' => true,
			'src' => true,
			'style' => true,
			'width' => true,
			'allowFullScreen' => true,
			'class' => true,
			'frameborder' => true,
			'height' => true,
			'mozallowfullscreen' => true,
			'src' => true,
			'title' => true,
			'webkitAllowFullScreen' => true,
			'width' => true
		);

		return $allowedposttags;
	}
	add_filter( 'wp_kses_allowed_html', 'constructions_agency_allow_iframes', 1 );
endif;


/*********add featured custom fields for projects**************/
// add new columns
add_filter( 'manage_post_posts_columns', 'featured_columns' );
// the above hook will add columns only for default 'post' post type, for CPT:
// manage_{POST TYPE NAME}_posts_columns
function featured_columns( $column_array ) {
	$column_array[ 'featured' ] = 'Featured';
	return $column_array;
}

// Populate our new columns with data
add_action( 'manage_posts_custom_column', 'populate_featured_column', 10, 2 );

function populate_featured_column( $column_name, $post_id ) {
	if($column_name == "featured"){
		echo get_post_meta( $post_id, '_wp_post_meta_feature', true ) ? "feature" :"";
	}
}

add_action( 'admin_print_scripts', function() {
    echo <<<'EOT'
		<script type="text/javascript">
		jQuery(function($){
		   	const wp_inline_edit_function = inlineEditPost.edit;

			// we overwrite the it with our own
			inlineEditPost.edit = function( post_id ) {

				// let's merge arguments of the original function
				wp_inline_edit_function.apply( this, arguments );

				// get the post ID from the argument
				if ( typeof( post_id ) == 'object' ) { // if it is object, get the ID number
					post_id = parseInt( this.getId( post_id ) );
				}

				if ( post_id > 0 ) {
		            // define the edit row
		            var $edit_row = $( '#edit-' + post_id );
		            var $post_row = $( '#post-' + post_id );
		            // get the data
		            var $feature = !! $( '.column-featured', $post_row ).text();
		            // populate the data
		            $( ':input[name="meta-box-checkbox"]', $edit_row ).prop('checked', $feature );
		        }
				
			}
		});
		</script>
EOT;
}, PHP_INT_MAX );

// add custom meta box in post by hwk 
function add_custom_meta_box() {
    $screens = [ 'post' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'box_id',                 // Unique ID
            'Featured',      // Box title
            'custom_meta_box_html',  // Content callback, must be of type callable
            $screen                            // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'add_custom_meta_box' );
function custom_meta_box_html( $post ) {
	$value = get_post_meta( $post->ID, '_wp_post_meta_feature', true );
	?>
    <input name="meta-box-checkbox" type="checkbox" value="true" <?php checked( 'true',$value ); ?>>
    <label for="meta-box-checkbox">Feature</label>

	
    <?php
}
//save meta-box-checkbox value
function save_checkbox_postdata( $post_id ) {
    if ( array_key_exists( 'meta-box-checkbox', $_POST ) ) {
		// print_r($_POST['meta-box-checkbox']);exit;
        update_post_meta(
            $post_id,
            '_wp_post_meta_feature',
            $_POST['meta-box-checkbox']
        );
    }else{
    	update_post_meta(
            $post_id,
            '_wp_post_meta_feature',
            false
        );
    }
}
add_action( 'save_post', 'save_checkbox_postdata' );

// show meta-box-checkbox in quick edit mode.
add_action( 'quick_edit_custom_box',  'featured_quick_edit_field', 12, 2 );

function featured_quick_edit_field( $column_name,$post_id) {
	if($column_name == "featured"){
	?>
	<fieldset class="inline-edit-col-left">
		<label class="alignleft inline-edit-feature">
			<input id = "chk" name="meta-box-checkbox" classs = "feature-checkbox" type="checkbox" value="true" <?php checked('true',$value) ?>>
			<span class="checkbox-title">Feature</span>
		</label>
	</fieldset>
<?php
	}
}


//pull strings  of data made by customizer to be translated
if ( function_exists( 'pll_register_string' ) ) :
	/**
	* Register some string from the customizer to be translated with Polylang
	*/
	
	function construction_agency_pll_register_string() {
		pll_register_string( 'construction_light_service_advance', get_theme_mod( 'construction_light_service_advance' ), 'Construction Light', true );

	}
	add_action( 'after_setup_theme', 'construction_agency_pll_register_string' );
endif;



/**
 * starter content
 */
require get_stylesheet_directory() .'/inc/starter-content/init.php';


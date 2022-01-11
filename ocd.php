<?php 
/**
 * Plugin Name: Olismix Custome Dashboard
 * Plugin URI: http://olismix.com
 * Description: olismix Custome Dashboard
 * Version: 1.0
 * Author: Olismix
 * Author URI: http://olismix.com
 */

//acf library



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'ACF' ) ) :

	class ACF {

		/** @var string The plugin version number. */
		var $version = '5.11.4';

		/** @var array The plugin settings array. */
		var $settings = array();

		/** @var array The plugin data array. */
		var $data = array();

		/** @var array Storage for class instances. */
		var $instances = array();

		/**
		 * __construct
		 *
		 * A dummy constructor to ensure ACF is only setup once.
		 *
		 * @date    23/06/12
		 * @since   5.0.0
		 *
		 * @param   void
		 * @return  void
		 */
		function __construct() {
			// Do nothing.
		}

		/**
		 * initialize
		 *
		 * Sets up the ACF plugin.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   void
		 * @return  void
		 */
		function initialize() {

			// Define constants.
			$this->define( 'ACF', true );
			$this->define( 'ACF_PATH', plugin_dir_path( __FILE__ ) );
			$this->define( 'ACF_BASENAME', plugin_basename( __FILE__ ) );
			$this->define( 'ACF_VERSION', $this->version );
			$this->define( 'ACF_MAJOR_VERSION', 5 );

			// Define settings.
			$this->settings = array(
				'name'                   => __( 'Advanced Custom Fields', 'acf' ),
				'slug'                   => dirname( ACF_BASENAME ),
				'version'                => ACF_VERSION,
				'basename'               => ACF_BASENAME,
				'path'                   => ACF_PATH,
				'file'                   => __FILE__,
				'url'                    => plugin_dir_url( __FILE__ ),
				'show_admin'             => true,
				'show_updates'           => true,
				'stripslashes'           => false,
				'local'                  => true,
				'json'                   => true,
				'save_json'              => '',
				'load_json'              => array(),
				'default_language'       => '',
				'current_language'       => '',
				'capability'             => 'manage_options',
				'uploader'               => 'wp',
				'autoload'               => false,
				'l10n'                   => true,
				'l10n_textdomain'        => '',
				'google_api_key'         => '',
				'google_api_client'      => '',
				'enqueue_google_maps'    => true,
				'enqueue_select2'        => true,
				'enqueue_datepicker'     => true,
				'enqueue_datetimepicker' => true,
				'select2_version'        => 4,
				'row_index_offset'       => 1,
				'remove_wp_meta_box'     => true,
				'rest_api_enabled'       => true,
				'rest_api_format'        => 'light',
				'rest_api_embed_links'   => true,
			);

			// Include utility functions.
			include_once ACF_PATH . 'includes/acf-utility-functions.php';

			// Include previous API functions.
			acf_include( 'includes/api/api-helpers.php' );
			acf_include( 'includes/api/api-template.php' );
			acf_include( 'includes/api/api-term.php' );

			// Include classes.
			acf_include( 'includes/class-acf-data.php' );
			acf_include( 'includes/fields/class-acf-field.php' );
			acf_include( 'includes/locations/abstract-acf-legacy-location.php' );
			acf_include( 'includes/locations/abstract-acf-location.php' );

			// Include functions.
			acf_include( 'includes/acf-helper-functions.php' );
			acf_include( 'includes/acf-hook-functions.php' );
			acf_include( 'includes/acf-field-functions.php' );
			acf_include( 'includes/acf-field-group-functions.php' );
			acf_include( 'includes/acf-form-functions.php' );
			acf_include( 'includes/acf-meta-functions.php' );
			acf_include( 'includes/acf-post-functions.php' );
			acf_include( 'includes/acf-user-functions.php' );
			acf_include( 'includes/acf-value-functions.php' );
			acf_include( 'includes/acf-input-functions.php' );
			acf_include( 'includes/acf-wp-functions.php' );

			// Include core.
			acf_include( 'includes/fields.php' );
			acf_include( 'includes/locations.php' );
			acf_include( 'includes/assets.php' );
			acf_include( 'includes/compatibility.php' );
			acf_include( 'includes/deprecated.php' );
			acf_include( 'includes/l10n.php' );
			acf_include( 'includes/local-fields.php' );
			acf_include( 'includes/local-meta.php' );
			acf_include( 'includes/local-json.php' );
			acf_include( 'includes/loop.php' );
			acf_include( 'includes/media.php' );
			acf_include( 'includes/revisions.php' );
			acf_include( 'includes/updates.php' );
			acf_include( 'includes/upgrades.php' );
			acf_include( 'includes/validation.php' );
			acf_include( 'includes/rest-api.php' );

			// Include ajax.
			acf_include( 'includes/ajax/class-acf-ajax.php' );
			acf_include( 'includes/ajax/class-acf-ajax-check-screen.php' );
			acf_include( 'includes/ajax/class-acf-ajax-user-setting.php' );
			acf_include( 'includes/ajax/class-acf-ajax-upgrade.php' );
			acf_include( 'includes/ajax/class-acf-ajax-query.php' );
			acf_include( 'includes/ajax/class-acf-ajax-query-users.php' );
			acf_include( 'includes/ajax/class-acf-ajax-local-json-diff.php' );

			// Include forms.
			acf_include( 'includes/forms/form-attachment.php' );
			acf_include( 'includes/forms/form-comment.php' );
			acf_include( 'includes/forms/form-customizer.php' );
			acf_include( 'includes/forms/form-front.php' );
			acf_include( 'includes/forms/form-nav-menu.php' );
			acf_include( 'includes/forms/form-post.php' );
			acf_include( 'includes/forms/form-gutenberg.php' );
			acf_include( 'includes/forms/form-taxonomy.php' );
			acf_include( 'includes/forms/form-user.php' );
			acf_include( 'includes/forms/form-widget.php' );

			// Include admin.
			if ( is_admin() ) {
				acf_include( 'includes/admin/admin.php' );
				acf_include( 'includes/admin/admin-field-group.php' );
				acf_include( 'includes/admin/admin-field-groups.php' );
				acf_include( 'includes/admin/admin-notices.php' );
				acf_include( 'includes/admin/admin-tools.php' );
				acf_include( 'includes/admin/admin-upgrade.php' );
			}

			// Include legacy.
			acf_include( 'includes/legacy/legacy-locations.php' );

			// Include PRO.
			acf_include( 'pro/acf-pro.php' );

			// Include tests.
			if ( defined( 'ACF_DEV' ) && ACF_DEV ) {
				acf_include( 'tests/tests.php' );
			}

			// Add actions.
			add_action( 'init', array( $this, 'init' ), 5 );
			add_action( 'init', array( $this, 'register_post_types' ), 5 );
			add_action( 'init', array( $this, 'register_post_status' ), 5 );

			// Add filters.
			add_filter( 'posts_where', array( $this, 'posts_where' ), 10, 2 );
		}

		/**
		 * init
		 *
		 * Completes the setup process on "init" of earlier.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   void
		 * @return  void
		 */
		function init() {

			// Bail early if called directly from functions.php or plugin file.
			if ( ! did_action( 'plugins_loaded' ) ) {
				return;
			}

			// This function may be called directly from template functions. Bail early if already did this.
			if ( acf_did( 'init' ) ) {
				return;
			}

			// Update url setting. Allows other plugins to modify the URL (force SSL).
			acf_update_setting( 'url', plugin_dir_url( __FILE__ ) );

			// Load textdomain file.
			acf_load_textdomain();

			// Include 3rd party compatiblity.
			acf_include( 'includes/third-party.php' );

			// Include wpml support.
			if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
				acf_include( 'includes/wpml.php' );
			}

			// Include fields.
			acf_include( 'includes/fields/class-acf-field-text.php' );
			acf_include( 'includes/fields/class-acf-field-textarea.php' );
			acf_include( 'includes/fields/class-acf-field-number.php' );
			acf_include( 'includes/fields/class-acf-field-range.php' );
			acf_include( 'includes/fields/class-acf-field-email.php' );
			acf_include( 'includes/fields/class-acf-field-url.php' );
			acf_include( 'includes/fields/class-acf-field-password.php' );
			acf_include( 'includes/fields/class-acf-field-image.php' );
			acf_include( 'includes/fields/class-acf-field-file.php' );
			acf_include( 'includes/fields/class-acf-field-wysiwyg.php' );
			acf_include( 'includes/fields/class-acf-field-oembed.php' );
			acf_include( 'includes/fields/class-acf-field-select.php' );
			acf_include( 'includes/fields/class-acf-field-checkbox.php' );
			acf_include( 'includes/fields/class-acf-field-radio.php' );
			acf_include( 'includes/fields/class-acf-field-button-group.php' );
			acf_include( 'includes/fields/class-acf-field-true_false.php' );
			acf_include( 'includes/fields/class-acf-field-link.php' );
			acf_include( 'includes/fields/class-acf-field-post_object.php' );
			acf_include( 'includes/fields/class-acf-field-page_link.php' );
			acf_include( 'includes/fields/class-acf-field-relationship.php' );
			acf_include( 'includes/fields/class-acf-field-taxonomy.php' );
			acf_include( 'includes/fields/class-acf-field-user.php' );
			acf_include( 'includes/fields/class-acf-field-google-map.php' );
			acf_include( 'includes/fields/class-acf-field-date_picker.php' );
			acf_include( 'includes/fields/class-acf-field-date_time_picker.php' );
			acf_include( 'includes/fields/class-acf-field-time_picker.php' );
			acf_include( 'includes/fields/class-acf-field-color_picker.php' );
			acf_include( 'includes/fields/class-acf-field-message.php' );
			acf_include( 'includes/fields/class-acf-field-accordion.php' );
			acf_include( 'includes/fields/class-acf-field-tab.php' );
			acf_include( 'includes/fields/class-acf-field-group.php' );

			/**
			 * Fires after field types have been included.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int $major_version The major version of ACF.
			 */
			do_action( 'acf/include_field_types', ACF_MAJOR_VERSION );

			// Include locations.
			acf_include( 'includes/locations/class-acf-location-post-type.php' );
			acf_include( 'includes/locations/class-acf-location-post-template.php' );
			acf_include( 'includes/locations/class-acf-location-post-status.php' );
			acf_include( 'includes/locations/class-acf-location-post-format.php' );
			acf_include( 'includes/locations/class-acf-location-post-category.php' );
			acf_include( 'includes/locations/class-acf-location-post-taxonomy.php' );
			acf_include( 'includes/locations/class-acf-location-post.php' );
			acf_include( 'includes/locations/class-acf-location-page-template.php' );
			acf_include( 'includes/locations/class-acf-location-page-type.php' );
			acf_include( 'includes/locations/class-acf-location-page-parent.php' );
			acf_include( 'includes/locations/class-acf-location-page.php' );
			acf_include( 'includes/locations/class-acf-location-current-user.php' );
			acf_include( 'includes/locations/class-acf-location-current-user-role.php' );
			acf_include( 'includes/locations/class-acf-location-user-form.php' );
			acf_include( 'includes/locations/class-acf-location-user-role.php' );
			acf_include( 'includes/locations/class-acf-location-taxonomy.php' );
			acf_include( 'includes/locations/class-acf-location-attachment.php' );
			acf_include( 'includes/locations/class-acf-location-comment.php' );
			acf_include( 'includes/locations/class-acf-location-widget.php' );
			acf_include( 'includes/locations/class-acf-location-nav-menu.php' );
			acf_include( 'includes/locations/class-acf-location-nav-menu-item.php' );

			/**
			 * Fires after location types have been included.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int $major_version The major version of ACF.
			 */
			do_action( 'acf/include_location_rules', ACF_MAJOR_VERSION );

			/**
			 * Fires during initialization. Used to add local fields.
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int $major_version The major version of ACF.
			 */
			do_action( 'acf/include_fields', ACF_MAJOR_VERSION );

			/**
			 * Fires after ACF is completely "initialized".
			 *
			 * @date    28/09/13
			 * @since   5.0.0
			 *
			 * @param   int $major_version The major version of ACF.
			 */
			do_action( 'acf/init', ACF_MAJOR_VERSION );
		}

		/**
		 * register_post_types
		 *
		 * Registers the ACF post types.
		 *
		 * @date    22/10/2015
		 * @since   5.3.2
		 *
		 * @param   void
		 * @return  void
		 */
		function register_post_types() {

			// Vars.
			$cap = acf_get_setting( 'capability' );

			// Register the Field Group post type.
			register_post_type(
				'acf-field-group',
				array(
					'labels'          => array(
						'name'               => __( 'Field Groups', 'acf' ),
						'singular_name'      => __( 'Field Group', 'acf' ),
						'add_new'            => __( 'Add New', 'acf' ),
						'add_new_item'       => __( 'Add New Field Group', 'acf' ),
						'edit_item'          => __( 'Edit Field Group', 'acf' ),
						'new_item'           => __( 'New Field Group', 'acf' ),
						'view_item'          => __( 'View Field Group', 'acf' ),
						'search_items'       => __( 'Search Field Groups', 'acf' ),
						'not_found'          => __( 'No Field Groups found', 'acf' ),
						'not_found_in_trash' => __( 'No Field Groups found in Trash', 'acf' ),
					),
					'public'          => false,
					'hierarchical'    => true,
					'show_ui'         => true,
					'show_in_menu'    => false,
					'_builtin'        => false,
					'capability_type' => 'post',
					'capabilities'    => array(
						'edit_post'    => $cap,
						'delete_post'  => $cap,
						'edit_posts'   => $cap,
						'delete_posts' => $cap,
					),
					'supports'        => array( 'title' ),
					'rewrite'         => false,
					'query_var'       => false,
				)
			);

			// Register the Field post type.
			register_post_type(
				'acf-field',
				array(
					'labels'          => array(
						'name'               => __( 'Fields', 'acf' ),
						'singular_name'      => __( 'Field', 'acf' ),
						'add_new'            => __( 'Add New', 'acf' ),
						'add_new_item'       => __( 'Add New Field', 'acf' ),
						'edit_item'          => __( 'Edit Field', 'acf' ),
						'new_item'           => __( 'New Field', 'acf' ),
						'view_item'          => __( 'View Field', 'acf' ),
						'search_items'       => __( 'Search Fields', 'acf' ),
						'not_found'          => __( 'No Fields found', 'acf' ),
						'not_found_in_trash' => __( 'No Fields found in Trash', 'acf' ),
					),
					'public'          => false,
					'hierarchical'    => true,
					'show_ui'         => false,
					'show_in_menu'    => false,
					'_builtin'        => false,
					'capability_type' => 'post',
					'capabilities'    => array(
						'edit_post'    => $cap,
						'delete_post'  => $cap,
						'edit_posts'   => $cap,
						'delete_posts' => $cap,
					),
					'supports'        => array( 'title' ),
					'rewrite'         => false,
					'query_var'       => false,
				)
			);
		}

		/**
		 * register_post_status
		 *
		 * Registers the ACF post statuses.
		 *
		 * @date    22/10/2015
		 * @since   5.3.2
		 *
		 * @param   void
		 * @return  void
		 */
		function register_post_status() {

			// Register the Disabled post status.
			register_post_status(
				'acf-disabled',
				array(
					'label'                     => _x( 'Disabled', 'post status', 'acf' ),
					'public'                    => true,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop( 'Disabled <span class="count">(%s)</span>', 'Disabled <span class="count">(%s)</span>', 'acf' ),
				)
			);
		}

		/**
		 * posts_where
		 *
		 * Filters the $where clause allowing for custom WP_Query args.
		 *
		 * @date    31/8/19
		 * @since   5.8.1
		 *
		 * @param   string $where The WHERE clause.
		 * @return  WP_Query $wp_query The query object.
		 */
		function posts_where( $where, $wp_query ) {
			global $wpdb;

			// Add custom "acf_field_key" arg.
			if ( $field_key = $wp_query->get( 'acf_field_key' ) ) {
				$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_name = %s", $field_key );
			}

			// Add custom "acf_field_name" arg.
			if ( $field_name = $wp_query->get( 'acf_field_name' ) ) {
				$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_excerpt = %s", $field_name );
			}

			// Add custom "acf_group_key" arg.
			if ( $group_key = $wp_query->get( 'acf_group_key' ) ) {
				$where .= $wpdb->prepare( " AND {$wpdb->posts}.post_name = %s", $group_key );
			}

			// Return.
			return $where;
		}

		/**
		 * define
		 *
		 * Defines a constant if doesnt already exist.
		 *
		 * @date    3/5/17
		 * @since   5.5.13
		 *
		 * @param   string $name The constant name.
		 * @param   mixed  $value The constant value.
		 * @return  void
		 */
		function define( $name, $value = true ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}

		/**
		 * has_setting
		 *
		 * Returns true if a setting exists for this name.
		 *
		 * @date    2/2/18
		 * @since   5.6.5
		 *
		 * @param   string $name The setting name.
		 * @return  boolean
		 */
		function has_setting( $name ) {
			return isset( $this->settings[ $name ] );
		}

		/**
		 * get_setting
		 *
		 * Returns a setting or null if doesn't exist.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The setting name.
		 * @return  mixed
		 */
		function get_setting( $name ) {
			return isset( $this->settings[ $name ] ) ? $this->settings[ $name ] : null;
		}

		/**
		 * update_setting
		 *
		 * Updates a setting for the given name and value.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The setting name.
		 * @param   mixed  $value The setting value.
		 * @return  true
		 */
		function update_setting( $name, $value ) {
			$this->settings[ $name ] = $value;
			return true;
		}

		/**
		 * get_data
		 *
		 * Returns data or null if doesn't exist.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The data name.
		 * @return  mixed
		 */
		function get_data( $name ) {
			return isset( $this->data[ $name ] ) ? $this->data[ $name ] : null;
		}

		/**
		 * set_data
		 *
		 * Sets data for the given name and value.
		 *
		 * @date    28/09/13
		 * @since   5.0.0
		 *
		 * @param   string $name The data name.
		 * @param   mixed  $value The data value.
		 * @return  void
		 */
		function set_data( $name, $value ) {
			$this->data[ $name ] = $value;
		}

		/**
		 * get_instance
		 *
		 * Returns an instance or null if doesn't exist.
		 *
		 * @date    13/2/18
		 * @since   5.6.9
		 *
		 * @param   string $class The instance class name.
		 * @return  object
		 */
		function get_instance( $class ) {
			$name = strtolower( $class );
			return isset( $this->instances[ $name ] ) ? $this->instances[ $name ] : null;
		}

		/**
		 * new_instance
		 *
		 * Creates and stores an instance of the given class.
		 *
		 * @date    13/2/18
		 * @since   5.6.9
		 *
		 * @param   string $class The instance class name.
		 * @return  object
		 */
		function new_instance( $class ) {
			$instance                 = new $class();
			$name                     = strtolower( $class );
			$this->instances[ $name ] = $instance;
			return $instance;
		}

		/**
		 * Magic __isset method for backwards compatibility.
		 *
		 * @date    24/4/20
		 * @since   5.9.0
		 *
		 * @param   string $key Key name.
		 * @return  bool
		 */
		public function __isset( $key ) {
			return in_array( $key, array( 'locations', 'json' ) );
		}

		/**
		 * Magic __get method for backwards compatibility.
		 *
		 * @date    24/4/20
		 * @since   5.9.0
		 *
		 * @param   string $key Key name.
		 * @return  mixed
		 */
		public function __get( $key ) {
			switch ( $key ) {
				case 'locations':
					return acf_get_instance( 'ACF_Legacy_Locations' );
				case 'json':
					return acf_get_instance( 'ACF_Local_JSON' );
			}
			return null;
		}
	}

	/*
	* acf
	*
	* The main function responsible for returning the one true acf Instance to functions everywhere.
	* Use this function like you would a global variable, except without needing to declare the global.
	*
	* Example: <?php $acf = acf(); ?>
	*
	* @date    4/09/13
	* @since   4.3.0
	*
	* @param   void
	* @return  ACF
	*/
	function acf() {
		global $acf;

		// Instantiate only once.
		if ( ! isset( $acf ) ) {
			$acf = new ACF();
			$acf->initialize();
		}
		return $acf;
	}

	// Instantiate.
	acf();

endif; // class_exists check




//ocd library
session_start();
function wpdocs_remove_menus(){
    if ( have_rows( 'identitas_website', 'option' ) ) : 
        while ( have_rows( 'identitas_website', 'option' ) ) : the_row();
    if ( have_rows( 'setting_basic_menu' ) ) :
    while ( have_rows( 'setting_basic_menu' ) ) : the_row();
	if(get_sub_field( 'dashboard' ) == "Hide"){
    remove_menu_page( 'index.php' );          
    }
    if(get_sub_field( 'jetpack' ) == "Hide"){
	remove_menu_page( 'jetpack' );
    }                    
    if(get_sub_field( 'posts' ) == "Hide"){
    remove_menu_page( 'edit.php' );            
    }       
    if(get_sub_field( 'media' ) == "Hide"){
    remove_menu_page( 'upload.php' );          
    }
    if(get_sub_field( 'pages' ) == "Hide"){       
	remove_menu_page( 'edit.php?post_type=page' );
    }
    if(get_sub_field( 'comments' ) == "Hide"){    
	remove_menu_page( 'edit-comments.php' );   
    }
    if(get_sub_field( 'appearance' ) == "Hide"){       
	remove_menu_page( 'themes.php' );          
    }
    if(get_sub_field( 'plugins' ) == "Hide"){      
	remove_menu_page( 'plugins.php' );         
    }
    if(get_sub_field( 'users' ) == "Hide"){       
	remove_menu_page( 'users.php' );           
    }
    if(get_sub_field( 'tools' ) == "Hide"){       
	remove_menu_page( 'tools.php' );           
    }
    if(get_sub_field( 'settings' ) == "Hide"){       
    remove_menu_page( 'options-general.php' ); 
    }
    if(get_sub_field( 'acf' ) == "Hide"){       
	remove_menu_page( 'edit.php?post_type=acf-field-group' );
    }
    endwhile; endif;
    endwhile; endif;
  }
  add_action( 'admin_menu', 'wpdocs_remove_menus' );

 

  function dashboard_redirect(){
    wp_redirect(admin_url('admin.php?page=dashboard-setting'));
}
add_action('load-index.php','dashboard_redirect');

function my_login_page_remove_back_to_link() { ?>
<?php if ( have_rows( 'identitas_website', 'option' ) ) : ?>
    <?php while ( have_rows( 'identitas_website', 'option' ) ) : the_row(); ?>
    <style type="text/css">
body.login.js.login-action-login.wp-core-ui.locale-en-us {
        background-color: #111 !important;
		background-image: url("<?php the_sub_field( 'background_login' ); ?>") !important;
		background-size: cover;
}

.login form {
    background-color: #00000000 !important;
    color: #fff !important;
    border: none !important;
    box-shadow: unset !important;
}

form#loginform > p, form#loginform > .user-pass-wrap {
    background: #0000005e;
    margin-bottom: 20px;
    padding: 10px 30px;
    margin-top: 20px;
    border-radius: 35px;
}

.login .button.wp-hide-pw {
    border-color: unset !important;
    box-shadow: unset;
    outline: 2px solid transparent;
    color: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
}

p.forgetmenot {
    display: none;
}

p.submit {
    width: 100%;
}

p.submit input {
    width: 100%;
    padding: 10px 30px !important;
    font-size: 20px !important;
    font-weight: 900;
    border-radius: 32px !important;
}

.wp-core-ui .button-primary {
    background: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
    min-width: 120px;
    border-color: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
    color: <?php the_sub_field( 'dashboard_color_text_menu' ); ?> !important;
    text-decoration: none;
    text-shadow: none;
}

.wp-core-ui .button-primary:hover {
    background: <?php the_sub_field( 'dashboard_color_text_menu' ); ?> !important;
    min-width: 120px;
    border-color: <?php the_sub_field( 'dashboard_color_text_menu' ); ?> !important;
    color: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
    text-decoration: none;
    text-shadow: none;
}

a {
    color: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
    transition-property: border,background,color;
    transition-duration: .05s;
    transition-timing-function: ease-in-out;
}
.login #login_error, .login .message, .login .success {
    border-left: <?php the_sub_field( 'dashboard_color_primary' ); ?> !important;
    padding: 12px;
    margin-left: 0;
    color: #fff !important;
    margin-bottom: 20px;
    background-color: #0000005c !important;
    box-shadow: 0 1px 1px 0 rgb(0 0 0 / 10%);
}

div#login_error {
    width: 228px;
    margin: auto !important;
    padding: 20px !important;
    border-radius: 16px;
}

p#nav {
    display: none;
}

p#backtoblog {
    display: none;
}

    </style>
    <?php endwhile; ?>
<?php endif; ?>
<?php }

 //Do Not Remove This Function
add_action( 'login_enqueue_scripts', 'my_login_page_remove_back_to_link' );

function my_login_logo() { ?>
    <?php if ( have_rows( 'identitas_website', 'option' ) ) : ?>
    <?php while ( have_rows( 'identitas_website', 'option' ) ) : the_row(); ?>
    <style type="text/css">
    #login h1 a, .login h1 a {
    background-image: url(<?php the_sub_field( 'logo_website' ); ?>) !important;
    height: 100px;
    width: 100%;
    background-size: 100%;
    background-repeat: no-repeat;
    padding-bottom: 30px;
    transform: scale(1.25);
}
    </style>
<?php endwhile; ?>
<?php endif; ?>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );


if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => 'Dashboard Setting',
        'menu_title' => 'Dashboard Setting',
        'menu_slug' => 'dashboard-setting',
        'capability' => 'edit_posts',
        'icon_url' => 'dashicons-welcome-widgets-menus', // Add this line and replace the second inverted commas with class of the icon you like
        'position' => 1
	));
	
}




add_action('admin_head', 'my_custom_style');
function my_custom_style() {
     if ( have_rows( 'identitas_website', 'option' ) ) : 
    while ( have_rows( 'identitas_website', 'option' ) ) : the_row(); 
        
  echo '<style>
    
  #adminmenu, #adminmenuback, #adminmenuwrap {
    background: '.get_sub_field( 'dashboard_color_secondery' ).';
}

#adminmenu li.current a.menu-top {
    color: #fff;
    background: '.get_sub_field( 'dashboard_color_primary' ).';
}

#adminmenu li.wp-not-current-submenu:hover a.menu-top {
    color: #fff;
    background: '.get_sub_field( 'dashboard_color_primary' ).';
}

#adminmenu a {
    color: '.get_sub_field( 'dashboard_color_text_menu' ).' !important;
}
#adminmenu div.wp-menu-image:before {
    color: '.get_sub_field( 'dashboard_color_text_menu' ).' !important;
}

#collapse-button {
    color: '.get_sub_field( 'dashboard_color_text_menu' ).' !important ;
}

#wpadminbar .ab-item, #wpadminbar a.ab-item{
    color: '.get_sub_field( 'dashboard_color_text_menu' ).' !important ;
}

#wpadminbar .ab-item:before {
    color: '.get_sub_field( 'dashboard_color_text_menu' ).' !important ;
}

#adminmenu .wp-has-current-submenu .wp-submenu, #adminmenu .wp-has-current-submenu.opensub .wp-submenu, #adminmenu .wp-submenu, #adminmenu a.wp-has-current-submenu:focus+.wp-submenu {
    background: '.get_sub_field( 'dashboard_color_primary' ).';
}

li#wp-admin-bar-updates {
    display: none;
}

li#wp-admin-bar-comments {
    display: none;
}

li#wp-admin-bar-new-content {
    display: none;
}

#wpadminbar {
    color: #fff;
    background: '.get_sub_field( 'dashboard_color_primary' ).';
}

div#screen-meta-links {
    display: none;
}

#adminmenu li.current a.menu-top, #adminmenu li.wp-has-current-submenu .wp-submenu .wp-submenu-head, #adminmenu li.wp-has-current-submenu a.wp-has-current-submenu, .folded #adminmenu li.current.menu-top {
    color: #fff;
    background: '.get_sub_field( 'dashboard_color_primary' ).';
}

.wp-core-ui .button-primary {
    background: '.get_sub_field( 'dashboard_color_primary' ).';
    border-color: '.get_sub_field( 'dashboard_color_primary' ).';
    color: '.get_sub_field( 'dashboard_color_text_menu' ).';
}

.wp-core-ui .button-primary:hover {
    background: '.get_sub_field( 'dashboard_color_text_menu' ).';
    border-color: '.get_sub_field( 'dashboard_color_text_menu' ).';
    color: '.get_sub_field( 'dashboard_color_primary' ).';
}

.acf-button-group label.selected {
    border-color: #000;
    background: '.get_sub_field( 'dashboard_color_primary' ).';
    color: '.get_sub_field( 'dashboard_color_text_menu' ).';
    z-index: 2;
}

p#footer-left {
    display: none;
}

p#footer-upgrade {
    display: none;
}

  </style>';
  endwhile;
 endif;
}
function wpb_custom_logo() {
    if ( have_rows( 'identitas_website', 'option' ) ) : 
        while ( have_rows( 'identitas_website', 'option' ) ) : the_row();  
    echo '
    <style type="text/css">
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
    background-image: url('.get_sub_field( 'favicon' ).') !important;
    background-position: 0 0;
    color:rgba(0, 0, 0, 0);
    width: 100%;
    height: 100%;
    background-size: 100%;
    }
    #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
    background-position: 0 0;
    }
    </style>
    ';
endwhile;
endif;
    }
     
    //hook into the administrative header output
    add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

    function favicon4admin() {
        if ( have_rows( 'identitas_website', 'option' ) ) : 
            while ( have_rows( 'identitas_website', 'option' ) ) : the_row();

        echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_sub_field( 'favicon' ).'" />';
    endwhile;
endif;
  
    }
        add_action( 'admin_head', 'favicon4admin' );
    

        add_filter('admin_title', 'my_admin_title', 10, 2);

        function my_admin_title($admin_title, $title)
        {
                if ( have_rows( 'identitas_website', 'option' ) ) :
                while ( have_rows( 'identitas_website', 'option' ) ) : the_row();      
                $webname = get_sub_field( 'title_website' ) . " | " . get_sub_field( 'tagline_website' ) ;
                endwhile; endif;
                return $webname;
        }

        add_filter('bloginfo_url', 'custom_get_bloginfo', 10, 2);
add_filter('bloginfo', 'custom_get_bloginfo', 10, 2);

function custom_get_bloginfo($output, $show) {
    if ( have_rows( 'identitas_website', 'option' ) ) :
        while ( have_rows( 'identitas_website', 'option' ) ) : the_row();
    switch( $show ) {
        case 'description':
            $output = get_sub_field( 'tagline_website' );
            break;
        case 'name':
            $output = get_sub_field( 'title_website' ) . " | ";
            break;
    }
    endwhile; endif;
    return $output;
}

function add_acf_option_page() {
     if ( have_rows( 'menu', 'option' ) ) : 
         while ( have_rows( 'menu', 'option' ) ) : the_row(); 

         if(get_sub_field( 'type_menu' ) == "Single Page"){
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(array(
            'page_title' => get_sub_field( 'title_menu' ),
            'menu_title' => get_sub_field( 'title_menu' ),
            'menu_slug' => strtolower(str_replace(" ","-",get_sub_field( 'title_menu' ))),
            'capability' => 'edit_posts',
            'icon_url' => get_sub_field( 'icon_menu' ), // Add this line and replace the second inverted commas with class of the icon you like
            'position' => 1
        ));
    }
}
endwhile; endif;
}

add_action('acf/init', 'add_acf_option_page' );


function wpdocs_codex_init() {
     $nogrup = 1;
	 $datacolum = array();
    if ( have_rows( 'menu', 'option' ) ) : 
        while ( have_rows( 'menu', 'option' ) ) : the_row(); 

        if(get_sub_field( 'type_menu' ) == "Post Page"){
            
            $slugpage = strtolower(str_replace(" ","-",get_sub_field( 'title_menu' )));

    register_post_type( $slugpage , array(
        'labels'             => array(
            'name'                  => _x( get_sub_field( 'title_menu' ), 'Post type general name', 'textdomain' ),
            'singular_name'         => _x( get_sub_field( 'title_menu' ), 'Post type singular name', 'textdomain' ),
            'menu_name'             => _x( get_sub_field( 'title_menu' ), 'Admin Menu text', 'textdomain' ),
            'name_admin_bar'        => _x( get_sub_field( 'title_menu' ), 'Add New on Toolbar', 'textdomain' ),
            'add_new'               => __( 'Tambah baru', 'textdomain' ),
            'add_new_item'          => __( 'Tambah baru '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'new_item'              => __( get_sub_field( 'title_menu' ).'baru', 'textdomain' ),
            'edit_item'             => __( 'Ubah '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'view_item'             => __( 'Lihat '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'all_items'             => __( 'Semua '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'search_items'          => __( 'Pencarian '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'parent_item_colon'     => __( 'Master '.get_sub_field( 'title_menu' ), 'textdomain' ),
            'not_found'             => __( get_sub_field( 'title_menu' ).' tidak tersedia.', 'textdomain' ),
            'not_found_in_trash'    => __( get_sub_field( 'title_menu' ).' tidak tersedia di keranjang sampah.', 'textdomain' ),
            'featured_image'        => _x( 'Sampul '.get_sub_field( 'title_menu' ), 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set Sampul Foto', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Hapus Sampul foto', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Gunakan Sampul Foto', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Berkas '.get_sub_field( 'title_menu' ), 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => _x( 'Masukan '.get_sub_field( 'title_menu' ), 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( get_sub_field( 'title_menu' ).' Terupload disini', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter '.get_sub_field( 'title_menu' ).' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Daftar Navigasi '.get_sub_field( 'title_menu' ), 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Daftar '.get_sub_field( 'title_menu' ), 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        ),
        'menu_icon'          => get_sub_field( 'icon_menu' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $slugpage  ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 4,
        'supports'           => array( 'title' ),
        'taxonomies'          => array( 'category' ),
    ) );

}



if(get_sub_field( 'type_menu' ) == "Single Page"){

	$slugpage = strtolower(str_replace(" ","-",get_sub_field( 'title_menu' )));
	$datafield = array();

	if ( have_rows( 'field_page' ) ) :
		$nofield = 1;
		while ( have_rows( 'field_page' ) ) : the_row();
		if(get_sub_field( 'type_field' )=="Text"){

			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			));
		}
		if(get_sub_field( 'type_field' )=="Textarea"){
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			));
		}
		if(get_sub_field( 'type_field' )=="Content"){
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'wysiwyg',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'tabs' => 'all',
				'toolbar' => 'full',
				'media_upload' => 1,
				'delay' => 0,
			));
		}
	
		if(get_sub_field( 'type_field' )=="Image"){
	
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			));
		}
		if(get_sub_field( 'type_field' )=="Select"){
			$dataoption = array();
			if ( have_rows( 'option' ) ) :
			while ( have_rows( 'option' ) ) : the_row();
			array_push($dataoption, array(
				get_sub_field( 'title' ) => get_sub_field( 'title' )
			));	
			endwhile; endif;
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'select',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => $dataoption,
				'default_value' => false,
				'allow_null' => 0,
				'multiple' => 0,
				'ui' => 0,
				'return_format' => 'value',
				'ajax' => 0,
				'placeholder' => '',
			));
		}
		if(get_sub_field( 'type_field' )=="Relasi"){
	
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'relationship',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => get_sub_field( 'data_relasi' ),
				),
				'taxonomy' => '',
				'filters' => array(
					0 => 'search',
					1 => 'taxonomy',
				),
				'elements' => '',
				'min' => '',
				'max' => '',
				'return_format' => 'id',
			));
	   
	   }
	   if(get_sub_field( 'type_field' )=="Password"){
	
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'password',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		));
	}
	
	if(get_sub_field( 'type_field' )=="Date Picker"){
	
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'date_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'display_format' => 'd/m/Y',
			'return_format' => 'd/m/Y',
			'first_day' => 0,
	));
	
	}
		if(get_sub_field( 'type_field' )=="Color Picker"){
	
			array_push($datafield, array(
				'key' => 'field_'.$nogrup.$nofield,
				'label' => get_sub_field( 'title_field' ),
				'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#ffffff',
				'enable_opacity' => 0,
				'return_format' => 'string',
			));
	
	}
	
	   if(get_sub_field( 'type_field' )=="File"){
	
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		));
	
	}
	
	if(get_sub_field( 'type_field' )=="List Text"){
	
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_'.$nogrup.$nofield."a",
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_'.$nogrup.$nofield."b",
					'label' => 'Url',
					'name' => 'url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		));
	
	}
	
	if(get_sub_field( 'type_field' )=="List Image"){
	
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'table',
			'button_label' => '',
			'sub_fields' => array(
				array(
					'key' => 'field_'.$nogrup.$nofield."a",
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'url',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_'.$nogrup.$nofield."b",
					'label' => 'Title',
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_'.$nogrup.$nofield."C",
					'label' => 'Description',
					'name' => 'description',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => '',
				),
				array(
					'key' => 'field_'.$nogrup.$nofield."d",
					'label' => 'Url',
					'name' => 'url',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		));
	
	}

   $nofield++; endwhile; endif;

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_'.$nogrup,
		'title' => get_sub_field( 'title_menu' ),
		'fields' => array(
			array(
				'key' => 'field_'.$nogrup,
				'label' => get_sub_field( 'title_menu' ),
				'name' => $slugpage,
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => $datafield ,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => $slugpage,
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	));
	
	endif;		
}

if(get_sub_field( 'type_menu' ) == "Post Page"){

	$slugpage = strtolower(str_replace(" ","-",get_sub_field( 'title_menu' )));
	$datafield = array();

	if ( have_rows( 'field_page' ) ) :
		$nofield = 1;
		while ( have_rows( 'field_page' ) ) : the_row();
		if(get_sub_field( 'type_field' )=="Text"){

		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		));
	}
	if(get_sub_field( 'type_field' )=="Textarea"){
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		));
	}
	if(get_sub_field( 'type_field' )=="Content"){
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'wysiwyg',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'full',
			'media_upload' => 1,
			'delay' => 0,
		));
	}

	if(get_sub_field( 'type_field' )=="Image"){

		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		));
	}
	if(get_sub_field( 'type_field' )=="Select"){
		$dataoption = array();
		if ( have_rows( 'option' ) ) :
		while ( have_rows( 'option' ) ) : the_row();
		array_push($dataoption, array(
			get_sub_field( 'title' ) => get_sub_field( 'title' )
		));	
		endwhile; endif;
		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => $dataoption,
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		));
	}
	if(get_sub_field( 'type_field' )=="Relasi"){

		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'relationship',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => get_sub_field( 'data_relasi' ),
			),
			'taxonomy' => '',
			'filters' => array(
				0 => 'search',
				1 => 'taxonomy',
			),
			'elements' => '',
			'min' => '',
			'max' => '',
			'return_format' => 'id',
		));
   
   }
   if(get_sub_field( 'type_field' )=="Password"){

	array_push($datafield, array(
		'key' => 'field_'.$nogrup.$nofield,
		'label' => get_sub_field( 'title_field' ),
		'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
		'type' => 'password',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'placeholder' => '',
		'prepend' => '',
		'append' => '',
	));
}

if(get_sub_field( 'type_field' )=="Date Picker"){

	array_push($datafield, array(
		'key' => 'field_'.$nogrup.$nofield,
		'label' => get_sub_field( 'title_field' ),
		'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
		'type' => 'date_picker',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'display_format' => 'd/m/Y',
		'return_format' => 'd/m/Y',
		'first_day' => 0,
));

}
	if(get_sub_field( 'type_field' )=="Color Picker"){

		array_push($datafield, array(
			'key' => 'field_'.$nogrup.$nofield,
			'label' => get_sub_field( 'title_field' ),
			'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#ffffff',
			'enable_opacity' => 0,
			'return_format' => 'string',
		));

}

   if(get_sub_field( 'type_field' )=="File"){

	array_push($datafield, array(
		'key' => 'field_'.$nogrup.$nofield,
		'label' => get_sub_field( 'title_field' ),
		'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
		'type' => 'file',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'return_format' => 'url',
		'library' => 'all',
		'min_size' => '',
		'max_size' => '',
		'mime_types' => '',
	));

}

if(get_sub_field( 'type_field' )=="List Text"){

	array_push($datafield, array(
		'key' => 'field_'.$nogrup.$nofield,
		'label' => get_sub_field( 'title_field' ),
		'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
		'type' => 'repeater',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'collapsed' => '',
		'min' => 0,
		'max' => 0,
		'layout' => 'table',
		'button_label' => '',
		'sub_fields' => array(
			array(
				'key' => 'field_'.$nogrup.$nofield."a",
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_'.$nogrup.$nofield."b",
				'label' => 'Url',
				'name' => 'url',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
	));

}

if(get_sub_field( 'type_field' )=="List Image"){

	array_push($datafield, array(
		'key' => 'field_'.$nogrup.$nofield,
		'label' => get_sub_field( 'title_field' ),
		'name' => strtolower(str_replace(" ","_",get_sub_field( 'title_field' ))),
		'type' => 'repeater',
		'instructions' => '',
		'required' => 0,
		'conditional_logic' => 0,
		'wrapper' => array(
			'width' => '',
			'class' => '',
			'id' => '',
		),
		'collapsed' => '',
		'min' => 0,
		'max' => 0,
		'layout' => 'table',
		'button_label' => '',
		'sub_fields' => array(
			array(
				'key' => 'field_'.$nogrup.$nofield."a",
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_'.$nogrup.$nofield."b",
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_'.$nogrup.$nofield."C",
				'label' => 'Description',
				'name' => 'description',
				'type' => 'textarea',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'new_lines' => '',
			),
			array(
				'key' => 'field_'.$nogrup.$nofield."d",
				'label' => 'Url',
				'name' => 'url',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
	));

}

   $nofield++; endwhile; endif;

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_'.$nogrup,
		'title' => get_sub_field( 'title_menu' ),
		'fields' => $datafield,
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => $slugpage,
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	));
	
	endif;		
	
	
	global $datakolom;
	$datakolom = array();
	if ( have_rows( 'field_page' ) ) :
		while ( have_rows( 'field_page' ) ) : the_row();
	$slugcolom = strtolower(str_replace(" ","_",get_sub_field( 'title_field' )));
    
    array_push($datakolom, array(
		"title" => get_sub_field( 'title_field' ),
		"slug" => $slugcolom,
		"type" => get_sub_field( 'type_field' )
	));
   
	 endwhile; endif;
	
	 array_push($datacolum , $slugpage);
	$_SESSION[$slugpage] = $datakolom; 
	$_SESSION["jumlahpage"] = $datacolum; 

}

$nogrup++; endwhile; endif;

    
}
add_action( 'init', 'wpdocs_codex_init' );

foreach ($_SESSION["jumlahpage"] as $value) {

	add_filter('manage_'.$value.'_posts_columns', function  ($defaults) use ($value) {

		foreach ($_SESSION[$value] as $value) {
			$defaults['title'] = "Nama";
			$defaults['categories'] = "Kategori";
			unset($defaults['date']);
			unset($defaults['categories']);
			$slug = $value['slug']; 
			$title = $value['title'];
			$type = $value['type'];
			if($type == "Text" || $type == "Textarea" || $type == "Content" || $type == "Select" || $type == "Image" || $type == "File" || $type == "Relasi" || $type == "Color Picker" || $type == "Date Picker" ){
			$defaults[$slug] = $title;
			}
		}
			return $defaults;
		}, 10);
	
	add_action('manage_'.$value.'_posts_custom_column', function ($column_name, $post_ID) use ($value) {
		
		foreach ($_SESSION[$value] as $value) {
	
			$slug = $value['slug']; 
			$title = $value['title'];
			$type = $value['type'];
	
		if ($column_name == $slug) {
			if($type == "Image" ){
			echo '<img width="100px" src="'.get_field($slug, $post_ID).'" />';
			}
			if($type == "Text" || $type == "Textarea" || $type == "Content" || $type == "Select" || $type == "Date Picker" ){
				echo get_field($slug, $post_ID);
			}
			if($type == "File" ){
				echo '<a href="'.get_field($slug, $post_ID).'">'.get_field($slug, $post_ID).'</a>"';
				}
			if($type == "Color Picker" ){
				echo '<div style="background:'.get_field($slug, $post_ID).'; width:50px;height:50px"></div><h6>'.get_field($slug, $post_ID).'</h6>';
				}
				if($type == "Relasi" ){
					if ( get_field($slug, $post_ID) ):
					foreach ( get_field($slug, $post_ID) as $p ):
					echo '<p>'. get_the_title( $p ).'<p>';
				endforeach;
			endif;
				}	
		}
	   
		}
	
	}, 10, 2);
	
	
}

 


//restapi

// function olismix_identitas() {
//     if ( have_rows( 'identitas_website', 'option' ) ) : 
//         while ( have_rows( 'identitas_website', 'option' ) ) : the_row();
    
//     $data =  array(
//             "title_website"=> get_sub_field( 'title_website' ),
//             "logo_website"=>  get_sub_field( 'logo_website' ),
//             "favicon"=> get_sub_field( 'favicon' ),
//             "tagline_website"=> get_sub_field( 'tagline_website' ),
//             "background_login"=> get_sub_field( 'background_login' ),
//             "dashboard_color_primary"=> get_sub_field( 'dashboard_color_primary' ),
//             "dashboard_color_secondery"=> get_sub_field( 'dashboard_color_secondery' ),
//             "dashboard_color_text_menu"=> get_sub_field( 'dashboard_color_text_menu' ),
//             "setting_basic_menu"=> get_sub_field( 'setting_basic_menu' )
//     );

//    endwhile; endif;
//     return $data;
// }

function olismix_singlepage($data){
	$datapage = get_fields('option');
	
   return $datapage[$data['page']];

}



function olismix_postpage($data){
    if($data['slug'] != null){
    $args = [
		'name' => $data['slug'],
		'post_type' => $data['page']
	];
    }else{
        $args = [
            'numberposts' => 99999,
            'post_type' => $data['page']
        ];

    }

	$posts = get_posts($args);

	$data = [];
	$i = 0;

	foreach($posts as $post) {
		$data[$i]['id'] = $post->ID;
		$data[$i]['title'] = $post->post_title;
        $data[$i]['slug'] = $post->post_name;
        $data[$i]['created'] = $post->post_date;
        $data[$i]['status'] = $post->post_status;
        $data[$i]['data-type'] = $post->post_type;
        $data[$i]['acf'] = get_fields($post->ID);
        $i++;
	}

	return $data;
}


add_action('rest_api_init', function() {
	//options Page router
    register_rest_route('olismix/v1', 'single-page/(?P<page>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'olismix_singlepage',
	]);
	register_rest_route('olismix/v1', 'post-page/(?P<page>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'olismix_postpage',
	]);
	register_rest_route('olismix/v1', 'post-page/(?P<page>[a-zA-Z0-9-]+)/(?P<slug>[a-zA-Z0-9-]+)', [
		'methods' => 'GET',
		'callback' => 'olismix_postpage',
	]);
    
    
});


$valuerelasi = array();

foreach($_SESSION["jumlahpage"] as $value) {

	array_push($valuerelasi, array(
		$value => str_replace("_", " ", $value)
	));

}



//field static


if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_61d52c7f59e38',
		'title' => 'Dashboard Menu',
		'fields' => array(
			array(
				'key' => 'field_61d52e5e5b6db',
				'label' => 'Menu',
				'name' => 'menu',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => '',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => '',
				'sub_fields' => array(
					array(
						'key' => 'field_61d52e8457303',
						'label' => 'Title Menu',
						'name' => 'title_menu',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_61d52ea057304',
						'label' => 'Type Menu',
						'name' => 'type_menu',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'Single Page' => 'Single Page',
							'Post Page' => 'Post Page',
						),
						'default_value' => false,
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_61d52ee9659c0',
						'label' => 'Icon Menu',
						'name' => 'icon_menu',
						'type' => 'select',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'dashicons-menu' => 'dashicons-menu',
							'dashicons-admin-site' => 'dashicons-admin-site',
							'dashicons-admin-site-alt3' => 'dashicons-admin-site-alt3',
							'dashicons-dashboard' => 'dashicons-dashboard',
							'dashicons-admin-post' => 'dashicons-admin-post',
							'dashicons-admin-media' => 'dashicons-admin-media',
							'dashicons-admin-links' => 'dashicons-admin-links',
							'dashicons-admin-page' => 'dashicons-admin-page',
							'dashicons-admin-comments' => 'dashicons-admin-comments',
							'dashicons-admin-appearance' => 'dashicons-admin-appearance',
							'dashicons-admin-plugins' => 'dashicons-admin-plugins',
							'dashicons-plugins-checked' => 'dashicons-plugins-checked',
							'dashicons-admin-users' => 'dashicons-admin-users',
							'dashicons-admin-tools' => 'dashicons-admin-tools',
							'dashicons-admin-settings' => 'dashicons-admin-settings',
							'dashicons-admin-network' => 'dashicons-admin-network',
							'dashicons-admin-home' => 'dashicons-admin-home',
							'dashicons-admin-collapse' => 'dashicons-admin-collapse',
							'dashicons-filter' => 'dashicons-filter',
							'dashicons-admin-customizer' => 'dashicons-admin-customizer',
							'dashicons-admin-multisite' => 'dashicons-admin-multisite',
							'dashicons-welcome-write-blog' => 'dashicons-welcome-write-blog',
							'dashicons-welcome-view-site' => 'dashicons-welcome-view-site',
							'dashicons-welcome-widgets-menus' => 'dashicons-welcome-widgets-menus',
							'dashicons-welcome-learn-more1' => 'dashicons-welcome-learn-more1',
						),
						'default_value' => false,
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'return_format' => 'value',
						'ajax' => 0,
						'placeholder' => '',
					),
					array(
						'key' => 'field_61d5685529530',
						'label' => 'Field Page',
						'name' => 'field_page',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_61d568c9cb51e',
								'label' => 'Title Field',
								'name' => 'title_field',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_61d568eccb51f',
								'label' => 'Type Field',
								'name' => 'type_field',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Text' => 'Text',
									'Textarea' => 'Textarea',
									'Image' => 'Image',
									'Select' => 'Select',
									'Content' => 'Content',
									'File' => 'File',
									'Relasi' => 'Relasi',
									'Password' => 'Password',
									'Color Picker' => 'Color Picker',
									'Date Picker' => 'Date Picker',
									'List Text' => 'List Text',
									'List Image' => 'List Image',
								),
								'default_value' => false,
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
							array(
								'key' => 'field_61dbfebb3202a',
								'label' => 'Option',
								'name' => 'option',
								'type' => 'repeater',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'field_61d568eccb51f',
											'operator' => '==',
											'value' => 'Select',
										),
									),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'collapsed' => '',
								'min' => 0,
								'max' => 0,
								'layout' => 'table',
								'button_label' => '',
								'sub_fields' => array(
									array(
										'key' => 'field_61dbff283202b',
										'label' => 'Title',
										'name' => 'title',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
									),
								),
							),
							array(
								'key' => 'field_61dc444eb9928',
								'label' => 'Data Relasi',
								'name' => 'data_relasi',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'field_61d568eccb51f',
											'operator' => '==',
											'value' => 'Relasi',
										),
									),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => $valuerelasi,
								'default_value' => false,
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'return_format' => 'value',
								'ajax' => 0,
								'placeholder' => '',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'dashboard-setting',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	));
	
	acf_add_local_field_group(array(
		'key' => 'group_614e11b42a1e0',
		'title' => 'Identitas Website',
		'fields' => array(
			array(
				'key' => 'field_61541f550b710',
				'label' => 'Identitas Website',
				'name' => 'identitas_website',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_61541f6f0b711',
						'label' => 'Title Website',
						'name' => 'title_website',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_61541f830b712',
						'label' => 'Logo Website',
						'name' => 'logo_website',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'preview_size' => 'medium',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_61974817912b4',
						'label' => 'Favicon',
						'name' => 'favicon',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'preview_size' => 'thumbnail',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_61541f9f0b713',
						'label' => 'Tagline Website',
						'name' => 'tagline_website',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_61973dd16993a',
						'label' => 'Background Login',
						'name' => 'background_login',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'url',
						'preview_size' => 'medium',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_61973f0ee5421',
						'label' => 'Dashboard Color Primary',
						'name' => 'dashboard_color_primary',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '#860707',
						'enable_opacity' => false,
						'return_format' => 'string',
					),
					array(
						'key' => 'field_619746f8841c8',
						'label' => 'Dashboard Color Secondery',
						'name' => 'dashboard_color_secondery',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '#860707',
						'enable_opacity' => false,
						'return_format' => 'string',
					),
					array(
						'key' => 'field_619e83d8a07c4',
						'label' => 'Dashboard Color Text Menu',
						'name' => 'dashboard_color_text_menu',
						'type' => 'color_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '#860707',
						'enable_opacity' => false,
						'return_format' => 'string',
					),
					array(
						'key' => 'field_619e78d57bb24',
						'label' => 'Setting Basic Menu',
						'name' => 'setting_basic_menu',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_619e79bc7bb25',
								'label' => 'Dashboard',
								'name' => 'dashboard',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7b264c805',
								'label' => 'Posts',
								'name' => 'posts',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7b864c806',
								'label' => 'Jetpack',
								'name' => 'jetpack',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7bd94c808',
								'label' => 'Media',
								'name' => 'media',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7c3147649',
								'label' => 'Pages',
								'name' => 'pages',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7c584764b',
								'label' => 'Comments',
								'name' => 'comments',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7ca04764c',
								'label' => 'Appearance',
								'name' => 'appearance',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7ce04764e',
								'label' => 'Plugins',
								'name' => 'plugins',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7d0d47650',
								'label' => 'Users',
								'name' => 'users',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7d2a47651',
								'label' => 'Tools',
								'name' => 'tools',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7d5047653',
								'label' => 'Settings',
								'name' => 'settings',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
							array(
								'key' => 'field_619e7d7b47655',
								'label' => 'ACF',
								'name' => 'acf',
								'type' => 'button_group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'Hide' => 'Hide',
									'Show' => 'Show',
								),
								'allow_null' => 0,
								'default_value' => 'Hide',
								'layout' => 'horizontal',
								'return_format' => 'value',
							),
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'dashboard-setting',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 1,
	));
	
	endif;		












?>





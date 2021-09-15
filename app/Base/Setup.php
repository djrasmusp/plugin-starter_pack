<?php


namespace AVEO_StarterPack\Base;

use PLUGIN_StarterPack\Functions\Functions;

if ( ! class_exists( 'Setup' ) ) {
	class Setup extends Functions {
		public $plugin_path;
		public $plugin_url;
		public $plugin;
		public $version;

		public $text_domain;
		public $prefix;

		public $customPostType;
		public $customTaxonomies;

		public function __construct() {
			$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
			$this->plugin_url  = plugin_dir_url( dirname( __FILE__, 2 ) );
			$this->plugin      = plugin_basename( dirname( __FILE__, 3 ) ) . '/'. PLUGIN_FILE_NAME;
			$this->version = $this->get_plugin_data(PLUGIN_FILE_NAME, 'Version');

			$this->text_domain = $this->get_plugin_data(PLUGIN_FILE_NAME, 'TextDomain');
			$this->prefix = 'psp_';

			$this->customPostType = [];
			$this->customTaxonomies = [];
		}

        protected function get_plugin_data($file, $data_tag){
            if(! function_exists('get_plugin_data')){
                require_once(ABSPATH . 'wp-admin/includes/plugin.php');
            }

            return get_plugin_data($this->plugin_path . $file)[$data_tag];
        }
	}
}
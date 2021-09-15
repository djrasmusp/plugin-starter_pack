<?php


namespace PLUGIN_StarterPack\Base;

if ( ! class_exists( 'Enqueue' ) ) {
	class Enqueue extends Setup {
		public function __construct() {
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
			add_action('admin_enqueue_scripts', [$this, 'admin_enqueue']);

            parent::__construct();
		}

		public function enqueue() {
			wp_enqueue_style( $this->text_domain, $this->plugin_url . 'css/style.css', [], $this->version );
			wp_register_script( $this->text_domain, $this->plugin_url . 'js/script.js', [ 'jquery' ], $this->version );
			wp_localize_script( $this->text_domain, 'ajax', [ 'url' => admin_url( 'admin-ajax.php' ), wp_create_nonce('ajax-nonce') ]  );
			wp_enqueue_script( $this->text_domain );
		}

		public function admin_enqueue(){
			wp_enqueue_style( $this->text_domain . '_admin', $this->plugin_url . 'css/style_admin.css', [], $this->version );
			wp_enqueue_script($this->text_domain . '_admin');
		}
	}
}

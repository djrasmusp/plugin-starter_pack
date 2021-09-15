<?php


namespace PLUGIN_StarterPack\Base;

if ( ! class_exists( 'Install' ) ) {
	class Install {
		public static function activate() {
			flush_rewrite_rules();
		}

		public static function deactivate() {
			flush_rewrite_rules();
		}
	}
}
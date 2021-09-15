<?php

namespace PLUGIN_StarterPack;

if (!class_exists('Init')) {
	class Init {
		public static function get_services() {
			return [
				Base\Ajax::class,
				Base\ElementorWidgets::class,
				Base\Enqueue::class,
			];
		}

		public static function register_services() {
			foreach (self::get_services() as $class ){
				$service = self::instantiate($class);
			}
		}

		private static function instantiate ($class) {
			$service = new $class();

			return $service;
		}
	}
}
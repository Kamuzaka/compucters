<?php
class Router
{
	public static function config($key) {
		$data = include_once ROOT . SEP . 'config.php';
		return isset($data[$key]) ? $data[$key] : [];
	}

	public static function app()
	{
		$urlParts = explode('/', $_GET['route']);

		$controllerName = (isset($urlParts[0]) && $urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'IndexController';

		if (file_exists(ROOT . SEP . 'controllers' . SEP . $controllerName . '.php')) {
			$controller = new $controllerName;
			$method = (isset($urlParts[1]) && $urlParts[1]) ? $urlParts[1] : 'index';
			if (method_exists($controller, $method)) {
				call_user_func([$controller, $method]);
			} else {
				self::throwError(404, '404 Страница не найдена');
			}
		} else {
			self::throwError(404, '404 Страница не найдена');
		}
	}

	public static function throwError($code, $text) {
		http_response_code($code);
		echo '<H1>' . $text . '</H1>';
		die();
	}
}
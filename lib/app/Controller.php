<?php
class Controller
{
	public function render($view, $data) {
		if (file_exists(THEMES . $view . '.php')) {
			include(THEMES . $view . '.php');
			die();
		} else {
			Router::throwError(404, '404 Страница не найдена');
		}
	}
}
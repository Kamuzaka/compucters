<?php

	const ROOT = __DIR__;
	const SEP = DIRECTORY_SEPARATOR;
	const THEMES = ROOT . DIRECTORY_SEPARATOR . 'themes' . DIRECTORY_SEPARATOR;

	$img = '/themes/img/';

	require_once 'autoloader.php';

	Router::app();
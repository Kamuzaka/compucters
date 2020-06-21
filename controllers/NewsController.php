<?php
class NewsController extends Controller
{
	public function index() {
		$this->render('news', []);
	}
}
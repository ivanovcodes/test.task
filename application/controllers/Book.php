<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book
 * Контроллер для работы с книгами
 */
class Book extends CI_Controller {

	/**
	 * Загрузка списка книг
	 */
	public function loadList()
	{
		$this->load->model('Book_model');
		$bookList = $this->Book_model->loadList();
		echo json_encode($bookList);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book_model
 * Модель для работы с книгами
 */
class Book_model extends CI_Model {

	/**
	 * Загрузка списка книг
	 */
	public function loadList()
	{
		// todo реализовать получение списка книг из БД
		return array(
			array('book_id' => 1, 'book_name' => 'Евгений Онегин', 'author_name' => 'Пушкин А.С.', 'book_year' => 1833),
			array('book_id' => 2, 'book_name' => 'Война и мир', 'author_name' => 'Толстой Л.Н.', 'book_year' => 1869),
			array('book_id' => 3, 'book_name' => 'Анна Каренина', 'author_name' => 'Толстой Л.Н.', 'book_year' => 1877)
		);
	}
}

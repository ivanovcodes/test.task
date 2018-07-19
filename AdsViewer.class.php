<?php
/**
 * Тестовое задание
 * Показ рекламных объявлений
 * Логирование запросов.
 *
 * @see https://github.com/ivanovsite/test.task/tree/AdsViewer
 * @author Иванов Владимир <development@ivanov.site> 
 *
 */

class AdsViewer
{
	private $post;

	public function setSource(DataInterface $post)
	{
		$this->post = $post;
	}

	public function getAds($id)
	{
		return $this->post->getAds(intval($id));
	}
}

interface DataInterface
{
	public function getAds($id);
}

class Mysql implements DataInterface 
{
	public function getAds($id){
		return array('source'=>'Mysql');
	}
}

class Daemon implements DataInterface 
{
	public function getAds($id){
		return array('source'=>'Daemon');
	}
}
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
	public $logger = false;

	public function setSource(DataInterface $post)
	{
		$this->post = $post;
	}

	public function getAds($id)
	{		
		$log = [];
		$log['dt'] = date('Y-m-d H:i:s', mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")));
		$log['function'] =__CLASS__.".".__FUNCTION__;
		$log['ad-id'] = $id;
		if($this->logger) file_put_contents('log.txt', str_replace(array('{', '}'), ' ', json_encode($log))."\r\n", FILE_APPEND);
		return array_merge($this->post->getAds(intval($id)), array('logger'=>$this->logger));
	}
}

interface DataInterface
{
	public function getAds($id);
}

class Mysql implements DataInterface 
{
	public function getAds($id){
		/* получили данные из mysql */
		$data = array(
			'id' => $id,
			'name' => 'Some Title From MySQL',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'keywords' => 'Some Keywords',
			'price' => 10
		);		
		return array_merge($data, array('source'=>'Mysql'));
	}
}

class Daemon implements DataInterface 
{
	public function getAds($id){
		/* получили данные из Daemon */
		$data = array(
			'id' => $id,
			'name' => 'Some Title From Daemon',
			'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
			'keywords' => 'Some Keywords',
			'price' => 10
		);		
		return array_merge($data, array('source'=>'Daemon'));
	}
}
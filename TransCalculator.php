<?php
/**
 * Тестовое задание # 1
 * Расчет стоимости доставки груза по перевозчикам.
 * Архитектура подразумевает рост количества перевозчиков со временем и добавление новых алгоритмов расчета другими программистами.
 *
 * @see https://github.com/ivanovsite/test.task/tree/TransCalculator
 * @author Иванов Владимир <development@ivanov.site> 
 *
 */

class TransCalculator
{
	private $post;

	public function setPost(TransInterface $post)
	{
		$this->post = $post;
	}

	public function calculate($weight)
	{
		//$weight++;
		return $this->post->calculate($weight);
	}
}

interface TransInterface
{
	public function calculate($weight);
}

class PostRussia implements TransInterface 
{
	public function calculate($weight){
		return $weight + 1;
	}
}

class PostDHL implements TransInterface 
{
	public function calculate($weight){
		return $weight - 1;
	}
}
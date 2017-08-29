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

require('TransCalculator.php'); 

$weight = $_GET['weight'] ? $_GET['weight'] : 0;

$obj = new TransCalculator;

$obj->setPost(new PostRussia);
$result = $obj->calculate($weight);
print_r('Cтоимости доставки "Почта России": '.$result);

$obj->setPost(new PostDHL);
$result = $obj->calculate($weight);
print_r(', а стоимость доставки "DHL": '.$result);

/* 
 * Альтернативный расчет по конкретному перевозчику:
 * $result = new PostRussia;
 * var_dump($result->calculate($weight)); */
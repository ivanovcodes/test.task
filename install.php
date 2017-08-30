<?php
/**
 * Тестовое задание # 2
 * Работа с подписчиками одного издания.
 *
 * @see https://github.com/ivanovsite/test.task/tree/BookEdition
 * @author Иванов Владимир <development@ivanov.site> 
 *
 */

$in = parse_ini_file('config.ini', true);
$db = mysqli_connect($in['db']['host'], $in['db']['user'], $in['db']['password'], $in['db']['dbname']) or die('You need manual import SQL file data/dump.sql into mysql');
mysqli_query($db, 'set names utf8');
mysqli_query($db, 'TRUNCATE tbl_readers;');
mysqli_query($db, 'TRUNCATE tbl_editions;');
mysqli_query($db, 'TRUNCATE tbl_subscriptions;');
$readers = json_decode(file_get_contents("data/names.json"), true);
$editors = json_decode(file_get_contents("data/titles.json"), true);

for ($i=0; $i < count($editors); $i++) mysqli_query($db, "INSERT INTO tbl_editions (`id`, `title`) VALUES (NULL, '".$editors[$i]['title']."');");
for ($i=0; $i < 100; $i++) { 
	mysqli_query($db, "INSERT INTO tbl_readers (`id`, `name`, `birthday`) VALUES (NULL, '".$readers[rand(0, count($readers)-1)]['name']."', '".date("Y-m-d", mktime(0, 0, 0, date('m')- rand(1, 10), date('d') - rand(1, 10), date('Y') - rand(15, 75)))."');");
	$id = mysqli_insert_id($db);
	for ($j=1; $j <= rand(1, count($editors)); $j++) { 
		mysqli_query($db, "INSERT IGNORE INTO tbl_subscriptions (`id_edition`, `id_reader`) VALUES ('".strval($j)."', '".$id."');");
	}
}

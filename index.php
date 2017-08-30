<?php
/**
 * Тестовое задание # 2
 * Работа с подписчиками одного издания.
 *
 * @see https://github.com/ivanovsite/test.task/tree/BookEdition
 * @author Иванов Владимир <development@ivanov.site> 
 *
 */

$edition = $_GET['edition'] ? $_GET['edition'] : 'Мурзилка';

$in = parse_ini_file('config.ini', true);
$db = mysqli_connect($in['db']['host'], $in['db']['user'], $in['db']['password'], $in['db']['dbname']) or require('install.php'); 
mysqli_query($db, 'set names utf8');
mysqli_query($db, "SET sql_mode = ''");

$result = mysqli_query($db, "
	SELECT tbl_editions.title, COUNT(*) AS readers, DATEDIFF(YEAR, tbl_readers.birthday, NOW()) AS age
 FROM tbl_subscriptions LEFT JOIN tbl_editions ON tbl_editions.id = tbl_subscriptions.id_edition LEFT JOIN tbl_readers ON tbl_readers.id = tbl_subscriptions.id_reader WHERE tbl_editions.title LIKE '%".$edition."%' GROUP BY tbl_subscriptions.id_edition LIMIT 1;
");
$row = mysqli_fetch_array($result);
print_r('Всего на журнал: '.$row['title'].' подписано '.$row['readers'].' читателей');

$result = mysqli_query($db, "
	SELECT tbl_readers.id, tbl_readers.name FROM tbl_reader JOIN(SELECT RAND() * (SELECT MAX(id) FROM tbl_readers) AS last_id) AS r WHERE tbl_readers.id >= r.last_id ORDER BY tbl_readers.id ASC LIMIT 1;
");
$row = mysqli_fetch_array($result);
print_r(', а это наш любимый читатель: '.$row['name'].' [#'.$row['id'].']');

mysqli_close($db);
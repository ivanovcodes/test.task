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

require('AdsViewer.class.php'); 

$result = [];
$Ads = new AdsViewer;

($_GET['id'] ? $id = $_GET['id'] : $result['response'] = 'unknown id ads');
($_GET['from'] ? $id = $_GET['from'] : $result['response'] = 'unknown source ads');

switch ($_GET['from']) {
    case "Mysql":
        $Ads->setSource(new Mysql);
        $result = $Ads->getAds($id);
        break;
    case "Daemon":
        $Ads->setSource(new Daemon);
        $result = $Ads->getAds($id);
        break;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE); 
<?php
   error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE|E_ALL);
    ini_set('display_errors', 1);

$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news = explode("\n", $news);

if ( count( $_GET ) == 0 ) {
    header("HTTP/1.0 404 Not Found");
    include_once "404.html";    
}

if ( isset( $_GET['all'] ) ) {
    All_news ();
}

# Точка входа
if ( isset( $_GET['id'] ) && $_GET['id'] >= 0 && $_GET['id'] <= ( count( $news ) - 1 ) && $_GET['id'] !== '' 
        && preg_match('@[ 0-9 ]@u', $_GET['id']) 
        && $_GET['id'] !== ' ' ) {
    Specific_news ();
}
elseif ( isset( $_GET['id'] ) ) {
    All_news ();    
}
elseif ( !isset( $_GET['all'] ) ) {
    header("HTTP/1.0 404 Not Found");
    include_once "404.html";    
}

# Функция вывода всего списка новостей:
function All_news () {
    global $news;
    
    echo '<h4>Список новостей (для выбора новости введите в адресную строку параметр id=0...8):</h4>';
        foreach ( $news as $key => $value ) {
            echo ''.$key.'. '.$value.'';
            echo '<br>';
    }
}

# Функция вывода конкретной новости:
function Specific_news () {
    global $news;
    
    echo ''.$_GET['id' ].'. ';
    echo $news [ $_GET['id' ] ];
    echo '<br>';
    echo '<br>';
    echo ' &nbsp  &nbsp <i>Для вывода списка новостей введите параметр \'all\' в адресную строку.</i>';
}
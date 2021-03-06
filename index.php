<?php
error_reporting(-1);
$conf['error_level'] = 2;
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once 'config/config.php';
require_once 'lib/Twig/Autoloader.php';
require_once 'class/Db.php';
require_once 'class/Engine.php';

$templ = 'otziv.twig';

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $templ = 'info.twig';
} elseif (!empty($_GET['error'])) {
    $templ = 'error404.html';
} else {
    $id = null;
}

Engine::getInstance()->connection('pictures', 'data');
$data = Engine::getInstance()->views();
$info = Engine::getInstance()->info($id);

// подгружаем и активируем автозагрузчик Twig-а
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('lib/templates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate($templ);
try {
    //рендерим въюхи и передаём данные
    echo $template->render(array(
        'data' => $data,
        'info' => $info,
        'name' => 'pictures',
    ));

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
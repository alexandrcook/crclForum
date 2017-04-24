<?php
namespace App\Framework;
class View
{
    public static function show($viewRoot, $data = [], $viewName = null)
    {
        include PATHROOT . '/app/views/header.view.php';
        if ($viewRoot == 'admin') {
            include PATHROOT . '/app/views/admin/adminMenu.php';
        }
        if ($viewName) {
            //if( file_exists(PATHROOT . '/app/views/' . $viewRoot . '/' . $viewName . 'view.php') ) {
            include PATHROOT . '/app/views/' . $viewRoot . '/' . $viewName . '.view.php';
            // } else {
            //     throw new \Exception('File doesn\'t exist');
            //}
        } else {
            //if( file_exists(PATHROOT . 'app/views/' . $viewRoot . '/index.php') ) {
            include PATHROOT . '/app/views/' . $viewRoot . '/index.view.php';
            //} else {
            //    throw new \Exception('File doesn\'t exist');
            //}
        }
        include PATHROOT . '/app/views/footer.view.php';
    }
}
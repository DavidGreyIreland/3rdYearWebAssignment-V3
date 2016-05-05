<?php
namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\ClassTable;

class MainController
{
    public function indexAction(Request $request, Application $app)
    {
        /*
        $app['session']->set('user', ['username' => 'matt']);
        $user = $app['session']->get('user');
        var_dump($user);
        die();
*/
        $classTables = ClassTable::getAll();
        $argsArray = [
            'classTables' => $classTables,
        ];
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public function contactAction(Request $request, Application $app)
    {
        $templateName = 'contact';
        return $app['twig']->render($templateName . '.html.twig', []);
    }

    public function sitemapAction(Request $request, Application $app)
    {
        $argsArray = [];

        $templateName = 'sitemap';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    public static function error404(Application $app, $message)
    {
        $argsArray = [
            'name' => 'Fabien',
        ];
        $templateName = '404';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /login
    public function loginAction(Request $request, Application $app)
    {
        $app['session']->set('user', ['username' => 'matt']);
        $user = $app['session']->get('user');
        var_dump($user);
        die();

        $classTables = ClassTable::getAll();
        $argsArray = [
            'classTables' => $classTables,
        ];
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}

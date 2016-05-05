<?php

namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class StudentController
{
    // action for route:    /admin
    // will we allow access to the Admin home?
    public function studentIndexAction(Request $request, Application $app)
    {
        $argsArray = [
        ];
        $templateName = 'studentIndex';// index is within folder admin in templates folder
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}

<?php
/**
 * class for all login methods
 */
namespace Itb\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Itb\Model\User;

/**
 * Class LoginController controls login methods
 * @package Itb\Controller
 */
class LoginController
{
    // action for route:    /login
    /**
     * login method starts session
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', []);

        // build args array
        // ------------
        $argsArray = [];


        // render (draw) template
        // ------------
        $templateName = 'login';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }



    /**
     * action for POST route:    /processLogin
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function processLoginAction(Request $request, Application $app)
    {
        //var_dump("asdf");
        //die();
        // default is bad login
        $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = User::canFindMatchingUsernameAndPassword($username, $password);
        $isRole = User::canFindMatchingUsernameAndRole($username);
        // action depending on login success
        if ($isLoggedIn) {
            if ($isRole) {
                // store username in 'user' in 'session'
                $app['session']->set('user', array('username' => $username));
                // success - redirect to the secure admin home page
                return $app->redirect('/admin');
            } else {
                // store username in 'user' in 'session'
                $app['session']->set('user', array('username' => $username));
                // success - redirect to the secure admin home page
                return $app->redirect('/student');
            }
        }

        // login page with error message
        // ------------
        $templateName = 'login';
        $argsArray = array(
            'errorMessage' => 'bad username or password - please re-enter'
        );

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }


    /**
     *  action for route:    /logout
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null);

        // redirect to home page
//        return $app->redirect('/');

        // render (draw) template
        // ------------
        return $app->redirect('/');
    }

    /**
     * --------- helper functions -------
     * @return bool
     */
    public function isLoggedInFromSession()
    {
        $isLoggedIn = false;

        // user is logged in if there is a 'user' entry in the SESSION superglobal
        if (isset($_SESSION['user'])) {
            $isLoggedIn = true;
        }

        return $isLoggedIn;
    }


    /**
     * //--------- gets username from session
     * @return string
     */
    public function usernameFromSession()
    {
        $username = '';

        // extract username from SESSION superglobal
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
        }

        return $username;
    }
}

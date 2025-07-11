<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
        $this->session = service('session');

        // Initialize database connection for all controllers
        $this->db = \Config\Database::connect();
    }

    /**
     * Loads relevant user session data.
     *
     * @return array An associative array containing user session data, or an empty array if not logged in.
     */
    protected function loadUserSession(): array
    {
        // If user is not logged in
        if (! $this->session->has('isLoggedIn') || ! $this->session->get('isLoggedIn')) {
            return [];
        }

        return [
            'user_id' => $this->session->get('user_id'),
            'user_firstname' => $this->session->get('user_firstname'),
            'user_middlename' => $this->session->get('user_middlename'),
            'user_lastname' => $this->session->get('user_lastname'),
            'user_fullname' => $this->session->get('user_fullname'),
            'user_email' => $this->session->get('user_email'),
            'user_type' => $this->session->get('user_type'),
            'user_suffix' => $this->session->get('user_suffix'),
            'user_tupid' => $this->session->get('user_tupid'),
            'user_role_name' => $this->session->get('user_role_name'),
            'gen_role' => $this->session->get('user_gen_role'),
            'user_dep_name' => $this->session->get('user_dep_name'),
            'user_dep_id' => $this->session->get('user_dep_id'),
        ];
    }
}

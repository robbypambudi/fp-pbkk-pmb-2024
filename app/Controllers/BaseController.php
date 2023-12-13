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
class BaseController extends Controller
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
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }

    public function is_loged_as_panitia()
    {
        if (!session()->get('panitia_logged_in') == true and !session()->get('role') == 'panitia') {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Silahkan login terlebih dahulu!</div>');
            header("Location: /panitia/login");
            exit;
        }
    }

    public function is_loged_in()
    {
        if (!session()->get('logged_in') == true) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Silahkan login terlebih dahulu!</div>');
            header("Location: /login");
            exit;
        }
    }

    public function is_lock()
    {

        $this->aid = session()->get('aid');
        $db = db_connect();
        $q = 'SELECT is_lock FROM akun WHERE id = ' . $this->aid . '';
        $r = $db->query($q)->getRowArray();
        $db->close();
        if ($r['is_lock'] == 1) {
            session()->setFlashdata('message', '<div class="alert alert-danger my-2" role="alert">Anda sudah membuat pendaftaran dan tidak diperbolehkan untuk melakukan perubahan data.</div>');
            header("Location: /beranda");
            exit;
        }
    }
}

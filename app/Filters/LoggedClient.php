<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoggedClient implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $language = \Config\Services::language();
        $logged   = session('loggedClient');
        if (!$logged) {
            $language->setLocale(session()->lang);
            session()->setFlashdata('error', lang('Alertas.naoLogado'));
            return redirect()->to('login');
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}

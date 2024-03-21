<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Credential implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ((session()->get('app') !='backofficeebengkel')) {
          return redirect()->to('login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
<?php

/**
 * Main handler for the application.
 *
 * @package Framework
 * @author  Shawn Borton <shawn@shawnborton.info>
 */

namespace Framework;

use Sypher\Controllers\CipherController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

/**
 * The Core class that implements the HttpKernelInterface
 *
 * @package Framework
 * @author  Shawn Borton <shawn@shawnborton.info>
 */
class Core implements HttpKernelInterface
{
    protected $cipherControl;

    public function __construct()
    {
        $this->cipherControl = new CipherController();
    }

    public function handle(
        Request $request,
        $type = HttpKernelInterface::MASTER_REQUEST,
        $catch = true
    ) {
        // We set up a simple routing system based on the request.
        switch($request->getPathInfo()) {
        case '/':
            $response = $this->cipherControl->index();
            break;

        case '/decrypt':
            $response = $this->cipherControl->decrypt($request);
            break;

        case '/test-decrypt':
            return $this->cipherControl->testDecrypt();
            break;

        }

        return $response;
    }
}
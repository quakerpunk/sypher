<?php
/**
 * Controller for the routes defined in the framework.
 *
 * @package Sypher\Controllers
 * @author  Shawn Borton <shawn@shawnborton.info>
 */

namespace Sypher\Controllers;

use Sypher\Cipher;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Csrf\CsrfExtension;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;
use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;

/**
 * Controller class.
 *
 * @package Sypher\Controllers
 * @author  Shawn Borton <shawn@shawnborton.info>
 */
class CipherController
{
    protected $cipher;
    protected $loader;
    protected $renderer;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->cipher = new Cipher();
        $this->loader = new FileSystemLoader(__DIR__ . '/../../views/%name%');
        $this->renderer = new PhpEngine(new TemplateNameParser(), $this->loader);
    }

    /**
     * Method for the root URL.
     *
     * @return Symfony\Component\HttpFoundation\Response
     *   Response with the embedded form.
     */
    public function index()
    {
        return new Response(
            $this->renderer->render('decrypt_form.html.php')
        );
    }

    /**
     * Method for the decrypt route.
     *
     * @param Symfony\Component\HttpFoundation\Request
     *   Request containing form data.
     *
     * @return Symfony\Component\HttpFoundation\Response
     *   Response with the embedded form.
     */
    public function decrypt(Request $request)
    {
        // Get data from request object and run it through the cipher.
        $encrypted_text = $request->request->get('text');
        $decrypted_text = $this->cipher->simpleCipher($encrypted_text);

        // Set up a JsonReponse based on the result of the decryption.
        if ($decrypted_text) {
            $response = new JsonResponse(
                array(
                    'status' => 200,
                    'data' => $decrypted_text,
                )
            );
        } else {
            $response = new JsonResponse(
                array(
                    'status' => 400,
                    'error' => 'There has been an error processing your request.',
                )
            );
        }

        return $response;
    }

    /**
     * Method for testing the decryption.
     *
     * @return Symfony\Component\HttpFoundation\Response
     *   Response with the embedded form.
     */
    public function testDecrypt()
    {
        // This method takes the provided encrypted.txt file and creates a new file
        // called decrypted.txt.
        $encrypted_content = file_get_contents(__DIR__ . '/../../texts/encrypted.txt');
        $decrypted_content = $this->cipher->simpleCipher($encrypted_content);
        file_put_contents(__DIR__ . '/../../texts/decrypted.txt', $decrypted_content);

        return new Response(
            $this->renderer->render('test_decrypt.html.php')
        );
    }
}
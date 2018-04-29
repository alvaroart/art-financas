<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 23/04/2018
 * Time: 14:42
 */

namespace ARTFin\View\Twig;


class TwigGlobals extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    /**
     * @var AuthInterface
     */
    private $auth;

    /**
     * TwigGlobals constructor.
     */
    public function __construct(AuthInterface $auth)
    {
        $this->auth = $auth;
    }

    public function getGlobals()
    {
        return [
            'Auth' => $this->auth
        ];
    }
}
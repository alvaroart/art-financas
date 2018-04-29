<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 20/04/2018
 * Time: 02:35
 */

namespace ARTFin\Auth;

class Auth implements AuthInterface
{
    /**
     * @var JasnyAuth
     */
    private $jasnyAuth;

    public function __construct(JasnyAuth $jasnyAuth)
    {
        $this->jasnyAuth = $jasnyAuth;
        $this->sessionStart();
    }

// Criando o método sessionStart() ao final da classe
    protected function sessionStart()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function login(array $credentials): bool
    {
        list('email' => $email, 'password' => $password) = $credentials;
        return $this->jasnyAuth->login($email, $password) !== null;
    }

    public function check(): bool
    {
        // TODO: Implement check() method.
        return $this->jasnyAuth->user() !== null;
    }

    public function logout(): void
    {
        // TODO: Implement logout() method.
    }
    public function hashPassword(string $password): string
    {
        return $this->jasnyAuth->hashPassword($password);
    }
}
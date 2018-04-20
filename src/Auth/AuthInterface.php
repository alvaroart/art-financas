<?php
/**
 * Created by PhpStorm.
 * User: alvaro
 * Date: 20/04/2018
 * Time: 02:34
 */

namespace ARTFin\Auth;


interface AuthInterface
{
    public function login(array $credentials): bool;

    public function check(): bool;

    public function logout(): void;

}
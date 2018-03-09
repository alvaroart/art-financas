<?php
declare(strict_types = 1);
namespace ARTFin\View;

use Psr\Http\Message\ResponseInterface;


interface ViewRendererInterface
{
    public function render(string $template, array $context = []) : ResponseInterface;
}
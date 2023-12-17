<?php

/**
 * PHP version 8.
 *
 * @category Security
 * @package  AccessDeniedHandler
 * @author   Yokke <mdembelepro@gmail.com>
 * @license  ISC License
 * @link     https://github.com/Jexinte/P8---TodoList
 */

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    /**
     * Summary of __construct
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        private UrlGeneratorInterface $urlGenerator,
    ) {
    }


    /**
     * Summary of handle
     *
     * @param Request $request
     * @param AccessDeniedException $accessDeniedException
     *
     * @return RedirectResponse|null
     */
    public function handle(Request $request, AccessDeniedException $accessDeniedException): ?RedirectResponse
    {
        return new RedirectResponse($this->urlGenerator->generate('homepage'));
    }
}

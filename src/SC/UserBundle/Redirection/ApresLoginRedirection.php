<?php
/**
 * Created by PhpStorm.
 * User: qualshore
 * Date: 22/07/2015
 * Time: 11:47
 */

namespace SC\UserBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class ApresLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // On récupère la liste des rôles d'un utilisateur
        $roles = $token->getRoles();
        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // S'il s'agit d'un admin ou d'un super admin on le redirige vers le backoffice
        if (in_array('ROLE_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('admin_index'));
        // sinon, s'il s'agit d'un commercial on le redirige vers le CRM
        elseif (in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('super_admin_index'));
        // sinon il s'agit d'un membre
        else
            $redirection = new RedirectResponse($this->router->generate('sc_general_homepage'));

        return $redirection;
    }
}
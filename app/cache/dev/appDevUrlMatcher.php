<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // pd_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'pd_homepage')), array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::loginSymfonyAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // login_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::logoutAction',  '_route' => 'login_logout',);
            }

        }

        // super_admin_main_usuario
        if ($pathinfo === '/mainUsuario') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainUsuarioAction',  '_route' => 'super_admin_main_usuario',);
        }

        if (0 === strpos($pathinfo, '/add')) {
            // super_admin_add_usuario
            if ($pathinfo === '/addUsuario') {
                return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::addUsuarioAction',  '_route' => 'super_admin_add_usuario',);
            }

            // super_admin_add_supervisor_a_vendedor
            if (0 === strpos($pathinfo, '/addSupervisorVendedor') && preg_match('#^/addSupervisorVendedor/(?P<supervisorId>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_add_supervisor_a_vendedor')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::addSupervisorVendedorAction',));
            }

        }

        // super_admin_update_usuario
        if (0 === strpos($pathinfo, '/updateUsuario') && preg_match('#^/updateUsuario/(?P<usuarioId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_usuario')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateUsuarioAction',));
        }

        // super_admin_main_juego
        if ($pathinfo === '/mainJuego') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainJuegoAction',  '_route' => 'super_admin_main_juego',);
        }

        // super_admin_add_juego
        if ($pathinfo === '/addJuego') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::addJuegoAction',  '_route' => 'super_admin_add_juego',);
        }

        // super_admin_update_juego
        if (0 === strpos($pathinfo, '/updateJuego') && preg_match('#^/updateJuego/(?P<juegoId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_juego')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateJuegoAction',));
        }

        // super_admin_main_sucursal
        if ($pathinfo === '/mainSucursal') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainSucursalAction',  '_route' => 'super_admin_main_sucursal',);
        }

        // super_admin_add_sucursal
        if ($pathinfo === '/addSucursal') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::addSucursalAction',  '_route' => 'super_admin_add_sucursal',);
        }

        // super_admin_update_sucursal
        if (0 === strpos($pathinfo, '/updateSucursal') && preg_match('#^/updateSucursal/(?P<sucursalId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_sucursal')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateSucursalAction',));
        }

        // super_admin_main_caja
        if ($pathinfo === '/mainCaja') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainCajaAction',  '_route' => 'super_admin_main_caja',);
        }

        // super_admin_add_caja
        if ($pathinfo === '/addCaja') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::addCajaAction',  '_route' => 'super_admin_add_caja',);
        }

        // super_admin_update_caja
        if (0 === strpos($pathinfo, '/updateCaja') && preg_match('#^/updateCaja/(?P<cajaId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_caja')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateCajaAction',));
        }

        // super_admin_main_libreta
        if ($pathinfo === '/mainLibreta') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainLibretaAction',  '_route' => 'super_admin_main_libreta',);
        }

        // super_admin_update_libreta
        if (0 === strpos($pathinfo, '/updateLibreta') && preg_match('#^/updateLibreta/(?P<libretaId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_libreta')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateLibretaAction',));
        }

        // super_admin_main_ticket
        if ($pathinfo === '/mainTicket') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::mainTicketAction',  '_route' => 'super_admin_main_ticket',);
        }

        // super_admin_update_ticket
        if (0 === strpos($pathinfo, '/updateTicket') && preg_match('#^/updateTicket/(?P<libretaId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'super_admin_update_ticket')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SuperAdminController::updateTicketAction',));
        }

        // reporte_canje_efectivo
        if ($pathinfo === '/reporteCanjeEfectivo') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\reportController::canjeEfectivoAction',  '_route' => 'reporte_canje_efectivo',);
        }

        if (0 === strpos($pathinfo, '/main')) {
            // main_menu
            if ($pathinfo === '/main_menu') {
                return array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::mainMenuAction',  '_route' => 'main_menu',);
            }

            // main
            if ($pathinfo === '/main') {
                return array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::mainAction',  '_route' => 'main',);
            }

        }

        if (0 === strpos($pathinfo, '/sitio')) {
            // pagina_estatica
            if (preg_match('#^/sitio/(?P<pagina>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'pagina_estatica')), array (  '_controller' => 'PD\\AppBundle\\Controller\\SitioController::estaticaAction',));
            }

            // _pagina_estatica
            if (preg_match('#^/sitio/(?P<pagina>[^/]++)/?$#s', $pathinfo, $matches)) {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_pagina_estatica');
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => '_pagina_estatica')), array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'pagina_estatica',  'permanent' => true,));
            }

        }

        // ayuda
        if ($pathinfo === '/ayuda') {
            return array (  '_controller' => 'PD\\AppBundle\\Controller\\DefaultController::ayudaAction',  '_route' => 'ayuda',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

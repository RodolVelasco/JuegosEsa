<?php

/* PDBundle:Default:mainMenu.html.twig */
class __TwigTemplate_a5d9e5c270e9a2bd526588fc74ca65d64fe670ea694c42011f663cf38fa9f136 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 28
        echo "
<nav class=\"navbar navbar-default\">
\t<div class=\"container-fluid\">
      <div class=\"navbar-header\">
        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
          <span class=\"sr-only\">Toggle navigation</span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
          <span class=\"icon-bar\"></span>
        </button>
        <a class=\"navbar-brand\" href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("main");
        echo "\">Juegos El Salvador</a>
      </div>
      

      <div id=\"navbar\" class=\"navbar-collapse collapse\">
      \t
      \t
        <!-- INICIO ul pegados a la izquierda -->
      \t<ul class=\"nav navbar-nav\">
\t\t\t    ";
        // line 47
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "tipoUsuario", array()) == "SUPER_ADMIN")) {
            // line 48
            echo "\t        <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Juego <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 53
            echo $this->env->getExtension('routing')->getPath("super_admin_main_juego");
            echo "\">Listado de juegos</a></li>
              <li><a href=\"";
            // line 54
            echo $this->env->getExtension('routing')->getPath("super_admin_add_juego");
            echo "\">Agregar juego</a></li>
            </ul>
          </li>

          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Sucursal <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 63
            echo $this->env->getExtension('routing')->getPath("super_admin_main_sucursal");
            echo "\">Listado de sucursales</a></li>
              <li><a href=\"";
            // line 64
            echo $this->env->getExtension('routing')->getPath("super_admin_add_sucursal");
            echo "\">Agregar sucursal</a></li>
            </ul>
          </li>

          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Usuario <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 73
            echo $this->env->getExtension('routing')->getPath("super_admin_main_usuario");
            echo "\">Listado de usuarios</a></li>
              <li><a href=\"";
            // line 74
            echo $this->env->getExtension('routing')->getPath("super_admin_add_usuario");
            echo "\">Agregar usuario</a></li>
              
            </ul>
          </li>

          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Caja y libretas<span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 84
            echo $this->env->getExtension('routing')->getPath("super_admin_main_caja");
            echo "\">Listado de cajas</a></li>
              <li><a href=\"";
            // line 85
            echo $this->env->getExtension('routing')->getPath("super_admin_add_caja");
            echo "\">Agregar caja y libretas</a></li>
            </ul>
          </li>
          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Libreta y tickets <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 93
            echo $this->env->getExtension('routing')->getPath("super_admin_main_libreta");
            echo "\">Ver libretas</a></li>
              <li><a href=\"";
            // line 94
            echo $this->env->getExtension('routing')->getPath("super_admin_main_ticket");
            echo "\">Listado de tickets</a></li>
            </ul>
          </li>
          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              Reportes <span class=\"caret\"></span>
            </a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
            // line 102
            echo $this->env->getExtension('routing')->getPath("reporte_canje_efectivo");
            echo "\">Canje y efectivo</a></li>
            </ul>
          </li>
        ";
        }
        // line 106
        echo "
        ";
        // line 150
        echo "
        </ul> <!-- FIN ul pegados a la izquierda -->

        <ul class=\"nav navbar-nav navbar-right\">
          <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
              ";
        // line 156
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "html", null, true);
        echo " 
              ";
        // line 158
        echo "              <span class=\"caret\"></span></a>
            <ul class=\"dropdown-menu\">
              <li><a href=\"";
        // line 160
        echo $this->env->getExtension('routing')->getPath("login_logout");
        echo "\">Cerrar sesión</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>";
    }

    public function getTemplateName()
    {
        return "PDBundle:Default:mainMenu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 160,  153 => 158,  149 => 156,  141 => 150,  138 => 106,  131 => 102,  120 => 94,  116 => 93,  105 => 85,  101 => 84,  88 => 74,  84 => 73,  72 => 64,  68 => 63,  56 => 54,  52 => 53,  45 => 48,  43 => 47,  31 => 38,  19 => 28,);
    }
}

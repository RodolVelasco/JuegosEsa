<?php

/* PDBundle:Default:loginSymfony.html.twig */
class __TwigTemplate_d5d97be4f6ec0291edec57975b03e7ea4ae8bf96108e61b1e065c26e0cca954f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::baseLogin.html.twig", "PDBundle:Default:loginSymfony.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::baseLogin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "<link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/signin.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "<div class=\"container\">
\t\t";
        // line 10
        if ( !(null === (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")))) {
            // line 11
            echo "\t\t\t<div class=\"alert-info fade in\">
        \t\t<div>";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
        \t\t";
            // line 14
            echo "    \t\t</div>
\t\t";
        }
        // line 16
        echo "      <form id=\"loginForm\" name=\"loginForm\" class=\"form-signin\" method=\"POST\" action=\"";
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\">
        <h2 class=\"form-signin-heading\">Ingreso al sistema</h2>
        
        <label for=\"inputUser\" class=\"sr-only\">Usuario</label>
        <input type=\"text\" id=\"inputUser\" name=\"_username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, ((array_key_exists("last_username", $context)) ? (_twig_default_filter((isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "")) : ("")), "html", null, true);
        echo "\" class=\"form-control\" placeholder=\"Usuario\" required autofocus>
        
        <label for=\"inputPassword\" class=\"sr-only\">Contraseña</label>
        <input type=\"password\" id=\"inputPassword\" name=\"_password\" class=\"form-control\" placeholder=\"Contraseña\" required>
        
        <div class=\"checkbox\">
          <label>
            <input type=\"checkbox\" value=\"remember-me\" name=\"_remember_me\"> Recuerdame
          </label>
        </div>
        
        <button class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">Ingresar</button>
        
        ";
        // line 34
        echo "        
      </form>

    </div> <!-- /container -->
    
    ";
    }

    public function getTemplateName()
    {
        return "PDBundle:Default:loginSymfony.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 34,  66 => 20,  58 => 16,  54 => 14,  50 => 12,  47 => 11,  45 => 10,  42 => 9,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}

<?php

/* PDBundle:SuperAdmin:adminCajaMain.html.twig */
class __TwigTemplate_730bf1860a9a0d0fadb67e874d4f7a787829115468ea748b76f9d6589f9e5249 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminCajaMain.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "\t<!-- Custom styles for this template -->
\t<!-- <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/navbar.css"), "html", null, true);
        echo "\" rel=\"stylesheet\"> -->
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "<h1 class=\"page-header\">Cajas</h1>
<a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("super_admin_add_caja");
        echo "\">
\t<button class=\"btn btn-default\" >
\t\t<span class=\"glyphicon glyphicon-plus-sign\" aria-hidden=\"true\"> </span> Agregar Caja
\t</button>
</a><div class=\"spacer-25\"></div>
";
        // line 15
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "APYDataGridBundle::blocks_adminUsuarioMain.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminCajaMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 15,  47 => 10,  44 => 9,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

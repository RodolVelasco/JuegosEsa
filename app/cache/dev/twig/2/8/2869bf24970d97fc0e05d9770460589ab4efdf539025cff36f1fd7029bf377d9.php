<?php

/* PDBundle:SuperAdmin:adminTicketMain.html.twig */
class __TwigTemplate_2869bf24970d97fc0e05d9770460589ab4efdf539025cff36f1fd7029bf377d9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminTicketMain.html.twig", 1);
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
        echo "
<h1 class=\"page-header\">Tickets</h1>\t

<!-- ";
        // line 40
        echo " -->
";
        // line 41
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "APYDataGridBundle::blocks_adminTicketMain.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminTicketMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 41,  49 => 40,  44 => 9,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

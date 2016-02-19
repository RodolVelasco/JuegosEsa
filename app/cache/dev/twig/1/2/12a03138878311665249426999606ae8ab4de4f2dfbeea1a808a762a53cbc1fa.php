<?php

/* PDBundle:SuperAdmin:adminUsuarioMain.html.twig */
class __TwigTemplate_12a03138878311665249426999606ae8ab4de4f2dfbeea1a808a762a53cbc1fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminUsuarioMain.html.twig", 1);
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
\t";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<h1 class=\"page-header\">Usuarios</h1>
<a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("super_admin_add_usuario");
        echo "\">
\t<button class=\"btn btn-default\">
\t\t<span class=\"glyphicon glyphicon-plus-sign\" aria-hidden=\"true\">
\t\t</span>
\t\tAgregar Usuario
\t</button>
</a><div class=\"spacer-25\"></div>
";
        // line 18
        echo $this->env->getExtension('datagrid_twig_extension')->getGrid((isset($context["grid"]) ? $context["grid"] : $this->getContext($context, "grid")), "APYDataGridBundle::blocks_adminUsuarioMain.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminUsuarioMain.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 18,  43 => 11,  40 => 10,  37 => 9,  32 => 4,  29 => 3,  11 => 1,);
    }
}

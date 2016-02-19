<?php

/* PDBundle:Default:main.html.twig */
class __TwigTemplate_92b4c3c574173d4efb561377b0c5acc82fefbc56320923cab3b0089c4570dec9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:Default:main.html.twig", 1);
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
        // line 10
        echo "\t
\t<p>
\t<div class=\"panel panel-default\">
\t\t
\t\t<div class=\"panel-heading\">
\t\t\t<h4>Panel Principal</h4>
\t\t</div>
\t\t
\t\t<div class=\"panel-body\">
\t\t<table class=\"table table-hover table-striped\">
\t    <thead>
\t\t        <tr>
\t\t            <th>No.</th>
\t\t            <th>Nombre</th>
\t\t            <th>Acción</th>
\t\t        </tr>
\t\t    </thead>
\t\t    <tbody>
\t\t        <tr>
\t\t            <td>1</td>
\t\t            <td>
\t\t            \tOpción A
\t\t\t\t\t</td>
\t\t            <td>
\t\t            \t<a class=\"btn btn-default btn-xs\" href=\"#\">Abrir</a>
\t\t            </td>
\t\t        </tr>
\t\t        <tr>
\t\t            <td>2</td>
\t\t            <td>
\t\t            \tOpción B
\t\t            </td>
\t\t            <td>
\t\t            \t<a class=\"btn btn-default btn-xs\" href=\"#\">Abrir</a>
\t\t\t\t\t</td>
\t\t        </tr>
\t\t        <tr>
\t\t            <td>3</td>
\t\t            <td>
\t\t            \tOpción C
\t\t            </td>
\t\t            <td>
\t\t            \t<a class=\"btn btn-default btn-xs\" href=\"#\">Abrir</a>
\t\t            </td>
\t\t        </tr>
\t\t        <tr>
\t\t            <td>4</td>
\t\t            <td>
\t\t\t\t\t\tOpción D
\t\t\t\t\t</td>
\t\t            <td>
\t\t\t\t\t\t<a class=\"btn btn-default btn-xs\" href=\"#\">Abrir</a>
\t\t\t\t\t</td>
\t\t        </tr>
\t\t        <tr>
\t\t            <td>5</td>
\t\t            <td>
\t\t\t\t\t\tOpción E
\t\t            </td>
\t\t            <td>
\t\t            \t<a class=\"btn btn-default btn-xs\" href=\"#\">Abrir</a>
\t\t            </td>
\t\t        </tr>
\t\t    </tbody>
\t\t</table>
\t\t</div>
\t</div>
\t</p>
";
    }

    public function getTemplateName()
    {
        return "PDBundle:Default:main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 10,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

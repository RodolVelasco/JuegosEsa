<?php

/* PDBundle:SuperAdmin:adminSupervisorVendedorAdd.html.twig */
class __TwigTemplate_d818935571cdaa426270ba07c16b15a9d6458407bb5cdda0f4f4f68528ec54d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminSupervisorVendedorAdd.html.twig", 1);
        $this->blocks = array(
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
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1 class=\"page-header\">Supervisor</h1>
<strong>Empleado:</strong> ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["supervisor"]) ? $context["supervisor"] : $this->getContext($context, "supervisor")), "html", null, true);
        echo "<diV class=\"spacer-10\"></div>
";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start');
        echo "
<div class=\"panel-group\" id=\"accordion\">
\t<div class=\"panel panel-default\">
\t\t<div class=\"panel-heading\" data-toggle=\"collapse\" ";
        // line 10
        echo " href=\"#vendedores_asignados\">
\t    \t<h4 class=\"panel-title\">
\t        \tVendedores asignados
\t      \t</h4>
\t    </div>
\t    <div id=\"vendedores_asignados\" class=\"panel-collapse collapse in\">
\t    \t<div class=\"panel-body\">
\t    \t\t<div class=\"row\">
\t\t    \t\t";
        // line 18
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "asignados", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["supervisados"]) {
            // line 19
            echo "\t\t    \t\t\t<div class=\"col-md-4\">
\t\t\t    \t\t\t";
            // line 20
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["supervisados"], 'widget', array("checked" => true));
            echo "
\t\t\t    \t\t\t";
            // line 21
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["supervisados"], 'label');
            echo "
\t\t\t\t\t\t\t";
            // line 22
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["supervisados"], 'errors');
            echo "
\t\t\t\t\t\t</div>
\t\t    \t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['supervisados'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t\t    \t</div>
\t      \t</div>
\t    </div>
\t</div>
</div>
";
        // line 31
        echo "<div class=\"panel-group\" id=\"accordion\">
\t<div class=\"panel panel-default\">
\t\t<div class=\"panel-heading\" data-toggle=\"collapse\" ";
        // line 33
        echo " href=\"#vendedores_sin_asignar\">
\t    \t<h4 class=\"panel-title\">
\t        \tVendedores sin supervisor
\t      \t</h4>
\t    </div>
\t    <div id=\"vendedores_sin_asignar\" class=\"panel-collapse collapse in\">
\t    \t<div class=\"panel-body\">
\t    \t\t<div class=\"row\">
\t    \t\t\t";
        // line 41
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "no_asignados", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["sinSupervisar"]) {
            // line 42
            echo "\t\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t\t";
            // line 43
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["sinSupervisar"], 'widget');
            echo "
\t\t\t    \t\t\t";
            // line 44
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["sinSupervisar"], 'label');
            echo "
\t\t\t\t\t\t\t";
            // line 45
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($context["sinSupervisar"], 'errors');
            echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sinSupervisar'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "\t\t\t\t</div>
\t      \t</div>
\t    </div>
\t</div>
</div>
<div class=\"row\">
\t<div class=\"col-md-4\"></div>
\t<div class=\"col-md-4\">";
        // line 55
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "guardar", array()), 'widget');
        echo "&nbsp;&nbsp;&nbsp;";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "no_guardar", array()), 'widget');
        echo "</div>
\t<div class=\"col-md-4\"></div>
</div>
";
        // line 58
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminSupervisorVendedorAdd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 58,  132 => 55,  123 => 48,  114 => 45,  110 => 44,  106 => 43,  103 => 42,  99 => 41,  89 => 33,  85 => 31,  78 => 25,  69 => 22,  65 => 21,  61 => 20,  58 => 19,  54 => 18,  44 => 10,  38 => 7,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}

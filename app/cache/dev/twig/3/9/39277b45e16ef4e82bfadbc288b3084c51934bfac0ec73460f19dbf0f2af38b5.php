<?php

/* PDBundle:SuperAdmin:superAdminJuegoUpdate.html.twig */
class __TwigTemplate_39277b45e16ef4e82bfadbc288b3084c51934bfac0ec73460f19dbf0f2af38b5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:superAdminJuegoUpdate.html.twig", 1);
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
\t<script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("javascript/jquery.price_format.2.0.min.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<h1 class=\"page-header\">Modificar juego</h1>
";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start');
        echo "
\t";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'row');
        echo "
\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "numero_tickets", array()), 'row', array("read_only" => true));
        echo "
\t";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "precio_x_ticket", array()), 'row', array("read_only" => true));
        echo "
\t";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'row');
        echo "
";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
<script>
\$(document).ready(function(){
\t //alert('hola');
\t //\$('#precio_x_ticket').priceFormat();
\t \$('#juegotype_precio_x_ticket').priceFormat({prefix: '',clearPrefix: true});
\t //\$('#juegotype_precio_x_ticket').val('12');
});
</script>
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:superAdminJuegoUpdate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 16,  67 => 15,  63 => 14,  59 => 13,  55 => 12,  51 => 11,  48 => 10,  45 => 9,  39 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

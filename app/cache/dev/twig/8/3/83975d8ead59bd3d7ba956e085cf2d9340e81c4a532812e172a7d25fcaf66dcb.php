<?php

/* PDBundle:SuperAdmin:superAdminJuegoAdd.html.twig */
class __TwigTemplate_83975d8ead59bd3d7ba956e085cf2d9340e81c4a532812e172a7d25fcaf66dcb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:superAdminJuegoAdd.html.twig", 1);
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
        echo "<h1 class=\"page-header\">Agregar juego</h1>
<div class=\"col-md-12\">
\t";
        // line 12
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start', array("attr" => array("class" => "form-horizontal col-md-8")));
        echo "
\t\t<div class=\"form-group\">
\t\t\t";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Nombre"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "numero_tickets", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Número de tickets"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "numero_tickets", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 26
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "precio_x_ticket", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Precio por ticket"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "precio_x_ticket", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"form-group\">
\t\t\t";
        // line 33
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Estado"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 35
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t
\t\t<div class=\"form-group\">
      \t\t<div class=\"col-sm-offset-6 col-sm-6\">
\t\t\t\t";
        // line 41
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "registrar_juego", array()), 'row', array("label" => "Registrar juego", "attr" => array("class" => "btn btn-primary")));
        echo "
\t\t\t</div>
\t\t</div>
\t";
        // line 44
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
</div>
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
        return "PDBundle:SuperAdmin:superAdminJuegoAdd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  114 => 44,  108 => 41,  99 => 35,  94 => 33,  86 => 28,  81 => 26,  74 => 22,  69 => 20,  62 => 16,  57 => 14,  52 => 12,  48 => 10,  45 => 9,  39 => 6,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

<?php

/* PDBundle:SuperAdmin:adminUsuarioAdd.html.twig */
class __TwigTemplate_619eaf81ecef1c5a3514cf20b7b42cc09fd49fbfb86c299762fefdf53b2c316c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminUsuarioAdd.html.twig", 1);
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
        echo "<h1 class=\"page-header\">Agregar usuario</h1>
<div class=\"col-md-12\">
\t";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start', array("attr" => array("class" => "form-horizontal col-md-8")));
        echo "
\t";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'errors');
        echo "
\t<fieldset>
\t\t<legend>Datos personales</legend>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Nombre"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellidos", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Apellidos"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellidos", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 28
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "dui", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Dui"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 30
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "dui", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 34
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_nacimiento", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Fecha de nacimiento"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 36
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_nacimiento", array()), 'widget', array("type" => "text", "attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 40
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "direccion", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Dirección"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 42
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "direccion", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t</fieldset>
\t\t<legend>Datos de acceso</legend>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 48
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "username", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Nombre de usuario"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 50
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "username", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 54
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "password", array()), "first", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label")));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 56
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "password", array()), "first", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 60
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "password", array()), "second", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label")));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 62
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "password", array()), "second", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 66
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Correo electrónico"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 68
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 72
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tipo_usuario", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label", "separator" => ""), "label" => "Tipo usuario"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 74
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tipo_usuario", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 78
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Estado"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 80
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t</fieldset>
\t<div class=\"form-group\">
  \t\t<div class=\"col-sm-offset-6 col-sm-6\">
\t\t\t";
        // line 86
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "registrar_usuario", array()), 'row', array("label" => "Registrar usuario", "attr" => array("class" => "btn btn-primary")));
        echo "
\t\t</div>
\t</div>
\t";
        // line 89
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
</div>
<script>
\$(document).ready(function(){
    //alert(\"1\");
    \$(\"#pd_appbundle_usuariotype_fecha_nacimiento\").datepicker({
    \tminDate: new Date(1900,1-1,1), maxDate: '-18Y',
      \t//dateFormat: 'dd/mm/yy',
      \tdateFormat: 'yy-mm-dd',
      \tdefaultDate: new Date(1990,1-1,1),
      \tchangeMonth: true,
      \tchangeYear: true,
      \tyearRange: '-110:-18'
    });
    alert(\$(\"#pd_appbundle_usuariotype_fecha_nacimiento\").val());
});
</script>
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminUsuarioAdd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 89,  195 => 86,  186 => 80,  181 => 78,  174 => 74,  169 => 72,  162 => 68,  157 => 66,  150 => 62,  145 => 60,  138 => 56,  133 => 54,  126 => 50,  121 => 48,  112 => 42,  107 => 40,  100 => 36,  95 => 34,  88 => 30,  83 => 28,  76 => 24,  71 => 22,  64 => 18,  59 => 16,  52 => 12,  48 => 11,  44 => 9,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

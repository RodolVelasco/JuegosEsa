<?php

/* PDBundle:SuperAdmin:adminSucursalAdd.html.twig */
class __TwigTemplate_6d0889d4d9fff3b1fc69c6a6435cad911f339043c666e59dda99a00257550c17 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminSucursalAdd.html.twig", 1);
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
        echo "\t<h1 class=\"page-header\">Agregar sucursal</h1>
\t<div class=\"col-md-12\">
\t";
        // line 11
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start', array("attr" => array("class" => "form-horizontal col-md-8")));
        echo "
\t\t<div class=\"form-group\">
\t\t\t";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Nombre"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Estado"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "estado", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
\t\t\t";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_ingreso_sistema", array()), 'label', array("label_attr" => array("class" => "col-sm-3 control-label"), "label" => "Fecha creación"));
        echo "
\t\t\t<div class=\"col-sm-9\">
\t\t\t\t";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_ingreso_sistema", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
\t\t\t</div>
\t\t</div>
\t\t<div class=\"form-group\">
      \t\t<div class=\"col-sm-offset-6 col-sm-6\">
\t\t\t\t";
        // line 32
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "registrar_sucursal", array()), 'row', array("label" => "Registrar sucursal", "attr" => array("class" => "btn btn-primary")));
        echo "
\t\t\t</div>
\t\t</div>
\t";
        // line 35
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
\t</div>
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminSucursalAdd.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  96 => 35,  90 => 32,  82 => 27,  77 => 25,  70 => 21,  65 => 19,  58 => 15,  53 => 13,  48 => 11,  44 => 9,  41 => 8,  35 => 5,  32 => 4,  29 => 3,  11 => 1,);
    }
}

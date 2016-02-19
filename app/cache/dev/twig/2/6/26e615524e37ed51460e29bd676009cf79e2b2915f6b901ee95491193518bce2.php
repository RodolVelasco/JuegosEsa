<?php

/* PDBundle:Reporte:canjeEfectivo.html.twig */
class __TwigTemplate_26e615524e37ed51460e29bd676009cf79e2b2915f6b901ee95491193518bce2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:Reporte:canjeEfectivo.html.twig", 1);
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<h1 class=\"page-header\">Reporte - Canje y efectivo</h1>
";
        // line 4
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start');
        echo "
<div class=\"form-group\">
    ";
        // line 6
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_inicio", array()), 'label');
        echo "
    ";
        // line 7
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_inicio", array()), 'widget');
        echo "
    ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_inicio", array()), 'errors');
        echo "
</div>
<div class=\"form-group\">
    ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_fin", array()), 'label');
        echo "
    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_fin", array()), 'widget');
        echo "
    ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "fecha_fin", array()), 'errors');
        echo "
</div>
";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "generar", array()), 'widget');
        echo "
";
        // line 16
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
<script>
\$(document).ready(function(){
    //alert(\"1\");
    \$(\"#form_fecha_inicio\").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(selected) {
            \$(\"#form_fecha_fin\").datepicker(\"option\",\"minDate\", selected)
        }

    });
    \$(\"#form_fecha_fin\").datepicker({
        dateFormat: 'yy-mm-dd',
        onSelect: function(selected) {
            \$(\"#form_fecha_inicio\").datepicker(\"option\",\"maxDate\", selected)
        }
    });


    \$('#form_generar').click(function(e) {
        if( \$(\"#form_fecha_inicio\").val().length > 0 && \$(\"#form_fecha_fin\").val().length > 0 ){
            \$('form[name=\"form\"]').submit();

        }else if( (\$(\"#form_fecha_inicio\").val().length < 1) && (\$(\"#form_fecha_fin\").val().length < 1) ){
            \$('form[name=\"form\"]').submit();
        }else{
            alert(\"Debe elegir ambas fechas o ninguna de ellas\");
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "PDBundle:Reporte:canjeEfectivo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 16,  66 => 15,  61 => 13,  57 => 12,  53 => 11,  47 => 8,  43 => 7,  39 => 6,  34 => 4,  31 => 3,  28 => 2,  11 => 1,);
    }
}

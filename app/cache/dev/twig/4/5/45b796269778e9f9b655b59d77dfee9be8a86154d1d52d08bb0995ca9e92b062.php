<?php

/* ::base.html.twig */
class __TwigTemplate_45b796269778e9f9b655b59d77dfee9be8a86154d1d52d08bb0995ca9e92b062 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <!-- Bootstrap -->
\t    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t    
\t    <!-- Bootstrap theme -->
    \t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap-theme.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    \t<link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/sticky-footer.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

    \t<link href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/my-custom-css.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    \t
    \t<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
\t    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->
\t    <!-- <script src=\"../../assets/js/ie-emulation-modes-warning.js\"></script> -->
\t
\t    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
\t    <!--[if lt IE 9]>
\t      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
\t      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
\t    <![endif]-->
\t    
\t    
\t    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
\t    <!-- ";
        // line 30
        echo " -->
\t    <script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("javascript/jquery-2.0.3.js"), "html", null, true);
        echo "\"></script>

\t\t<!-- jquery ui -->
\t    <link rel=\"stylesheet\" href=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css\" />
\t    <script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js\"></script>
    


\t    <!-- Include all compiled plugins (below), or include individual files as needed -->
\t    <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
\t    ";
        // line 41
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 42
        echo "    </head>
    <body>
\t  \t<!-- <div class=\"container clear-top\"> -->
\t\t<div class=\"container\">
\t    \t";
        // line 47
        echo "\t    \t";
        // line 48
        echo "\t    \t";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('http_kernel')->controller("PDBundle:Default:mainMenu"));
        echo "
\t        ";
        // line 49
        $this->displayBlock('body', $context, $blocks);
        // line 50
        echo "\t        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 51
        echo "\t\t</div>
\t    <!-- <footer class=\"footer\">
      \t\t<div class=\"container\">
        \t\t<p class=\"text-muted text-center\">Juegos El Salvador &copy; Todos los derechos reservados 2015. </p>
      \t\t</div>
    \t</footer> -->

    \t<div id=\"footer\">
\t\t\t<div class=\"navbar navbar-fixed-bottom\">
\t\t        <div class=\"navbar-inner\">
\t\t          <div class=\"container\">
\t\t          \t\t<p class=\"text-muted text-center\">Juegos El Salvador &copy; Todos los derechos reservados 2015. </p>
\t\t            \t\t<!-- <ul class=\"nav\">
\t\t              \t\t\t<li><a href=\"#\">Menu 1</a></li>
\t\t              \t\t\t<li><a href=\"#\">Menu 2</a></li>
\t\t            \t\t</ul> -->
\t\t          \t\t</div>
\t\t        \t</div>
\t\t    \t</div>
\t\t\t</div>
\t\t</div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Juegos El Salvador!";
    }

    // line 41
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 49
    public function block_body($context, array $blocks = array())
    {
    }

    // line 50
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 50,  149 => 49,  144 => 41,  138 => 5,  111 => 51,  108 => 50,  106 => 49,  101 => 48,  99 => 47,  93 => 42,  91 => 41,  87 => 40,  75 => 31,  72 => 30,  55 => 16,  50 => 14,  45 => 12,  39 => 9,  34 => 7,  29 => 5,  23 => 1,);
    }
}

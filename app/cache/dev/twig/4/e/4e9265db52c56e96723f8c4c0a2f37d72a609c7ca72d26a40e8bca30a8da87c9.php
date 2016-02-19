<?php

/* ::baseLogin.html.twig */
class __TwigTemplate_4e9265db52c56e96723f8c4c0a2f37d72a609c7ca72d26a40e8bca30a8da87c9 extends Twig_Template
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
\t    ";
        // line 23
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 24
        echo "\t    
\t    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
\t    <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("javascript/jquery-1.11.3.min.js"), "html", null, true);
        echo "\"></script>
\t    <!-- Include all compiled plugins (below), or include individual files as needed -->
\t    <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    </head>
    <body>
\t    <div class=\"container\">
\t        \t";
        // line 32
        $this->displayBlock('body', $context, $blocks);
        // line 33
        echo "\t        \t";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 34
        echo "\t     </div>
    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Juegos El Salvador!";
    }

    // line 23
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 32
    public function block_body($context, array $blocks = array())
    {
    }

    // line 33
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::baseLogin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 33,  100 => 32,  95 => 23,  89 => 5,  82 => 34,  79 => 33,  77 => 32,  70 => 28,  65 => 26,  61 => 24,  59 => 23,  45 => 12,  39 => 9,  34 => 7,  29 => 5,  23 => 1,);
    }
}

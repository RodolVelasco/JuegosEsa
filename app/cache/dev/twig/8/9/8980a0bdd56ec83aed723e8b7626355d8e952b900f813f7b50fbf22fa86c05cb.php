<?php

/* PDBundle:SuperAdmin:adminTicketUpdate.html.twig */
class __TwigTemplate_8980a0bdd56ec83aed723e8b7626355d8e952b900f813f7b50fbf22fa86c05cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "PDBundle:SuperAdmin:adminTicketUpdate.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
<style type=\"text/css\">
    
.table-borderless td,
.table-borderless th {
    border: 1 !important;
    border-right-width: 0px  !important;
    border-left-width: 0px  !important;
}

</style>
";
    }

    // line 18
    public function block_javascripts($context, array $blocks = array())
    {
        // line 19
        echo "    <!-- <script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("javascript/jquery-2.0.3.js"), "html", null, true);
        echo "\"></script> -->

    <!-- jquery ui -->
    <!-- <link rel=\"stylesheet\" href=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css\" /> -->
    <!-- <script src=\"//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js\"></script> -->
    
    <!-- <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dacicontratos/js/set_table_controlpago.js"), "html", null, true);
        echo "\"></script> -->
    <!-- <script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dacicontratos/js/jquery.numberformatter-1.2.4.js"), "html", null, true);
        echo "\"></script> -->
    
";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
        // line 31
        echo "<h1 class=\"page-header\">Información de libreta</h1>

<div class=\"table-responsive\">
<table class=\"table table-borderless table-bordered table-condensed\">
    <tbody>
        <tr>
            <td class=\"col-md-3\"><h4>Juego</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "caja", array()), "juego", array()), "nombre", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Caja</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "caja", array()), "numeroCarton", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Correlativo</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "correlativo", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Vendedor</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "vendedor", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Precio al vendedor</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "precioAlVendedor", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Precio acumulado</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "precioAcumulado", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Premio acumulado</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "premioAcumulado", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Raspable gratis acumulado</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "raspableGratisAcumulado", array()), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Fecha asignada al vendedor</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td><h4><small>";
        // line 79
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "fechaAsignacionVendedor", array()), "Y-m-d"), "html", null, true);
        echo "</small></h4></td>
        </tr>
        <tr>
            <td class=\"col-md-3\"><h4>Fecha estado final</h4></td>
            <!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
            <td>
                ";
        // line 85
        if ((null === $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "fechaEstadoFinal", array()))) {
            // line 86
            echo "                    <h4><small>No finalizado</small></h4>
                ";
        } else {
            // line 88
            echo "                    <h4><small>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "fechaEstadoFinal", array()), "Y-m-d"), "html", null, true);
            echo "</small></h4>
                ";
        }
        // line 90
        echo "            </td>
        </tr>
    </tbody>
</table>
</div>
<h1 class=\"page-header\"><small>Tickets</small></h1>
";
        // line 96
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_start', array("attr" => array("id" => "formTicket")));
        echo "
<table class=\"table table-hover table-bordered\" id=\"tick\" data-prototype=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tickets", array()), "vars", array()), "prototype", array()), 'widget'));
        echo "\">
    <thead>
      <tr class=\"active\">
         <th class=\"active\">Número ticket</th>
         <!-- ";
        // line 101
        echo " -->
         <th class=\"active\">Fecha recibido</th>
         <th class=\"active\">Estado</th>
         <th class=\"active\">Premio</th>
         <th class=\"active\"><div align=\"left\">Acción</div></th>
      </tr>
    </thead>
    ";
        // line 108
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "tickets", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["tick"]) {
            // line 109
            echo "        <tr>
            <td><div align=\"left\">";
            // line 110
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["tick"], "numeroTicket", array()), 'widget');
            echo "</div></td>
            <!-- ";
            // line 111
            echo " -->
            <td><div align=\"left\" id=\"fechaRecibido\" class=\"fechaRec\">";
            // line 112
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["tick"], "fechaRecibido", array()), 'widget', array("type" => "text"));
            echo "</div></td>
            ";
            // line 114
            echo "
            <!-- 
            ";
            // line 117
            echo "            ";
            // line 118
            echo "            -->
            <td><div align=\"left\">";
            // line 119
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["tick"], "estado", array()), 'widget');
            echo "</div></td>
            <td><div align=\"left\">";
            // line 120
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute($context["tick"], "premio", array()), 'widget');
            echo "</div></td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tick'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "</table><br/>
<div align=\"center\">
    ";
        // line 125
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "guardar_tickets_y_regresar", array()), 'widget');
        echo "&nbsp;&nbsp;&nbsp;&nbsp;
    ";
        // line 126
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "guardar_tickets", array()), 'widget');
        echo "&nbsp;&nbsp;&nbsp;&nbsp;
    ";
        // line 127
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "no_guardar_tickets", array()), 'widget');
        echo "
</div>
<br/><br/><br/><br/><br/>
<script>
/**
     * Created by rodolvelasco on 19-11-14.
     */
    // Get the ul that holds the collection of tags
    var collectionHolder = \$('table.table-hover.table-bordered');

    // setup an \"add a tag\" link
    //var \$addSaldoRowLink = \$('<td colspan=\"7\"><div align=\"right\">Saldo</div></td><td colspan=\"2\" class=\"timesheet\"><div id=\"total_amount\"></div></td>');
    //var \$addControlPagoLink = \$('<td colspan=\"5\"><div align=\"center\"><a href=\"#\" class=\"add_controlpago_link\">Agregar Control Pago</a></div></td>');
    //var \$addTicketLink = \$('<td colspan=\"5\"><div align=\"center\"><a href=\"#\" class=\"add_ticket_link\">Agregar ticket</a></div></td>');
    var \$addTicketLink = \$('<td colspan=\"6\"><div align=\"center\"><a href=\"#\" class=\"add_ticket_link\"><button class=\"btn btn-default\" ><span class=\"glyphicon glyphicon-plus-sign\" aria-hidden=\"true\"> </span> Agregar ticket</button></a></div></td>');
    var \$newLinkLi  = \$('<tr></tr>').append(\$addTicketLink);

\$(document).ready(function(){
    //alert(\"1. Document Ready\");

    { //DATEPICKER
        var pre = 'fecha';
        var \$inp = \$('.' + pre);
        
        \$inp.each(function (k, v) {
            var \$second = jQuery(\$inp.get(k)).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });
    }

    /*
    \$(\"table.table-hover.table-bordered\").delegate(\"select[class=cambio_estado]\", \"change\", function() {
        \$(this).find('select[]'));
            LoadSeries(\$(this).val());
    });*/
    
    //var conta = 0;
    collectionHolder.find('tr').each(function(k) {
        //if(k == 1 )alert(\"2. CollectionHolder\");

        //alert(\"TR => \" + k);
        if ( !(\$( this ).hasClass( \"active\" )) ) {
            addTicketFormDeleteLink(\$(this));
        }

        \$(this).find('select[class=cambio_estado]').on('change', function(){
            if(\$(this).find(\":selected\").val() == \"PREMIADO\"){
                //alert(\"PREMIADO\"); /*+ \$(this).closest('td').next('td').find('select[class=cambio_premio]').attr('id')*/
                \$(this).closest('td').next('td').find('select[class=cambio_premio]').val(\"RASPABLE_GRATIS\");
                //BUENO
                //\$(this).closest('td').next('td').find('select[class=cambio_premio]').on('change', function(event){
                    //alert(\"funcionó\");
                    //alert(\"Funcionó => \" + \$(this).closest('td').next('td').find('select[class=cambio_premio]').val() );
                    //BUENO
                    //alert(\"Funcionó => \" + event.target.id + \" - \"+ \$(this).find(':selected').val() );
                //BUENO
                //});
            }else{
                //alert(\"NO SOY PREMIADO\");
                \$(this).closest('td').next('td').find('select[class=cambio_premio]').val(\"\");
            }

                
        });
    }); // Fin collectionHolder

    //alert(\"2.1\");
    collectionHolder.append(\$newLinkLi);
    //alert(\"2.2\");
    
    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    collectionHolder.data('index', collectionHolder.find(':input').length);

    \$addTicketLink.on('click', function(e) {
        //alert(\"3. addTicketLink\");
        // prevent the link from creating a \"#\" on the URL
        e.preventDefault();

        // add a new tag form (see next code block)
        addTicketForm(collectionHolder, \$newLinkLi);
        
        {//DATEPICKER
            var pre = 'fecha';
            var \$inp = \$('.' + pre);
            
            
            \$inp.each(function (k, v) {
                var \$second = jQuery(\$inp.get(k)).datepicker({
                    dateFormat: 'yy-mm-dd'
                });
            });
        }

        {
            collectionHolder.find('tr').each(function(k) {
                \$(this).find('select[class=cambio_estado]').on('change', function(){
                    if(\$(this).find(\":selected\").val() == \"PREMIADO\"){
                        \$(this).closest('td').next('td').find('select[class=cambio_premio]').val(\"RASPABLE_GRATIS\");
                    }else{
                        \$(this).closest('td').next('td').find('select[class=cambio_premio]').val(\"\");
                    }
                });
            }); // Fin collectionHolder
        }

    });

}); // Fin Document Ready

function addTicketForm(collectionHolder, \$newLinkLi) {
    //alert(\"4. addTicketForm\");
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');

    ";
        // line 243
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "caja", array()), "juego", array()), "id", array()) == 1)) {
            // line 244
            echo "    var prototype_aux = '<td><div align=\"left\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___numeroTicket\" name=\"libreta_to_ticket_type[tickets][__name__][numeroTicket]\" required=\"required\" maxlength=\"25\" /></div></td>'
                       +'<td><div align=\"left\" id=\"fechaRecibido\" class=\"fechaRec\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___fechaRecibido\" name=\"libreta_to_ticket_type[tickets][__name__][fechaRecibido]\" required=\"required\" class=\"fecha\" /></div></td>'
                       +'<td><div align=\"left\"><select id=\"libreta_to_ticket_type_tickets___name___estado\" name=\"libreta_to_ticket_type[tickets][__name__][estado]\" class=\"cambio_estado\"><option value=\"EN_RUTA\">En ruta</option><option value=\"EN_SALA_VENTAS\">En sala de ventas</option><option value=\"VENDIDO\">Vendido</option><option value=\"PREMIADO\">Premiado</option></select></div></td>'
                       +'<td><div align=\"left\"><select id=\"libreta_to_ticket_type_tickets___name___premio\" name=\"libreta_to_ticket_type[tickets][__name__][premio]\" class=\"cambio_premio\"><option value=\"\">-- Sin premio --</option><option value=\"RASPABLE_GRATIS\">Raspable gratis</option><option value=\"1\">\$1</option><option value=\"3\">\$3</option><option value=\"5\">\$5</option><option value=\"100\">\$100</option><option value=\"2500\">\$2500</option></select></div></td>';
    ";
        }
        // line 249
        echo "    ";
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["libreta"]) ? $context["libreta"] : $this->getContext($context, "libreta")), "caja", array()), "juego", array()), "id", array()) == 2)) {
            // line 250
            echo "    var prototype_aux = '<td><div align=\"left\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___numeroTicket\" name=\"libreta_to_ticket_type[tickets][__name__][numeroTicket]\" required=\"required\" maxlength=\"25\" /></div></td>'
                       +'<td><div align=\"left\" id=\"fechaRecibido\" class=\"fechaRec\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___fechaRecibido\" name=\"libreta_to_ticket_type[tickets][__name__][fechaRecibido]\" required=\"required\" class=\"fecha\" /></div></td>'
                       +'<td><div align=\"left\"><select id=\"libreta_to_ticket_type_tickets___name___estado\" name=\"libreta_to_ticket_type[tickets][__name__][estado]\" class=\"cambio_estado\"><option value=\"EN_RUTA\">En ruta</option><option value=\"EN_SALA_VENTAS\">En sala de ventas</option><option value=\"VENDIDO\">Vendido</option><option value=\"PREMIADO\">Premiado</option></select></div></td>'
                       +'<td><div align=\"left\"><select id=\"libreta_to_ticket_type_tickets___name___premio\" name=\"libreta_to_ticket_type[tickets][__name__][premio]\" class=\"cambio_premio\"><option value=\"\">-- Sin premio --</option><option value=\"RASPABLE_GRATIS\">Raspable gratis</option><option value=\"2\">\$2</option><option value=\"5\">\$5</option><option value=\"10\">\$10</option><option value=\"20\">\$20</option><option value=\"100\">\$100</option><option value=\"7000\">\$7000</option></select></div></td>';
    ";
        }
        // line 254
        echo " 
                        /*
                        '<td><div align=\"left\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___numeroTicket\" name=\"libreta_to_ticket_type[tickets][__name__][numeroTicket]\" required=\"required\" maxlength=\"25\" /></div></td>'
                       //+'<td><div align=\"left\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___numeroAleatorio\" name=\"libreta_to_ticket_type[tickets][__name__][numeroAleatorio]\" maxlength=\"1\" /></div></td>'
                       +'<td><div align=\"left\" id=\"fechaRecibido\" class=\"fechaRec\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___fechaRecibido\" name=\"libreta_to_ticket_type[tickets][__name__][fechaRecibido]\" required=\"required\" class=\"fecha\" /></div></td>'
                       +'<td><div align=\"left\"><input type=\"text\" id=\"libreta_to_ticket_type_tickets___name___premio\" name=\"libreta_to_ticket_type[tickets][__name__][premio]\" /></div></td>'
                       +'<td><div align=\"left\"><select id=\"libreta_to_ticket_type_tickets___name___estado\" name=\"libreta_to_ticket_type[tickets][__name__][estado]\"><option value=\"EN_RUTA\">En ruta</option><option value=\"EN_SALA_VENTAS\">En sala de ventas</option><option value=\"VENDIDO\">Vendido</option><option value=\"PREMIADO\">Premiado</option></select></div></td>';
                        */
                        /*
                        '<td><div align=\"left\"><input type=\"date\" id=\"controlPagoUnidadToCc_controlPagos___name___fecha\" name=\"controlPagoUnidadToCc[controlPagos][__name__][fecha]\" required=\"required\" style=\"width: 125px;\" class=\"fecha\" /></div></td>'
                        +'<td><div align=\"left\"><input type=\"text\" id=\"controlPagoUnidadToCc_controlPagos___name___numeroActaRecepcion\" name=\"controlPagoUnidadToCc[controlPagos][__name__][numeroActaRecepcion]\" style=\"width: 100px;\" maxlength=\"12\" required=\"required\" /></div></td>'
                        +'<td><div align=\"left\"><input type=\"text\" id=\"controlPagoUnidadToCc_controlPagos___name___numeroFactura\" name=\"controlPagoUnidadToCc[controlPagos][__name__][numeroFactura]\" style=\"width: 130px;\" maxlength=\"15\" required=\"required\" /></div></td>'
                        +'<td><div align=\"left\"><input type=\"date\" id=\"controlPagoUnidadToCc_controlPagos___name___fechaQuedan\" name=\"controlPagoUnidadToCc[controlPagos][__name__][fechaQuedan]\" required=\"required\" style=\"width: 125px;\" class=\"fechQuedan\" /></div></td>'
                        +'<td><div align=\"left\" id=\"fechaVencimiento\" class=\"fechaQueVen\"></div></td>'
                        +'<td><div align=\"left\"><input type=\"text\" id=\"controlPagoUnidadToCc_controlPagos___name___numeroQuedan\" name=\"controlPagoUnidadToCc[controlPagos][__name__][numeroQuedan]\" style=\"width: 100px;\" maxlength=\"12\" required=\"required\" /></div></td>'
                        +'<td><div align=\"left\"><input type=\"text\" id=\"controlPagoUnidadToCc_controlPagos___name___valorFactura\" name=\"controlPagoUnidadToCc[controlPagos][__name__][valorFactura]\" class=\"timesheet2\" style=\"width: 100px;\" maxlength=\"12\" required=\"required\" /></div></td>'
                        +'<td class=\"saldo_parcial\"><div id=\"amount_parcial\"></div></td>';
                        */    
    //alert(prototype);
    //alert(prototype_aux);

    // get the new index
    var index = collectionHolder.data('index');

    //alert(index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    //var newForm = prototype.replace(/__name__/g, index);
    var newFormAux = prototype_aux.replace(/__name__/g, index);
    
    
    
    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);

    //alert(newForm);

    // Display the form in the page in an li, before the \"Add a tag\" link li
    //var \$newFormLi = \$('<tr></tr>').append(newForm);
    var \$newFormLi = \$('<tr></tr>').append(newFormAux);
    
    \$newLinkLi.before(\$newFormLi);

    // add a delete link to the new form
    addTicketFormDeleteLink(\$newFormLi);
}
function addTicketFormDeleteLink(\$tagFormLi){

    var \$removeFormA = \$('<td><a href=\"#\"><button class=\"btn btn-default btn-xs\" ><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"> </span> Borrar ticket</button></a></td>');
    \$tagFormLi.append(\$removeFormA);

    \$removeFormA.on('click', function(e) {
        // prevent the link from creating a \"#\" on the URL
        e.preventDefault();
        
        var c = confirm(\"Desea borrar el ticket seleccionado?\");
        
        if(c){
            // remove the li for the tag form
            \$tagFormLi.remove();
        }
    });
} // Fin addTicketFormDeleteLinkInit
</script>
";
        // line 319
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'form_end');
        echo "
";
    }

    public function getTemplateName()
    {
        return "PDBundle:SuperAdmin:adminTicketUpdate.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  459 => 319,  392 => 254,  385 => 250,  382 => 249,  375 => 244,  373 => 243,  254 => 127,  250 => 126,  246 => 125,  242 => 123,  233 => 120,  229 => 119,  226 => 118,  224 => 117,  220 => 114,  216 => 112,  213 => 111,  209 => 110,  206 => 109,  202 => 108,  193 => 101,  186 => 97,  182 => 96,  174 => 90,  168 => 88,  164 => 86,  162 => 85,  153 => 79,  145 => 74,  137 => 69,  129 => 64,  121 => 59,  113 => 54,  105 => 49,  97 => 44,  89 => 39,  79 => 31,  76 => 30,  69 => 26,  65 => 25,  55 => 19,  52 => 18,  36 => 5,  33 => 4,  30 => 3,  11 => 1,);
    }
}

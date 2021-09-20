<?php

/* base.html.twig */
class __TwigTemplate_93e2499d03c6402ea1e3906495568257ed0120721f7f5badb0e11600e82927c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body_id' => array($this, 'block_body_id'),
            'body' => array($this, 'block_body'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4080d4b4ba2078d1da159e5c445994d7a4e0d47fc39394dd2f4d0d0ece2965ff = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_4080d4b4ba2078d1da159e5c445994d7a4e0d47fc39394dd2f4d0d0ece2965ff->enter($__internal_4080d4b4ba2078d1da159e5c445994d7a4e0d47fc39394dd2f4d0d0ece2965ff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_7639618a138474635480e6b82adc03f8473e014ccac4415a5454e528dd00f9f7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7639618a138474635480e6b82adc03f8473e014ccac4415a5454e528dd00f9f7->enter($__internal_7639618a138474635480e6b82adc03f8473e014ccac4415a5454e528dd00f9f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 6
        echo "<!DOCTYPE html>
<html lang=\"en-US\">
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 18
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
</head>

<body id=\"";
        // line 21
        $this->displayBlock('body_id', $context, $blocks);
        echo "\">
";
        // line 22
        $this->displayBlock('body', $context, $blocks);
        // line 25
        echo "</body>
</html>
";
        
        $__internal_4080d4b4ba2078d1da159e5c445994d7a4e0d47fc39394dd2f4d0d0ece2965ff->leave($__internal_4080d4b4ba2078d1da159e5c445994d7a4e0d47fc39394dd2f4d0d0ece2965ff_prof);

        
        $__internal_7639618a138474635480e6b82adc03f8473e014ccac4415a5454e528dd00f9f7->leave($__internal_7639618a138474635480e6b82adc03f8473e014ccac4415a5454e528dd00f9f7_prof);

    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        $__internal_1beecb801b2910e26bdb9b63a859a75493a8c6c4ef65009e021c5ce13be91b8c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1beecb801b2910e26bdb9b63a859a75493a8c6c4ef65009e021c5ce13be91b8c->enter($__internal_1beecb801b2910e26bdb9b63a859a75493a8c6c4ef65009e021c5ce13be91b8c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_ae2f6b1e9e02eecb165b9ee8f72e2a1c0ca14a4537c50162f2234cbed72ed8e4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ae2f6b1e9e02eecb165b9ee8f72e2a1c0ca14a4537c50162f2234cbed72ed8e4->enter($__internal_ae2f6b1e9e02eecb165b9ee8f72e2a1c0ca14a4537c50162f2234cbed72ed8e4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "TODO List";
        
        $__internal_ae2f6b1e9e02eecb165b9ee8f72e2a1c0ca14a4537c50162f2234cbed72ed8e4->leave($__internal_ae2f6b1e9e02eecb165b9ee8f72e2a1c0ca14a4537c50162f2234cbed72ed8e4_prof);

        
        $__internal_1beecb801b2910e26bdb9b63a859a75493a8c6c4ef65009e021c5ce13be91b8c->leave($__internal_1beecb801b2910e26bdb9b63a859a75493a8c6c4ef65009e021c5ce13be91b8c_prof);

    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_15fbe7d370436db3edc7a17bef7e5da01277232e59f1c97b94afee98d365aebf = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_15fbe7d370436db3edc7a17bef7e5da01277232e59f1c97b94afee98d365aebf->enter($__internal_15fbe7d370436db3edc7a17bef7e5da01277232e59f1c97b94afee98d365aebf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_2fc061bde91693e2c2b1176597f4a0605591d3c86dcae514430813780e87eb44 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2fc061bde91693e2c2b1176597f4a0605591d3c86dcae514430813780e87eb44->enter($__internal_2fc061bde91693e2c2b1176597f4a0605591d3c86dcae514430813780e87eb44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        echo "        ";
        // line 14
        echo "        ";
        // line 15
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/index-style.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/form-style.css"), "html", null, true);
        echo "\">
    ";
        
        $__internal_2fc061bde91693e2c2b1176597f4a0605591d3c86dcae514430813780e87eb44->leave($__internal_2fc061bde91693e2c2b1176597f4a0605591d3c86dcae514430813780e87eb44_prof);

        
        $__internal_15fbe7d370436db3edc7a17bef7e5da01277232e59f1c97b94afee98d365aebf->leave($__internal_15fbe7d370436db3edc7a17bef7e5da01277232e59f1c97b94afee98d365aebf_prof);

    }

    // line 21
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_52c42ba0575ae4bcfe1dfc4d124d8ada2219218c8978b4e334baec7eb4481e55 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_52c42ba0575ae4bcfe1dfc4d124d8ada2219218c8978b4e334baec7eb4481e55->enter($__internal_52c42ba0575ae4bcfe1dfc4d124d8ada2219218c8978b4e334baec7eb4481e55_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        $__internal_5815098c95cff5360a07375c3e483b403cd000ce65033903a4f7772c2e4e48dc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5815098c95cff5360a07375c3e483b403cd000ce65033903a4f7772c2e4e48dc->enter($__internal_5815098c95cff5360a07375c3e483b403cd000ce65033903a4f7772c2e4e48dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        
        $__internal_5815098c95cff5360a07375c3e483b403cd000ce65033903a4f7772c2e4e48dc->leave($__internal_5815098c95cff5360a07375c3e483b403cd000ce65033903a4f7772c2e4e48dc_prof);

        
        $__internal_52c42ba0575ae4bcfe1dfc4d124d8ada2219218c8978b4e334baec7eb4481e55->leave($__internal_52c42ba0575ae4bcfe1dfc4d124d8ada2219218c8978b4e334baec7eb4481e55_prof);

    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
        $__internal_1b4ba8bd04d35c5e7227c78493176000f3f42a7e3c07ca7ba3bcb173b072aba9 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_1b4ba8bd04d35c5e7227c78493176000f3f42a7e3c07ca7ba3bcb173b072aba9->enter($__internal_1b4ba8bd04d35c5e7227c78493176000f3f42a7e3c07ca7ba3bcb173b072aba9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_f109e0b15093cf385be2446c0745fa5627d9ae05af60f6f020cd6fd87f35df80 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f109e0b15093cf385be2446c0745fa5627d9ae05af60f6f020cd6fd87f35df80->enter($__internal_f109e0b15093cf385be2446c0745fa5627d9ae05af60f6f020cd6fd87f35df80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 23
        echo "    ";
        $this->displayBlock('main', $context, $blocks);
        
        $__internal_f109e0b15093cf385be2446c0745fa5627d9ae05af60f6f020cd6fd87f35df80->leave($__internal_f109e0b15093cf385be2446c0745fa5627d9ae05af60f6f020cd6fd87f35df80_prof);

        
        $__internal_1b4ba8bd04d35c5e7227c78493176000f3f42a7e3c07ca7ba3bcb173b072aba9->leave($__internal_1b4ba8bd04d35c5e7227c78493176000f3f42a7e3c07ca7ba3bcb173b072aba9_prof);

    }

    public function block_main($context, array $blocks = array())
    {
        $__internal_fde3f721192e8e7ca1ec87e6502609a7663bd166ff670323c977081abad35079 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_fde3f721192e8e7ca1ec87e6502609a7663bd166ff670323c977081abad35079->enter($__internal_fde3f721192e8e7ca1ec87e6502609a7663bd166ff670323c977081abad35079_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        $__internal_b16911dae684063eb568a0b661cb60dae9b4b0b9aee1f2bc3cfc27cc6a046b8f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b16911dae684063eb568a0b661cb60dae9b4b0b9aee1f2bc3cfc27cc6a046b8f->enter($__internal_b16911dae684063eb568a0b661cb60dae9b4b0b9aee1f2bc3cfc27cc6a046b8f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        
        $__internal_b16911dae684063eb568a0b661cb60dae9b4b0b9aee1f2bc3cfc27cc6a046b8f->leave($__internal_b16911dae684063eb568a0b661cb60dae9b4b0b9aee1f2bc3cfc27cc6a046b8f_prof);

        
        $__internal_fde3f721192e8e7ca1ec87e6502609a7663bd166ff670323c977081abad35079->leave($__internal_fde3f721192e8e7ca1ec87e6502609a7663bd166ff670323c977081abad35079_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 23,  133 => 22,  116 => 21,  104 => 16,  99 => 15,  97 => 14,  95 => 13,  86 => 12,  68 => 11,  56 => 25,  54 => 22,  50 => 21,  43 => 18,  41 => 12,  37 => 11,  30 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#
   This is the base template used as the application layout which contains the
   common elements and decorates all the other templates.
   See http://symfony.com/doc/current/book/templating.html#template-inheritance-and-layouts
#}
<!DOCTYPE html>
<html lang=\"en-US\">
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    <title>{% block title %}TODO List{% endblock %}</title>
    {% block stylesheets %}
        {#<link rel=\"stylesheet\" href=\"{{ asset('css/reset-style.css') }}\">;#}
        {#<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css\">#}
        <link rel=\"stylesheet\" href=\"{{ asset('css/index-style.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/form-style.css') }}\">
    {% endblock %}
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\"/>
</head>

<body id=\"{% block body_id %}{% endblock %}\">
{% block body %}
    {% block main %}{% endblock %}
{% endblock %}
</body>
</html>
", "base.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\app\\Resources\\views\\base.html.twig");
    }
}

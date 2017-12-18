<?php

/* @WebProfiler/Collector/exception.html.twig */
class __TwigTemplate_f32ad73c9bc804e7d7685ce925e27ce9c7daa98efc0b9a8c89227d7076a75563 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/exception.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f8c7f94ece9d9efc85cb2134cb07bd2219ba029d24dab50683d934c37ad6c99f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_f8c7f94ece9d9efc85cb2134cb07bd2219ba029d24dab50683d934c37ad6c99f->enter($__internal_f8c7f94ece9d9efc85cb2134cb07bd2219ba029d24dab50683d934c37ad6c99f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $__internal_2a7bf9b9c9012b106770cd22377656e1b5816533be17e1093882c2729271aa7f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2a7bf9b9c9012b106770cd22377656e1b5816533be17e1093882c2729271aa7f->enter($__internal_2a7bf9b9c9012b106770cd22377656e1b5816533be17e1093882c2729271aa7f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/exception.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f8c7f94ece9d9efc85cb2134cb07bd2219ba029d24dab50683d934c37ad6c99f->leave($__internal_f8c7f94ece9d9efc85cb2134cb07bd2219ba029d24dab50683d934c37ad6c99f_prof);

        
        $__internal_2a7bf9b9c9012b106770cd22377656e1b5816533be17e1093882c2729271aa7f->leave($__internal_2a7bf9b9c9012b106770cd22377656e1b5816533be17e1093882c2729271aa7f_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_bd627d8ee45d4702f0e3dc73309d658c0972008cd3f16c63c6c41a2f0072a864 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_bd627d8ee45d4702f0e3dc73309d658c0972008cd3f16c63c6c41a2f0072a864->enter($__internal_bd627d8ee45d4702f0e3dc73309d658c0972008cd3f16c63c6c41a2f0072a864_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_ec0ca52b5109c9d1d39d43479d6a8d1b38cc276d97e5bd5b9cbb655736625d2c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ec0ca52b5109c9d1d39d43479d6a8d1b38cc276d97e5bd5b9cbb655736625d2c->enter($__internal_ec0ca52b5109c9d1d39d43479d6a8d1b38cc276d97e5bd5b9cbb655736625d2c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    ";
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 5
            echo "        <style>
            ";
            // line 6
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception_css", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </style>
    ";
        }
        // line 9
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "
";
        
        $__internal_ec0ca52b5109c9d1d39d43479d6a8d1b38cc276d97e5bd5b9cbb655736625d2c->leave($__internal_ec0ca52b5109c9d1d39d43479d6a8d1b38cc276d97e5bd5b9cbb655736625d2c_prof);

        
        $__internal_bd627d8ee45d4702f0e3dc73309d658c0972008cd3f16c63c6c41a2f0072a864->leave($__internal_bd627d8ee45d4702f0e3dc73309d658c0972008cd3f16c63c6c41a2f0072a864_prof);

    }

    // line 12
    public function block_menu($context, array $blocks = array())
    {
        $__internal_a95606888bd62f8418b227112294d4b5ae3d3463e19d28ff771c3034f8dae2a3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_a95606888bd62f8418b227112294d4b5ae3d3463e19d28ff771c3034f8dae2a3->enter($__internal_a95606888bd62f8418b227112294d4b5ae3d3463e19d28ff771c3034f8dae2a3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_01417e05aba47041391585cdcbc81b630b313ba222dc0da8b7bc5743882549be = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_01417e05aba47041391585cdcbc81b630b313ba222dc0da8b7bc5743882549be->enter($__internal_01417e05aba47041391585cdcbc81b630b313ba222dc0da8b7bc5743882549be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 13
        echo "    <span class=\"label ";
        echo (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) ? ("label-status-error") : ("disabled"));
        echo "\">
        <span class=\"icon\">";
        // line 14
        echo twig_include($this->env, $context, "@WebProfiler/Icon/exception.svg");
        echo "</span>
        <strong>Exception</strong>
        ";
        // line 16
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 17
            echo "            <span class=\"count\">
                <span>1</span>
            </span>
        ";
        }
        // line 21
        echo "    </span>
";
        
        $__internal_01417e05aba47041391585cdcbc81b630b313ba222dc0da8b7bc5743882549be->leave($__internal_01417e05aba47041391585cdcbc81b630b313ba222dc0da8b7bc5743882549be_prof);

        
        $__internal_a95606888bd62f8418b227112294d4b5ae3d3463e19d28ff771c3034f8dae2a3->leave($__internal_a95606888bd62f8418b227112294d4b5ae3d3463e19d28ff771c3034f8dae2a3_prof);

    }

    // line 24
    public function block_panel($context, array $blocks = array())
    {
        $__internal_ea5bc52726da7b89cae428633a960986b945b422aba5a6270ec0f3b4e4af8099 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ea5bc52726da7b89cae428633a960986b945b422aba5a6270ec0f3b4e4af8099->enter($__internal_ea5bc52726da7b89cae428633a960986b945b422aba5a6270ec0f3b4e4af8099_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_71ac8e211b4df14ad6b10a6410c84ab0128f127070f642064e7dd97b7219c782 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_71ac8e211b4df14ad6b10a6410c84ab0128f127070f642064e7dd97b7219c782->enter($__internal_71ac8e211b4df14ad6b10a6410c84ab0128f127070f642064e7dd97b7219c782_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 25
        echo "    <h2>Exceptions</h2>

    ";
        // line 27
        if ( !$this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "hasexception", array())) {
            // line 28
            echo "        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    ";
        } else {
            // line 32
            echo "        <div class=\"sf-reset\">
            ";
            // line 33
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_exception", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
            echo "
        </div>
    ";
        }
        
        $__internal_71ac8e211b4df14ad6b10a6410c84ab0128f127070f642064e7dd97b7219c782->leave($__internal_71ac8e211b4df14ad6b10a6410c84ab0128f127070f642064e7dd97b7219c782_prof);

        
        $__internal_ea5bc52726da7b89cae428633a960986b945b422aba5a6270ec0f3b4e4af8099->leave($__internal_ea5bc52726da7b89cae428633a960986b945b422aba5a6270ec0f3b4e4af8099_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/exception.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 33,  135 => 32,  129 => 28,  127 => 27,  123 => 25,  114 => 24,  103 => 21,  97 => 17,  95 => 16,  90 => 14,  85 => 13,  76 => 12,  63 => 9,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block head %}
    {% if collector.hasexception %}
        <style>
            {{ render(path('_profiler_exception_css', { token: token })) }}
        </style>
    {% endif %}
    {{ parent() }}
{% endblock %}

{% block menu %}
    <span class=\"label {{ collector.hasexception ? 'label-status-error' : 'disabled' }}\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/exception.svg') }}</span>
        <strong>Exception</strong>
        {% if collector.hasexception %}
            <span class=\"count\">
                <span>1</span>
            </span>
        {% endif %}
    </span>
{% endblock %}

{% block panel %}
    <h2>Exceptions</h2>

    {% if not collector.hasexception %}
        <div class=\"empty\">
            <p>No exception was thrown and caught during the request.</p>
        </div>
    {% else %}
        <div class=\"sf-reset\">
            {{ render(path('_profiler_exception', { token: token })) }}
        </div>
    {% endif %}
{% endblock %}
", "@WebProfiler/Collector/exception.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\exception.html.twig");
    }
}

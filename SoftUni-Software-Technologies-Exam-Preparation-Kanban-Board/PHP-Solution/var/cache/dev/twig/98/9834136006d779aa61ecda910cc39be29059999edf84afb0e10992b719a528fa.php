<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_09886c37796d81d574b2448cf2a22ea32da8dad546b69f22c376ce19a869ce97 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
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
        $__internal_ef078fcfee01bfe535713ce3312882fdb2abd50634baeb7187a05fb27ceebbf0 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_ef078fcfee01bfe535713ce3312882fdb2abd50634baeb7187a05fb27ceebbf0->enter($__internal_ef078fcfee01bfe535713ce3312882fdb2abd50634baeb7187a05fb27ceebbf0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $__internal_199fe8c339d549d5c5e5b0735c05568edd6286cb8f79e623d660f249f22fc573 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_199fe8c339d549d5c5e5b0735c05568edd6286cb8f79e623d660f249f22fc573->enter($__internal_199fe8c339d549d5c5e5b0735c05568edd6286cb8f79e623d660f249f22fc573_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ef078fcfee01bfe535713ce3312882fdb2abd50634baeb7187a05fb27ceebbf0->leave($__internal_ef078fcfee01bfe535713ce3312882fdb2abd50634baeb7187a05fb27ceebbf0_prof);

        
        $__internal_199fe8c339d549d5c5e5b0735c05568edd6286cb8f79e623d660f249f22fc573->leave($__internal_199fe8c339d549d5c5e5b0735c05568edd6286cb8f79e623d660f249f22fc573_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_adae9559ce17dabd2fc645ee63166228c67b16b22fa3004eff8816831529f988 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_adae9559ce17dabd2fc645ee63166228c67b16b22fa3004eff8816831529f988->enter($__internal_adae9559ce17dabd2fc645ee63166228c67b16b22fa3004eff8816831529f988_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_cf7f9c2208ed2665f15847688909ed129f20eba3a7cdc2f40696cc58771ace3a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cf7f9c2208ed2665f15847688909ed129f20eba3a7cdc2f40696cc58771ace3a->enter($__internal_cf7f9c2208ed2665f15847688909ed129f20eba3a7cdc2f40696cc58771ace3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_cf7f9c2208ed2665f15847688909ed129f20eba3a7cdc2f40696cc58771ace3a->leave($__internal_cf7f9c2208ed2665f15847688909ed129f20eba3a7cdc2f40696cc58771ace3a_prof);

        
        $__internal_adae9559ce17dabd2fc645ee63166228c67b16b22fa3004eff8816831529f988->leave($__internal_adae9559ce17dabd2fc645ee63166228c67b16b22fa3004eff8816831529f988_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_46bdc452c1a23436e1e725b0bb82a8b408b0064ed5c95f95e7a27569c521ca6d = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_46bdc452c1a23436e1e725b0bb82a8b408b0064ed5c95f95e7a27569c521ca6d->enter($__internal_46bdc452c1a23436e1e725b0bb82a8b408b0064ed5c95f95e7a27569c521ca6d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_b12e3f1a666e3a58e6bba64f79f26391e9749f3dc574e42d179d9dca273fde80 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b12e3f1a666e3a58e6bba64f79f26391e9749f3dc574e42d179d9dca273fde80->enter($__internal_b12e3f1a666e3a58e6bba64f79f26391e9749f3dc574e42d179d9dca273fde80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_b12e3f1a666e3a58e6bba64f79f26391e9749f3dc574e42d179d9dca273fde80->leave($__internal_b12e3f1a666e3a58e6bba64f79f26391e9749f3dc574e42d179d9dca273fde80_prof);

        
        $__internal_46bdc452c1a23436e1e725b0bb82a8b408b0064ed5c95f95e7a27569c521ca6d->leave($__internal_46bdc452c1a23436e1e725b0bb82a8b408b0064ed5c95f95e7a27569c521ca6d_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_0191804893b0a1cee9633e4a889f0236c8578919938eec98e42dba16cb0e81a1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_0191804893b0a1cee9633e4a889f0236c8578919938eec98e42dba16cb0e81a1->enter($__internal_0191804893b0a1cee9633e4a889f0236c8578919938eec98e42dba16cb0e81a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_1955e5912ced874788624116bce96d7d0219e11f50fbe7fdf4cdfdaead967dc1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1955e5912ced874788624116bce96d7d0219e11f50fbe7fdf4cdfdaead967dc1->enter($__internal_1955e5912ced874788624116bce96d7d0219e11f50fbe7fdf4cdfdaead967dc1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Extension\HttpKernelRuntime')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => ($context["token"] ?? $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_1955e5912ced874788624116bce96d7d0219e11f50fbe7fdf4cdfdaead967dc1->leave($__internal_1955e5912ced874788624116bce96d7d0219e11f50fbe7fdf4cdfdaead967dc1_prof);

        
        $__internal_0191804893b0a1cee9633e4a889f0236c8578919938eec98e42dba16cb0e81a1->leave($__internal_0191804893b0a1cee9633e4a889f0236c8578919938eec98e42dba16cb0e81a1_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 13,  85 => 12,  71 => 7,  68 => 6,  59 => 5,  42 => 3,  11 => 1,);
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

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\router.html.twig");
    }
}

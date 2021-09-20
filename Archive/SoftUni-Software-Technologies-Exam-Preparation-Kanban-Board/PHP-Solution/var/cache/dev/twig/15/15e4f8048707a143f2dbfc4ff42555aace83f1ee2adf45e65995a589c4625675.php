<?php

/* task/index.html.twig */
class __TwigTemplate_cb326ced4e270ced78a57c392b98cf77dedd0df51ed766e8feda828991fe0b71 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "task/index.html.twig", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_54f598527cd79f5a11dd8257f8a6ace0783d5742c6498da24d3782184985ec25 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_54f598527cd79f5a11dd8257f8a6ace0783d5742c6498da24d3782184985ec25->enter($__internal_54f598527cd79f5a11dd8257f8a6ace0783d5742c6498da24d3782184985ec25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/index.html.twig"));

        $__internal_a70a838440e910aed67ad46ec28a3cfa1d62cf2a4cfa15f79abfc54465a5278c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a70a838440e910aed67ad46ec28a3cfa1d62cf2a4cfa15f79abfc54465a5278c->enter($__internal_a70a838440e910aed67ad46ec28a3cfa1d62cf2a4cfa15f79abfc54465a5278c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_54f598527cd79f5a11dd8257f8a6ace0783d5742c6498da24d3782184985ec25->leave($__internal_54f598527cd79f5a11dd8257f8a6ace0783d5742c6498da24d3782184985ec25_prof);

        
        $__internal_a70a838440e910aed67ad46ec28a3cfa1d62cf2a4cfa15f79abfc54465a5278c->leave($__internal_a70a838440e910aed67ad46ec28a3cfa1d62cf2a4cfa15f79abfc54465a5278c_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_190260727d59508c7d3877e209a9bee622a4afb9fe2892641a5bcd6d98823a4c = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_190260727d59508c7d3877e209a9bee622a4afb9fe2892641a5bcd6d98823a4c->enter($__internal_190260727d59508c7d3877e209a9bee622a4afb9fe2892641a5bcd6d98823a4c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        $__internal_2607776497a0b0c59cd7e73d6be364d15e222ef330e8268e0a7316acfe34202e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2607776497a0b0c59cd7e73d6be364d15e222ef330e8268e0a7316acfe34202e->enter($__internal_2607776497a0b0c59cd7e73d6be364d15e222ef330e8268e0a7316acfe34202e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "    <div class=\"container\">
        <a class=\"button\" href=\"/create\">Create New Task</a>
    </div>

    <div class=\"tasks container\">
        <header>
            <div class=\"column header open\">Open</div>
            <div class=\"column header inProgress\">In progress</div>
            <div class=\"column header finished\">Finished</div>
        </header>
        <ul class=\"column open\">
            ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["openTasks"] ?? $this->getContext($context, "openTasks")));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 16
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "title", array()), "html", null, true);
            echo "
                    <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("edit", array("id" => $this->getAttribute($context["task"], "id", array()))), "html", null, true);
            echo "\" class=\"icon edit\"></a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "        </ul>
        <ul class=\"column inProgress\">
            ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["inProgressTasks"] ?? $this->getContext($context, "inProgressTasks")));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 23
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "title", array()), "html", null, true);
            echo "
                    <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("edit", array("id" => $this->getAttribute($context["task"], "id", array()))), "html", null, true);
            echo "\" class=\"icon edit\"></a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        </ul>
        <ul class=\"column finished\">
            ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["finishedTasks"] ?? $this->getContext($context, "finishedTasks")));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 30
            echo "                <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["task"], "title", array()), "html", null, true);
            echo "
                    <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("edit", array("id" => $this->getAttribute($context["task"], "id", array()))), "html", null, true);
            echo "\" class=\"icon edit\"></a>
                </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "        </ul>
    </div>
";
        
        $__internal_2607776497a0b0c59cd7e73d6be364d15e222ef330e8268e0a7316acfe34202e->leave($__internal_2607776497a0b0c59cd7e73d6be364d15e222ef330e8268e0a7316acfe34202e_prof);

        
        $__internal_190260727d59508c7d3877e209a9bee622a4afb9fe2892641a5bcd6d98823a4c->leave($__internal_190260727d59508c7d3877e209a9bee622a4afb9fe2892641a5bcd6d98823a4c_prof);

    }

    public function getTemplateName()
    {
        return "task/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 34,  115 => 31,  110 => 30,  106 => 29,  102 => 27,  93 => 24,  88 => 23,  84 => 22,  80 => 20,  71 => 17,  66 => 16,  62 => 15,  49 => 4,  40 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.html.twig\" %}

{% block main %}
    <div class=\"container\">
        <a class=\"button\" href=\"/create\">Create New Task</a>
    </div>

    <div class=\"tasks container\">
        <header>
            <div class=\"column header open\">Open</div>
            <div class=\"column header inProgress\">In progress</div>
            <div class=\"column header finished\">Finished</div>
        </header>
        <ul class=\"column open\">
            {% for task in openTasks %}
                <li>{{ task.title }}
                    <a href=\"{{ path('edit', {id: task.id}) }}\" class=\"icon edit\"></a>
                </li>
            {% endfor %}
        </ul>
        <ul class=\"column inProgress\">
            {% for task in inProgressTasks %}
                <li>{{ task.title }}
                    <a href=\"{{ path('edit', {id: task.id}) }}\" class=\"icon edit\"></a>
                </li>
            {% endfor %}
        </ul>
        <ul class=\"column finished\">
            {% for task in finishedTasks %}
                <li>{{ task.title }}
                    <a href=\"{{ path('edit', {id: task.id}) }}\" class=\"icon edit\"></a>
                </li>
            {% endfor %}
        </ul>
    </div>
{% endblock %}", "task/index.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\app\\Resources\\views\\task\\index.html.twig");
    }
}

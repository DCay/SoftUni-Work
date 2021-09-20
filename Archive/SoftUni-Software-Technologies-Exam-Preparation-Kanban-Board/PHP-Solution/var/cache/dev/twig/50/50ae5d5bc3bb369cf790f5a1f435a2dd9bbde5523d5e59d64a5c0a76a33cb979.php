<?php

/* task/create.html.twig */
class __TwigTemplate_6e5eea0179c0e14d539c7b4381c84bf8b9ace588f2b99ef32d8733d57eb34b9a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "task/create.html.twig", 1);
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
        $__internal_09db36f629490b13ce3a7495c2f7b428d001e2194bf2ce5c3962960b12a9b836 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_09db36f629490b13ce3a7495c2f7b428d001e2194bf2ce5c3962960b12a9b836->enter($__internal_09db36f629490b13ce3a7495c2f7b428d001e2194bf2ce5c3962960b12a9b836_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/create.html.twig"));

        $__internal_8dc31b784fd2064b918dcbde8ed6349a43890eb39200378010e09882bba947a6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8dc31b784fd2064b918dcbde8ed6349a43890eb39200378010e09882bba947a6->enter($__internal_8dc31b784fd2064b918dcbde8ed6349a43890eb39200378010e09882bba947a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/create.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_09db36f629490b13ce3a7495c2f7b428d001e2194bf2ce5c3962960b12a9b836->leave($__internal_09db36f629490b13ce3a7495c2f7b428d001e2194bf2ce5c3962960b12a9b836_prof);

        
        $__internal_8dc31b784fd2064b918dcbde8ed6349a43890eb39200378010e09882bba947a6->leave($__internal_8dc31b784fd2064b918dcbde8ed6349a43890eb39200378010e09882bba947a6_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_246e83883e2b217fec2f241085d131e331ab23eae037ac7301d003bc99b47bd5 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_246e83883e2b217fec2f241085d131e331ab23eae037ac7301d003bc99b47bd5->enter($__internal_246e83883e2b217fec2f241085d131e331ab23eae037ac7301d003bc99b47bd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        $__internal_1f5c4c322ca5f6248b6b300a45478523c2f37f93b296627949b9e20abd2ce56b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1f5c4c322ca5f6248b6b300a45478523c2f37f93b296627949b9e20abd2ce56b->enter($__internal_1f5c4c322ca5f6248b6b300a45478523c2f37f93b296627949b9e20abd2ce56b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "    <header>
        <h3>Create New Task</h3>
    </header>

    <form method=\"post\">
        <div>
            <label class=\"desc\" for=\"title\">Title</label>
            <div>
                <input id=\"title\" name=\"task[title]\" type=\"text\" class=\"field text fn\" value=\"\" size=\"8\" tabindex=\"10\"
                       autofocus required>
            </div>
        </div>

        <div>
            <fieldset>
                <legend class=\"desc\">
                    Status
                </legend>

                <div>
                    <div>
                        <input id=\"status1\" name=\"task[status]\" type=\"radio\" value=\"Open\" tabindex=\"2\" checked>
                        <label class=\"choice\" for=\"status1\">Open</label>
                    </div>
                    <div>
                        <input id=\"status2\" name=\"task[status]\" type=\"radio\" value=\"In Progress\" tabindex=\"3\">
                        <label class=\"choice\" for=\"status2\">In Progress</label>
                    </div>
                    <div>
                        <input id=\"status3\" name=\"task[status]\" type=\"radio\" value=\"Finished\" tabindex=\"4\">
                        <label class=\"choice\" for=\"status3\">Finished</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <div>
            <div>
                <input class=\"button\" type=\"submit\" value=\"Submit\">
                <a class=\"button cancel\" href=\"/\">Cancel</a>
            </div>
        </div>

        ";
        // line 47
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
    </form>
";
        
        $__internal_1f5c4c322ca5f6248b6b300a45478523c2f37f93b296627949b9e20abd2ce56b->leave($__internal_1f5c4c322ca5f6248b6b300a45478523c2f37f93b296627949b9e20abd2ce56b_prof);

        
        $__internal_246e83883e2b217fec2f241085d131e331ab23eae037ac7301d003bc99b47bd5->leave($__internal_246e83883e2b217fec2f241085d131e331ab23eae037ac7301d003bc99b47bd5_prof);

    }

    public function getTemplateName()
    {
        return "task/create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 47,  49 => 4,  40 => 3,  11 => 1,);
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
    <header>
        <h3>Create New Task</h3>
    </header>

    <form method=\"post\">
        <div>
            <label class=\"desc\" for=\"title\">Title</label>
            <div>
                <input id=\"title\" name=\"task[title]\" type=\"text\" class=\"field text fn\" value=\"\" size=\"8\" tabindex=\"10\"
                       autofocus required>
            </div>
        </div>

        <div>
            <fieldset>
                <legend class=\"desc\">
                    Status
                </legend>

                <div>
                    <div>
                        <input id=\"status1\" name=\"task[status]\" type=\"radio\" value=\"Open\" tabindex=\"2\" checked>
                        <label class=\"choice\" for=\"status1\">Open</label>
                    </div>
                    <div>
                        <input id=\"status2\" name=\"task[status]\" type=\"radio\" value=\"In Progress\" tabindex=\"3\">
                        <label class=\"choice\" for=\"status2\">In Progress</label>
                    </div>
                    <div>
                        <input id=\"status3\" name=\"task[status]\" type=\"radio\" value=\"Finished\" tabindex=\"4\">
                        <label class=\"choice\" for=\"status3\">Finished</label>
                    </div>
                </div>
            </fieldset>
        </div>

        <div>
            <div>
                <input class=\"button\" type=\"submit\" value=\"Submit\">
                <a class=\"button cancel\" href=\"/\">Cancel</a>
            </div>
        </div>

        {{ form_row(form._token) }}
    </form>
{% endblock %}", "task/create.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\app\\Resources\\views\\task\\create.html.twig");
    }
}

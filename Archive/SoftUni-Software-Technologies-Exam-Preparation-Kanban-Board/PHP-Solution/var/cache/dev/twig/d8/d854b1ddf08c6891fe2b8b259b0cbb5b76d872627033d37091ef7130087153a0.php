<?php

/* task/edit.html.twig */
class __TwigTemplate_c7af4c078c9c3b53407fbc75de5ca1b656c30e1f5b369842f334fd9de17da0c5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "task/edit.html.twig", 1);
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
        $__internal_9ad3b4de4aee595f2c95a433f36e60efe6ab6a8b300897ce6a223f84ead7960f = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9ad3b4de4aee595f2c95a433f36e60efe6ab6a8b300897ce6a223f84ead7960f->enter($__internal_9ad3b4de4aee595f2c95a433f36e60efe6ab6a8b300897ce6a223f84ead7960f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/edit.html.twig"));

        $__internal_e58316c92e46bec2a078eebe55182ee4b8f10b56e49c4caccb4295d687d0cc5b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e58316c92e46bec2a078eebe55182ee4b8f10b56e49c4caccb4295d687d0cc5b->enter($__internal_e58316c92e46bec2a078eebe55182ee4b8f10b56e49c4caccb4295d687d0cc5b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "task/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9ad3b4de4aee595f2c95a433f36e60efe6ab6a8b300897ce6a223f84ead7960f->leave($__internal_9ad3b4de4aee595f2c95a433f36e60efe6ab6a8b300897ce6a223f84ead7960f_prof);

        
        $__internal_e58316c92e46bec2a078eebe55182ee4b8f10b56e49c4caccb4295d687d0cc5b->leave($__internal_e58316c92e46bec2a078eebe55182ee4b8f10b56e49c4caccb4295d687d0cc5b_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_19debe2dc866e67095ac44c5d51ee9a55ecdbf2cacd65615396d838e5b9c18f3 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_19debe2dc866e67095ac44c5d51ee9a55ecdbf2cacd65615396d838e5b9c18f3->enter($__internal_19debe2dc866e67095ac44c5d51ee9a55ecdbf2cacd65615396d838e5b9c18f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        $__internal_56f9f010a4e6fc97a4b389fa316b5378df8f82a9d0d881161a553973f9b7a036 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_56f9f010a4e6fc97a4b389fa316b5378df8f82a9d0d881161a553973f9b7a036->enter($__internal_56f9f010a4e6fc97a4b389fa316b5378df8f82a9d0d881161a553973f9b7a036_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "    <header>
        <h3>Edit Task</h3>
    </header>

    <form method=\"post\">
        <div>
            <label class=\"desc\" for=\"title\">Title</label>
            <div>
                <input id=\"title\" name=\"task[title]\" type=\"text\" class=\"field text fn\" size=\"8\" tabindex=\"1\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["task"] ?? $this->getContext($context, "task")), "title", array()), "html", null, true);
        echo "\" autofocus>
            </div>
        </div>

        <div>
            <fieldset>
                <legend class=\"desc\">
                    Status
                </legend>

                <div>
                    <div>
                        <input id=\"status1\" name=\"task[status]\" type=\"radio\" value=\"Open\" tabindex=\"2\" ";
        // line 24
        echo ((($this->getAttribute(($context["task"] ?? $this->getContext($context, "task")), "status", array()) == "Open")) ? ("checked") : (""));
        echo ">
                        <label class=\"choice\" for=\"status1\">Open</label>
                    </div>
                    <div>
                        <input id=\"status2\" name=\"task[status]\" type=\"radio\" value=\"In Progress\" tabindex=\"3\" ";
        // line 28
        echo ((($this->getAttribute(($context["task"] ?? $this->getContext($context, "task")), "status", array()) == "In Progress")) ? ("checked") : (""));
        echo ">
                        <label class=\"choice\" for=\"status2\">In Progress</label>
                    </div>
                    <div>
                        <input id=\"status3\" name=\"task[status]\" type=\"radio\" value=\"Finished\" tabindex=\"4\" ";
        // line 32
        echo ((($this->getAttribute(($context["task"] ?? $this->getContext($context, "task")), "status", array()) == "Finished")) ? ("checked") : (""));
        echo ">
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
        // line 46
        echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute(($context["form"] ?? $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
    </form>
";
        
        $__internal_56f9f010a4e6fc97a4b389fa316b5378df8f82a9d0d881161a553973f9b7a036->leave($__internal_56f9f010a4e6fc97a4b389fa316b5378df8f82a9d0d881161a553973f9b7a036_prof);

        
        $__internal_19debe2dc866e67095ac44c5d51ee9a55ecdbf2cacd65615396d838e5b9c18f3->leave($__internal_19debe2dc866e67095ac44c5d51ee9a55ecdbf2cacd65615396d838e5b9c18f3_prof);

    }

    public function getTemplateName()
    {
        return "task/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 46,  88 => 32,  81 => 28,  74 => 24,  59 => 12,  49 => 4,  40 => 3,  11 => 1,);
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
        <h3>Edit Task</h3>
    </header>

    <form method=\"post\">
        <div>
            <label class=\"desc\" for=\"title\">Title</label>
            <div>
                <input id=\"title\" name=\"task[title]\" type=\"text\" class=\"field text fn\" size=\"8\" tabindex=\"1\" value=\"{{ task.title }}\" autofocus>
            </div>
        </div>

        <div>
            <fieldset>
                <legend class=\"desc\">
                    Status
                </legend>

                <div>
                    <div>
                        <input id=\"status1\" name=\"task[status]\" type=\"radio\" value=\"Open\" tabindex=\"2\" {{ task.status == 'Open' ? 'checked' : '' }}>
                        <label class=\"choice\" for=\"status1\">Open</label>
                    </div>
                    <div>
                        <input id=\"status2\" name=\"task[status]\" type=\"radio\" value=\"In Progress\" tabindex=\"3\" {{ task.status == 'In Progress' ? 'checked' : '' }}>
                        <label class=\"choice\" for=\"status2\">In Progress</label>
                    </div>
                    <div>
                        <input id=\"status3\" name=\"task[status]\" type=\"radio\" value=\"Finished\" tabindex=\"4\" {{ task.status == 'Finished' ? 'checked' : '' }}>
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
{% endblock %}", "task/edit.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\app\\Resources\\views\\task\\edit.html.twig");
    }
}

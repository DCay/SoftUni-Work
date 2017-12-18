<?php

/* @Twig/layout.html.twig */
class __TwigTemplate_0ef46ff3e00be850b375145c4de69a72941605b1b30816a42d1a36aa92bc080f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_647fc072f9dadbdd49b2d450cd71ca665f9bc8b2167669ea6d1197702084b3bc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_647fc072f9dadbdd49b2d450cd71ca665f9bc8b2167669ea6d1197702084b3bc->enter($__internal_647fc072f9dadbdd49b2d450cd71ca665f9bc8b2167669ea6d1197702084b3bc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        $__internal_02bbe3266522f87f3876cc3b0d52dc48f675eb573c184b54dfa56fd1210e671b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_02bbe3266522f87f3876cc3b0d52dc48f675eb573c184b54dfa56fd1210e671b->enter($__internal_02bbe3266522f87f3876cc3b0d52dc48f675eb573c184b54dfa56fd1210e671b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/layout.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 8
        echo twig_include($this->env, $context, "@Twig/images/favicon.png.base64");
        echo "\">
        <style>";
        // line 9
        echo twig_include($this->env, $context, "@Twig/exception.css.twig");
        echo "</style>
        ";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">";
        // line 15
        echo twig_include($this->env, $context, "@Twig/images/symfony-logo.svg");
        echo " Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">";
        // line 19
        echo twig_include($this->env, $context, "@Twig/images/icon-book.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">";
        // line 26
        echo twig_include($this->env, $context, "@Twig/images/icon-support.svg");
        echo "</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        ";
        // line 33
        $this->displayBlock('body', $context, $blocks);
        // line 34
        echo "        ";
        echo twig_include($this->env, $context, "@Twig/base_js.html.twig");
        echo "
    </body>
</html>
";
        
        $__internal_647fc072f9dadbdd49b2d450cd71ca665f9bc8b2167669ea6d1197702084b3bc->leave($__internal_647fc072f9dadbdd49b2d450cd71ca665f9bc8b2167669ea6d1197702084b3bc_prof);

        
        $__internal_02bbe3266522f87f3876cc3b0d52dc48f675eb573c184b54dfa56fd1210e671b->leave($__internal_02bbe3266522f87f3876cc3b0d52dc48f675eb573c184b54dfa56fd1210e671b_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_325e9fab644a08ad44452933557a2a267773106eb425c690471046e1169d7793 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_325e9fab644a08ad44452933557a2a267773106eb425c690471046e1169d7793->enter($__internal_325e9fab644a08ad44452933557a2a267773106eb425c690471046e1169d7793_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        $__internal_1fa0cd202bf772f5e49a19c59c7a14005e26a82a2b09d0a6650550119e020789 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1fa0cd202bf772f5e49a19c59c7a14005e26a82a2b09d0a6650550119e020789->enter($__internal_1fa0cd202bf772f5e49a19c59c7a14005e26a82a2b09d0a6650550119e020789_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        
        $__internal_1fa0cd202bf772f5e49a19c59c7a14005e26a82a2b09d0a6650550119e020789->leave($__internal_1fa0cd202bf772f5e49a19c59c7a14005e26a82a2b09d0a6650550119e020789_prof);

        
        $__internal_325e9fab644a08ad44452933557a2a267773106eb425c690471046e1169d7793->leave($__internal_325e9fab644a08ad44452933557a2a267773106eb425c690471046e1169d7793_prof);

    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        $__internal_199fa8c7761b3466174e73df3682a45c83a613e0e88e61502b68ae91f2587755 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_199fa8c7761b3466174e73df3682a45c83a613e0e88e61502b68ae91f2587755->enter($__internal_199fa8c7761b3466174e73df3682a45c83a613e0e88e61502b68ae91f2587755_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        $__internal_5fb14492221ee31f16c412679c4d3cc2a4a2ef97b5217fa36d8c60347327a404 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5fb14492221ee31f16c412679c4d3cc2a4a2ef97b5217fa36d8c60347327a404->enter($__internal_5fb14492221ee31f16c412679c4d3cc2a4a2ef97b5217fa36d8c60347327a404_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        
        $__internal_5fb14492221ee31f16c412679c4d3cc2a4a2ef97b5217fa36d8c60347327a404->leave($__internal_5fb14492221ee31f16c412679c4d3cc2a4a2ef97b5217fa36d8c60347327a404_prof);

        
        $__internal_199fa8c7761b3466174e73df3682a45c83a613e0e88e61502b68ae91f2587755->leave($__internal_199fa8c7761b3466174e73df3682a45c83a613e0e88e61502b68ae91f2587755_prof);

    }

    // line 33
    public function block_body($context, array $blocks = array())
    {
        $__internal_14a899afdf7e20312108c6e6153a61f146f518b9b2939ee056fbc276ef4f0969 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_14a899afdf7e20312108c6e6153a61f146f518b9b2939ee056fbc276ef4f0969->enter($__internal_14a899afdf7e20312108c6e6153a61f146f518b9b2939ee056fbc276ef4f0969_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        $__internal_9e8fb7c5a9febe2c784e1b1001d6a66bd23f8882c20dd50a6e5d827e8b01e8d2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9e8fb7c5a9febe2c784e1b1001d6a66bd23f8882c20dd50a6e5d827e8b01e8d2->enter($__internal_9e8fb7c5a9febe2c784e1b1001d6a66bd23f8882c20dd50a6e5d827e8b01e8d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_9e8fb7c5a9febe2c784e1b1001d6a66bd23f8882c20dd50a6e5d827e8b01e8d2->leave($__internal_9e8fb7c5a9febe2c784e1b1001d6a66bd23f8882c20dd50a6e5d827e8b01e8d2_prof);

        
        $__internal_14a899afdf7e20312108c6e6153a61f146f518b9b2939ee056fbc276ef4f0969->leave($__internal_14a899afdf7e20312108c6e6153a61f146f518b9b2939ee056fbc276ef4f0969_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 33,  120 => 10,  103 => 7,  88 => 34,  86 => 33,  76 => 26,  66 => 19,  59 => 15,  53 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"{{ _charset }}\" />
        <meta name=\"robots\" content=\"noindex,nofollow\" />
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1\" />
        <title>{% block title %}{% endblock %}</title>
        <link rel=\"icon\" type=\"image/png\" href=\"{{ include('@Twig/images/favicon.png.base64') }}\">
        <style>{{ include('@Twig/exception.css.twig') }}</style>
        {% block head %}{% endblock %}
    </head>
    <body>
        <header>
            <div class=\"container\">
                <h1 class=\"logo\">{{ include('@Twig/images/symfony-logo.svg') }} Symfony Exception</h1>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/doc\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-book.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Docs
                    </a>
                </div>

                <div class=\"help-link\">
                    <a href=\"https://symfony.com/support\">
                        <span class=\"icon\">{{ include('@Twig/images/icon-support.svg') }}</span>
                        <span class=\"hidden-xs-down\">Symfony</span> Support
                    </a>
                </div>
            </div>
        </header>

        {% block body %}{% endblock %}
        {{ include('@Twig/base_js.html.twig') }}
    </body>
</html>
", "@Twig/layout.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\TwigBundle\\Resources\\views\\layout.html.twig");
    }
}

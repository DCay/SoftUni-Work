<?php

/* @WebProfiler/Collector/request.html.twig */
class __TwigTemplate_cdfe4f01cd3c4436f0b9f3d7620733dc52fc3222dadbbcc8acca84ce54c41d18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/request.html.twig", 1);
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
        $__internal_9edbd7176935af924be9802c2f475688fff83922f67dc4574361bb363df9efa1 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9edbd7176935af924be9802c2f475688fff83922f67dc4574361bb363df9efa1->enter($__internal_9edbd7176935af924be9802c2f475688fff83922f67dc4574361bb363df9efa1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/request.html.twig"));

        $__internal_48cd8b9ab4bf28bd22300c00da64766cd1d9fb372b0dd79cf90d3dc7901ce1a6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_48cd8b9ab4bf28bd22300c00da64766cd1d9fb372b0dd79cf90d3dc7901ce1a6->enter($__internal_48cd8b9ab4bf28bd22300c00da64766cd1d9fb372b0dd79cf90d3dc7901ce1a6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/request.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9edbd7176935af924be9802c2f475688fff83922f67dc4574361bb363df9efa1->leave($__internal_9edbd7176935af924be9802c2f475688fff83922f67dc4574361bb363df9efa1_prof);

        
        $__internal_48cd8b9ab4bf28bd22300c00da64766cd1d9fb372b0dd79cf90d3dc7901ce1a6->leave($__internal_48cd8b9ab4bf28bd22300c00da64766cd1d9fb372b0dd79cf90d3dc7901ce1a6_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9f472dc1d16439b4daeb50230cc38c9102c9ca06e86b1554392466f40d70a8cc = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_9f472dc1d16439b4daeb50230cc38c9102c9ca06e86b1554392466f40d70a8cc->enter($__internal_9f472dc1d16439b4daeb50230cc38c9102c9ca06e86b1554392466f40d70a8cc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        $__internal_80fbedf2c024c9e2d8e0185d159721b82ecd15d2ad9bc33a1f11004a74964155 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_80fbedf2c024c9e2d8e0185d159721b82ecd15d2ad9bc33a1f11004a74964155->enter($__internal_80fbedf2c024c9e2d8e0185d159721b82ecd15d2ad9bc33a1f11004a74964155_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        // line 4
        echo "    ";
        ob_start();
        // line 5
        echo "        ";
        $context["helper"] = $this;
        // line 6
        echo "        ";
        echo $context["helper"]->getset_handler($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "controller", array()));
        echo "
    ";
        $context["request_handler"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array())) {
            // line 10
            echo "        ";
            ob_start();
            // line 11
            echo "            ";
            $context["helper"] = $this;
            // line 12
            echo "            ";
            echo $context["helper"]->getset_handler($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "controller", array()), $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "route", array()), ((("GET" != $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "method", array()))) ? ($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "method", array())) : ("")));
            echo "
        ";
            $context["redirect_handler"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 14
            echo "    ";
        }
        // line 15
        echo "
    ";
        // line 16
        if ((($this->getAttribute(($context["collector"] ?? null), "forward", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["collector"] ?? null), "forward", array()), false)) : (false))) {
            // line 17
            echo "        ";
            ob_start();
            // line 18
            echo "            ";
            $context["helper"] = $this;
            // line 19
            echo "            ";
            echo $context["helper"]->getset_handler($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "forward", array()), "controller", array()));
            echo "
        ";
            $context["forward_handler"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 21
            echo "    ";
        }
        // line 22
        echo "
    ";
        // line 23
        $context["request_status_code_color"] = ((($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "statuscode", array()) >= 400)) ? ("red") : (((($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "statuscode", array()) >= 300)) ? ("yellow") : ("green"))));
        // line 24
        echo "
    ";
        // line 25
        ob_start();
        // line 26
        echo "        <span class=\"sf-toolbar-status sf-toolbar-status-";
        echo twig_escape_filter($this->env, ($context["request_status_code_color"] ?? $this->getContext($context, "request_status_code_color")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "statuscode", array()), "html", null, true);
        echo "</span>
        ";
        // line 27
        if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "route", array())) {
            // line 28
            echo "            ";
            if ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array())) {
                echo twig_include($this->env, $context, "@WebProfiler/Icon/redirect.svg");
            }
            // line 29
            echo "            ";
            if ((($this->getAttribute(($context["collector"] ?? null), "forward", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["collector"] ?? null), "forward", array()), false)) : (false))) {
                echo twig_include($this->env, $context, "@WebProfiler/Icon/forward.svg");
            }
            // line 30
            echo "            <span class=\"sf-toolbar-label\">";
            echo twig_escape_filter($this->env, ((("GET" != $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "method", array()))) ? ($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "method", array())) : ("")), "html", null, true);
            echo " @</span>
            <span class=\"sf-toolbar-value sf-toolbar-info-piece-additional\">";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "route", array()), "html", null, true);
            echo "</span>
        ";
        }
        // line 33
        echo "    ";
        $context["icon"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 34
        echo "
    ";
        // line 35
        ob_start();
        // line 36
        echo "        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>HTTP status</b>
                <span>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "statuscode", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "statustext", array()), "html", null, true);
        echo "</span>
            </div>

            ";
        // line 42
        if (("GET" != $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "method", array()))) {
            // line 43
            echo "<div class=\"sf-toolbar-info-piece\">
                    <b>Method</b>
                    <span>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "method", array()), "html", null, true);
            echo "</span>
                </div>";
        }
        // line 48
        echo "
            <div class=\"sf-toolbar-info-piece\">
                <b>Controller</b>
                <span>";
        // line 51
        echo twig_escape_filter($this->env, ($context["request_handler"] ?? $this->getContext($context, "request_handler")), "html", null, true);
        echo "</span>
            </div>

            ";
        // line 54
        if ($this->getAttribute($this->getAttribute(($context["collector"] ?? null), "controller", array(), "any", false, true), "class", array(), "any", true, true)) {
            // line 55
            echo "<div class=\"sf-toolbar-info-piece\">
                    <b>Controller class</b>
                    <span>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "controller", array()), "class", array()), "html", null, true);
            echo "</span>
                </div>";
        }
        // line 60
        echo "
            <div class=\"sf-toolbar-info-piece\">
                <b>Route name</b>
                <span>";
        // line 63
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["collector"] ?? null), "route", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["collector"] ?? null), "route", array()), "NONE")) : ("NONE")), "html", null, true);
        echo "</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Has session</b>
                <span>";
        // line 68
        if (twig_length_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionmetadata", array()))) {
            echo "yes";
        } else {
            echo "no";
        }
        echo "</span>
            </div>
        </div>

        ";
        // line 72
        if (array_key_exists("redirect_handler", $context)) {
            // line 73
            echo "<div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>
                        <span class=\"sf-toolbar-redirection-status sf-toolbar-status-yellow\">";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "status_code", array()), "html", null, true);
            echo "</span>
                        Redirect from
                    </b>
                    <span>
                        ";
            // line 80
            echo twig_escape_filter($this->env, ($context["redirect_handler"] ?? $this->getContext($context, "redirect_handler")), "html", null, true);
            echo "
                        (<a href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler", array("token" => $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "token", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "redirect", array()), "token", array()), "html", null, true);
            echo "</a>)
                    </span>
                </div>
            </div>
        ";
        }
        // line 86
        echo "
        ";
        // line 87
        if (array_key_exists("forward_handler", $context)) {
            // line 88
            echo "            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>Forwarded to</b>
                    <span>
                        ";
            // line 92
            echo twig_escape_filter($this->env, ($context["forward_handler"] ?? $this->getContext($context, "forward_handler")), "html", null, true);
            echo "
                        (<a href=\"";
            // line 93
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler", array("token" => $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "forward", array()), "token", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "forward", array()), "token", array()), "html", null, true);
            echo "</a>)
                    </span>
                </div>
            </div>
        ";
        }
        // line 98
        echo "    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 99
        echo "
    ";
        // line 100
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/toolbar_item.html.twig", array("link" => ($context["profiler_url"] ?? $this->getContext($context, "profiler_url"))));
        echo "
";
        
        $__internal_80fbedf2c024c9e2d8e0185d159721b82ecd15d2ad9bc33a1f11004a74964155->leave($__internal_80fbedf2c024c9e2d8e0185d159721b82ecd15d2ad9bc33a1f11004a74964155_prof);

        
        $__internal_9f472dc1d16439b4daeb50230cc38c9102c9ca06e86b1554392466f40d70a8cc->leave($__internal_9f472dc1d16439b4daeb50230cc38c9102c9ca06e86b1554392466f40d70a8cc_prof);

    }

    // line 103
    public function block_menu($context, array $blocks = array())
    {
        $__internal_23919c333be39bfd455a0a44609ae9acb8371331c22c63cd7d3e1e9c08f915df = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_23919c333be39bfd455a0a44609ae9acb8371331c22c63cd7d3e1e9c08f915df->enter($__internal_23919c333be39bfd455a0a44609ae9acb8371331c22c63cd7d3e1e9c08f915df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        $__internal_a44868fca93edef8ab3af840c8e68c62737adae794e80687b5395d5291369bec = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a44868fca93edef8ab3af840c8e68c62737adae794e80687b5395d5291369bec->enter($__internal_a44868fca93edef8ab3af840c8e68c62737adae794e80687b5395d5291369bec_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 104
        echo "    <span class=\"label\">
        <span class=\"icon\">";
        // line 105
        echo twig_include($this->env, $context, "@WebProfiler/Icon/request.svg");
        echo "</span>
        <strong>Request / Response</strong>
    </span>
";
        
        $__internal_a44868fca93edef8ab3af840c8e68c62737adae794e80687b5395d5291369bec->leave($__internal_a44868fca93edef8ab3af840c8e68c62737adae794e80687b5395d5291369bec_prof);

        
        $__internal_23919c333be39bfd455a0a44609ae9acb8371331c22c63cd7d3e1e9c08f915df->leave($__internal_23919c333be39bfd455a0a44609ae9acb8371331c22c63cd7d3e1e9c08f915df_prof);

    }

    // line 110
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e99e42eda00a4621599af5a88bc38187c7d3f71268c561bf80ebd7f3fb53c785 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_e99e42eda00a4621599af5a88bc38187c7d3f71268c561bf80ebd7f3fb53c785->enter($__internal_e99e42eda00a4621599af5a88bc38187c7d3f71268c561bf80ebd7f3fb53c785_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        $__internal_9718dcb6c69becae7f29fa73b2ef27c4ff24910e47b0c4b49f1b75d3c42d1655 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9718dcb6c69becae7f29fa73b2ef27c4ff24910e47b0c4b49f1b75d3c42d1655->enter($__internal_9718dcb6c69becae7f29fa73b2ef27c4ff24910e47b0c4b49f1b75d3c42d1655_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 111
        echo "    <div class=\"sf-tabs\">
        <div class=\"tab\">
            <h3 class=\"tab-title\">Request</h3>

            <div class=\"tab-content\">
                <h3>GET Parameters</h3>

                ";
        // line 118
        if (twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestquery", array()), "all", array()))) {
            // line 119
            echo "                    <div class=\"empty\">
                        <p>No GET parameters</p>
                    </div>
                ";
        } else {
            // line 123
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestquery", array()), "maxDepth" => 1), false);
            echo "
                ";
        }
        // line 125
        echo "
                <h3>POST Parameters</h3>

                ";
        // line 128
        if (twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestrequest", array()), "all", array()))) {
            // line 129
            echo "                    <div class=\"empty\">
                        <p>No POST parameters</p>
                    </div>
                ";
        } else {
            // line 133
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestrequest", array()), "maxDepth" => 1), false);
            echo "
                ";
        }
        // line 135
        echo "
                <h3>Request Attributes</h3>

                ";
        // line 138
        if (twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestattributes", array()), "all", array()))) {
            // line 139
            echo "                    <div class=\"empty\">
                        <p>No attributes</p>
                    </div>
                ";
        } else {
            // line 143
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestattributes", array())), false);
            echo "
                ";
        }
        // line 145
        echo "
                <h3>Request Headers</h3>
                ";
        // line 147
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestheaders", array()), "labels" => array(0 => "Header", 1 => "Value"), "maxDepth" => 1), false);
        echo "

                <h3>Request Content</h3>

                ";
        // line 151
        if (($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "content", array()) == false)) {
            // line 152
            echo "                    <div class=\"empty\">
                        <p>Request content not available (it was retrieved as a resource).</p>
                    </div>
                ";
        } elseif ($this->getAttribute(        // line 155
($context["collector"] ?? $this->getContext($context, "collector")), "content", array())) {
            // line 156
            echo "                    <div class=\"card\">
                        <pre class=\"break-long-words\">";
            // line 157
            echo twig_escape_filter($this->env, $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "content", array()), "html", null, true);
            echo "</pre>
                    </div>
                ";
        } else {
            // line 160
            echo "                    <div class=\"empty\">
                        <p>No content</p>
                    </div>
                ";
        }
        // line 164
        echo "
                <h3>Server Parameters</h3>
                ";
        // line 166
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestserver", array())), false);
        echo "
            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Response</h3>

            <div class=\"tab-content\">
                <h3>Response Headers</h3>

                ";
        // line 176
        echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "responseheaders", array()), "labels" => array(0 => "Header", 1 => "Value"), "maxDepth" => 1), false);
        echo "
            </div>
        </div>

        <div class=\"tab ";
        // line 180
        echo (((twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestcookies", array()), "all", array())) && twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "responsecookies", array()), "all", array())))) ? ("disabled") : (""));
        echo "\">
            <h3 class=\"tab-title\">Cookies</h3>

            <div class=\"tab-content\">
                <h3>Request Cookies</h3>

                ";
        // line 186
        if (twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestcookies", array()), "all", array()))) {
            // line 187
            echo "                    <div class=\"empty\">
                        <p>No request cookies</p>
                    </div>
                ";
        } else {
            // line 191
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "requestcookies", array())), false);
            echo "
                ";
        }
        // line 193
        echo "
                <h3>Response Cookies</h3>

                ";
        // line 196
        if (twig_test_empty($this->getAttribute($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "responsecookies", array()), "all", array()))) {
            // line 197
            echo "                    <div class=\"empty\">
                        <p>No response cookies</p>
                    </div>
                ";
        } else {
            // line 201
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "responsecookies", array())), true);
            echo "
                ";
        }
        // line 203
        echo "            </div>
        </div>

        <div class=\"tab ";
        // line 206
        echo ((twig_test_empty($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionmetadata", array()))) ? ("disabled") : (""));
        echo "\">
            <h3 class=\"tab-title\">Session</h3>

            <div class=\"tab-content\">
                <h3>Session Metadata</h3>

                ";
        // line 212
        if (twig_test_empty($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionmetadata", array()))) {
            // line 213
            echo "                    <div class=\"empty\">
                        <p>No session metadata</p>
                    </div>
                ";
        } else {
            // line 217
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", array("data" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionmetadata", array())), false);
            echo "
                ";
        }
        // line 219
        echo "
                <h3>Session Attributes</h3>

                ";
        // line 222
        if (twig_test_empty($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionattributes", array()))) {
            // line 223
            echo "                    <div class=\"empty\">
                        <p>No session attributes</p>
                    </div>
                ";
        } else {
            // line 227
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", array("data" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "sessionattributes", array()), "labels" => array(0 => "Attribute", 1 => "Value")), false);
            echo "
                ";
        }
        // line 229
        echo "            </div>
        </div>

        <div class=\"tab ";
        // line 232
        echo ((twig_test_empty($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "flashes", array()))) ? ("disabled") : (""));
        echo "\">
            <h3 class=\"tab-title\">Flashes</h3>

            <div class=\"tab-content\">
                <h3>Flashes</h3>

                ";
        // line 238
        if (twig_test_empty($this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "flashes", array()))) {
            // line 239
            echo "                    <div class=\"empty\">
                        <p>No flash messages were created.</p>
                    </div>
                ";
        } else {
            // line 243
            echo "                    ";
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/table.html.twig", array("data" => $this->getAttribute(($context["collector"] ?? $this->getContext($context, "collector")), "flashes", array())), false);
            echo "
                ";
        }
        // line 245
        echo "            </div>
        </div>

        ";
        // line 248
        if ($this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "parent", array())) {
            // line 249
            echo "        <div class=\"tab\">
            <h3 class=\"tab-title\">Parent Request</h3>

            <div class=\"tab-content\">
                <h3>
                    <a href=\"";
            // line 254
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler", array("token" => $this->getAttribute($this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "parent", array()), "token", array()))), "html", null, true);
            echo "\">Return to parent request</a>
                    <small>(token = ";
            // line 255
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "parent", array()), "token", array()), "html", null, true);
            echo ")</small>
                </h3>

                ";
            // line 258
            echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute($this->getAttribute($this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "parent", array()), "getcollector", array(0 => "request"), "method"), "requestattributes", array())), false);
            echo "
            </div>
        </div>
        ";
        }
        // line 262
        echo "
        ";
        // line 263
        if (twig_length_filter($this->env, $this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "children", array()))) {
            // line 264
            echo "        <div class=\"tab\">
            <h3 class=\"tab-title\">Sub Requests <span class=\"badge\">";
            // line 265
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "children", array())), "html", null, true);
            echo "</span></h3>

            <div class=\"tab-content\">
                ";
            // line 268
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["profile"] ?? $this->getContext($context, "profile")), "children", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 269
                echo "                    <h3>
                        <a href=\"";
                // line 270
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler", array("token" => $this->getAttribute($context["child"], "token", array()))), "html", null, true);
                echo "\">";
                // line 271
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["child"], "getcollector", array(0 => "request"), "method"), "identifier", array()), "html", null, true);
                // line 272
                echo "</a>
                        <small>(token = ";
                // line 273
                echo twig_escape_filter($this->env, $this->getAttribute($context["child"], "token", array()), "html", null, true);
                echo ")</small>
                    </h3>

                    ";
                // line 276
                echo twig_include($this->env, $context, "@WebProfiler/Profiler/bag.html.twig", array("bag" => $this->getAttribute($this->getAttribute($context["child"], "getcollector", array(0 => "request"), "method"), "requestattributes", array())), false);
                echo "
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 278
            echo "            </div>
        </div>
        ";
        }
        // line 281
        echo "    </div>
";
        
        $__internal_9718dcb6c69becae7f29fa73b2ef27c4ff24910e47b0c4b49f1b75d3c42d1655->leave($__internal_9718dcb6c69becae7f29fa73b2ef27c4ff24910e47b0c4b49f1b75d3c42d1655_prof);

        
        $__internal_e99e42eda00a4621599af5a88bc38187c7d3f71268c561bf80ebd7f3fb53c785->leave($__internal_e99e42eda00a4621599af5a88bc38187c7d3f71268c561bf80ebd7f3fb53c785_prof);

    }

    // line 284
    public function getset_handler($__controller__ = null, $__route__ = null, $__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "controller" => $__controller__,
            "route" => $__route__,
            "method" => $__method__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            $__internal_961ecbd339deeebf8bdbd554329defba4cf65edf68be107793f5ccf1fa61b661 = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
            $__internal_961ecbd339deeebf8bdbd554329defba4cf65edf68be107793f5ccf1fa61b661->enter($__internal_961ecbd339deeebf8bdbd554329defba4cf65edf68be107793f5ccf1fa61b661_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "set_handler"));

            $__internal_b5d8a82a88cbf60d8e3dd6ad7a58d8fdaaa385bc01ac1638f97f8382093d7c1f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
            $__internal_b5d8a82a88cbf60d8e3dd6ad7a58d8fdaaa385bc01ac1638f97f8382093d7c1f->enter($__internal_b5d8a82a88cbf60d8e3dd6ad7a58d8fdaaa385bc01ac1638f97f8382093d7c1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "macro", "set_handler"));

            // line 285
            echo "    ";
            if ($this->getAttribute(($context["controller"] ?? null), "class", array(), "any", true, true)) {
                // line 286
                if (((array_key_exists("method", $context)) ? (_twig_default_filter(($context["method"] ?? $this->getContext($context, "method")), false)) : (false))) {
                    echo "<span class=\"sf-toolbar-status sf-toolbar-redirection-method\">";
                    echo twig_escape_filter($this->env, ($context["method"] ?? $this->getContext($context, "method")), "html", null, true);
                    echo "</span>";
                }
                // line 287
                $context["link"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->getFileLink($this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "file", array()), $this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "line", array()));
                // line 288
                if (($context["link"] ?? $this->getContext($context, "link"))) {
                    echo "<a href=\"";
                    echo twig_escape_filter($this->env, ($context["link"] ?? $this->getContext($context, "link")), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "file", array()), "html", null, true);
                    echo "\">";
                } else {
                    echo "<span>";
                }
                // line 290
                if (((array_key_exists("route", $context)) ? (_twig_default_filter(($context["route"] ?? $this->getContext($context, "route")), false)) : (false))) {
                    // line 291
                    echo "@";
                    echo twig_escape_filter($this->env, ($context["route"] ?? $this->getContext($context, "route")), "html", null, true);
                } else {
                    // line 293
                    echo twig_escape_filter($this->env, strip_tags($this->env->getExtension('Symfony\Bridge\Twig\Extension\CodeExtension')->abbrClass($this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "class", array()))), "html", null, true);
                    // line 294
                    echo twig_escape_filter($this->env, (($this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "method", array())) ? ((" :: " . $this->getAttribute(($context["controller"] ?? $this->getContext($context, "controller")), "method", array()))) : ("")), "html", null, true);
                }
                // line 297
                if (($context["link"] ?? $this->getContext($context, "link"))) {
                    echo "</a>";
                } else {
                    echo "</span>";
                }
            } else {
                // line 299
                echo "<span>";
                echo twig_escape_filter($this->env, ((array_key_exists("route", $context)) ? (_twig_default_filter(($context["route"] ?? $this->getContext($context, "route")), ($context["controller"] ?? $this->getContext($context, "controller")))) : (($context["controller"] ?? $this->getContext($context, "controller")))), "html", null, true);
                echo "</span>";
            }
            
            $__internal_b5d8a82a88cbf60d8e3dd6ad7a58d8fdaaa385bc01ac1638f97f8382093d7c1f->leave($__internal_b5d8a82a88cbf60d8e3dd6ad7a58d8fdaaa385bc01ac1638f97f8382093d7c1f_prof);

            
            $__internal_961ecbd339deeebf8bdbd554329defba4cf65edf68be107793f5ccf1fa61b661->leave($__internal_961ecbd339deeebf8bdbd554329defba4cf65edf68be107793f5ccf1fa61b661_prof);

        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/request.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  712 => 299,  705 => 297,  702 => 294,  700 => 293,  696 => 291,  694 => 290,  684 => 288,  682 => 287,  676 => 286,  673 => 285,  653 => 284,  642 => 281,  637 => 278,  629 => 276,  623 => 273,  620 => 272,  618 => 271,  615 => 270,  612 => 269,  608 => 268,  602 => 265,  599 => 264,  597 => 263,  594 => 262,  587 => 258,  581 => 255,  577 => 254,  570 => 249,  568 => 248,  563 => 245,  557 => 243,  551 => 239,  549 => 238,  540 => 232,  535 => 229,  529 => 227,  523 => 223,  521 => 222,  516 => 219,  510 => 217,  504 => 213,  502 => 212,  493 => 206,  488 => 203,  482 => 201,  476 => 197,  474 => 196,  469 => 193,  463 => 191,  457 => 187,  455 => 186,  446 => 180,  439 => 176,  426 => 166,  422 => 164,  416 => 160,  410 => 157,  407 => 156,  405 => 155,  400 => 152,  398 => 151,  391 => 147,  387 => 145,  381 => 143,  375 => 139,  373 => 138,  368 => 135,  362 => 133,  356 => 129,  354 => 128,  349 => 125,  343 => 123,  337 => 119,  335 => 118,  326 => 111,  317 => 110,  303 => 105,  300 => 104,  291 => 103,  279 => 100,  276 => 99,  273 => 98,  263 => 93,  259 => 92,  253 => 88,  251 => 87,  248 => 86,  238 => 81,  234 => 80,  227 => 76,  222 => 73,  220 => 72,  209 => 68,  201 => 63,  196 => 60,  191 => 57,  187 => 55,  185 => 54,  179 => 51,  174 => 48,  169 => 45,  165 => 43,  163 => 42,  155 => 39,  150 => 36,  148 => 35,  145 => 34,  142 => 33,  137 => 31,  132 => 30,  127 => 29,  122 => 28,  120 => 27,  113 => 26,  111 => 25,  108 => 24,  106 => 23,  103 => 22,  100 => 21,  94 => 19,  91 => 18,  88 => 17,  86 => 16,  83 => 15,  80 => 14,  74 => 12,  71 => 11,  68 => 10,  66 => 9,  63 => 8,  57 => 6,  54 => 5,  51 => 4,  42 => 3,  11 => 1,);
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

{% block toolbar %}
    {% set request_handler %}
        {% import _self as helper %}
        {{ helper.set_handler(collector.controller) }}
    {% endset %}

    {% if collector.redirect %}
        {% set redirect_handler %}
            {% import _self as helper %}
            {{ helper.set_handler(collector.redirect.controller, collector.redirect.route, 'GET' != collector.redirect.method ? collector.redirect.method) }}
        {% endset %}
    {% endif %}

    {% if collector.forward|default(false) %}
        {% set forward_handler %}
            {% import _self as helper %}
            {{ helper.set_handler(collector.forward.controller) }}
        {% endset %}
    {% endif %}

    {% set request_status_code_color = (collector.statuscode >= 400) ? 'red' : (collector.statuscode >= 300) ? 'yellow' : 'green' %}

    {% set icon %}
        <span class=\"sf-toolbar-status sf-toolbar-status-{{ request_status_code_color }}\">{{ collector.statuscode }}</span>
        {% if collector.route %}
            {% if collector.redirect %}{{ include('@WebProfiler/Icon/redirect.svg') }}{% endif %}
            {% if collector.forward|default(false) %}{{ include('@WebProfiler/Icon/forward.svg') }}{% endif %}
            <span class=\"sf-toolbar-label\">{{ 'GET' != collector.method ? collector.method }} @</span>
            <span class=\"sf-toolbar-value sf-toolbar-info-piece-additional\">{{ collector.route }}</span>
        {% endif %}
    {% endset %}

    {% set text %}
        <div class=\"sf-toolbar-info-group\">
            <div class=\"sf-toolbar-info-piece\">
                <b>HTTP status</b>
                <span>{{ collector.statuscode }} {{ collector.statustext }}</span>
            </div>

            {% if 'GET' != collector.method -%}
                <div class=\"sf-toolbar-info-piece\">
                    <b>Method</b>
                    <span>{{ collector.method }}</span>
                </div>
            {%- endif %}

            <div class=\"sf-toolbar-info-piece\">
                <b>Controller</b>
                <span>{{ request_handler }}</span>
            </div>

            {% if collector.controller.class is defined -%}
                <div class=\"sf-toolbar-info-piece\">
                    <b>Controller class</b>
                    <span>{{ collector.controller.class }}</span>
                </div>
            {%- endif %}

            <div class=\"sf-toolbar-info-piece\">
                <b>Route name</b>
                <span>{{ collector.route|default('NONE') }}</span>
            </div>

            <div class=\"sf-toolbar-info-piece\">
                <b>Has session</b>
                <span>{% if collector.sessionmetadata|length %}yes{% else %}no{% endif %}</span>
            </div>
        </div>

        {% if redirect_handler is defined -%}
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>
                        <span class=\"sf-toolbar-redirection-status sf-toolbar-status-yellow\">{{ collector.redirect.status_code }}</span>
                        Redirect from
                    </b>
                    <span>
                        {{ redirect_handler }}
                        (<a href=\"{{ path('_profiler', { token: collector.redirect.token }) }}\">{{ collector.redirect.token }}</a>)
                    </span>
                </div>
            </div>
        {% endif %}

        {% if forward_handler is defined %}
            <div class=\"sf-toolbar-info-group\">
                <div class=\"sf-toolbar-info-piece\">
                    <b>Forwarded to</b>
                    <span>
                        {{ forward_handler }}
                        (<a href=\"{{ path('_profiler', { token: collector.forward.token }) }}\">{{ collector.forward.token }}</a>)
                    </span>
                </div>
            </div>
        {% endif %}
    {% endset %}

    {{ include('@WebProfiler/Profiler/toolbar_item.html.twig', { link: profiler_url }) }}
{% endblock %}

{% block menu %}
    <span class=\"label\">
        <span class=\"icon\">{{ include('@WebProfiler/Icon/request.svg') }}</span>
        <strong>Request / Response</strong>
    </span>
{% endblock %}

{% block panel %}
    <div class=\"sf-tabs\">
        <div class=\"tab\">
            <h3 class=\"tab-title\">Request</h3>

            <div class=\"tab-content\">
                <h3>GET Parameters</h3>

                {% if collector.requestquery.all is empty %}
                    <div class=\"empty\">
                        <p>No GET parameters</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestquery, maxDepth: 1 }, with_context = false) }}
                {% endif %}

                <h3>POST Parameters</h3>

                {% if collector.requestrequest.all is empty %}
                    <div class=\"empty\">
                        <p>No POST parameters</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestrequest, maxDepth: 1 }, with_context = false) }}
                {% endif %}

                <h3>Request Attributes</h3>

                {% if collector.requestattributes.all is empty %}
                    <div class=\"empty\">
                        <p>No attributes</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestattributes }, with_context = false) }}
                {% endif %}

                <h3>Request Headers</h3>
                {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestheaders, labels: ['Header', 'Value'], maxDepth: 1 }, with_context = false) }}

                <h3>Request Content</h3>

                {% if collector.content == false %}
                    <div class=\"empty\">
                        <p>Request content not available (it was retrieved as a resource).</p>
                    </div>
                {% elseif collector.content %}
                    <div class=\"card\">
                        <pre class=\"break-long-words\">{{ collector.content }}</pre>
                    </div>
                {% else %}
                    <div class=\"empty\">
                        <p>No content</p>
                    </div>
                {% endif %}

                <h3>Server Parameters</h3>
                {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestserver }, with_context = false) }}
            </div>
        </div>

        <div class=\"tab\">
            <h3 class=\"tab-title\">Response</h3>

            <div class=\"tab-content\">
                <h3>Response Headers</h3>

                {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.responseheaders, labels: ['Header', 'Value'], maxDepth: 1 }, with_context = false) }}
            </div>
        </div>

        <div class=\"tab {{ collector.requestcookies.all is empty and collector.responsecookies.all is empty ? 'disabled' }}\">
            <h3 class=\"tab-title\">Cookies</h3>

            <div class=\"tab-content\">
                <h3>Request Cookies</h3>

                {% if collector.requestcookies.all is empty %}
                    <div class=\"empty\">
                        <p>No request cookies</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.requestcookies }, with_context = false) }}
                {% endif %}

                <h3>Response Cookies</h3>

                {% if collector.responsecookies.all is empty %}
                    <div class=\"empty\">
                        <p>No response cookies</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: collector.responsecookies }, with_context = true) }}
                {% endif %}
            </div>
        </div>

        <div class=\"tab {{ collector.sessionmetadata is empty ? 'disabled' }}\">
            <h3 class=\"tab-title\">Session</h3>

            <div class=\"tab-content\">
                <h3>Session Metadata</h3>

                {% if collector.sessionmetadata is empty %}
                    <div class=\"empty\">
                        <p>No session metadata</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/table.html.twig', { data: collector.sessionmetadata }, with_context = false) }}
                {% endif %}

                <h3>Session Attributes</h3>

                {% if collector.sessionattributes is empty %}
                    <div class=\"empty\">
                        <p>No session attributes</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/table.html.twig', { data: collector.sessionattributes, labels: ['Attribute', 'Value'] }, with_context = false) }}
                {% endif %}
            </div>
        </div>

        <div class=\"tab {{ collector.flashes is empty ? 'disabled' }}\">
            <h3 class=\"tab-title\">Flashes</h3>

            <div class=\"tab-content\">
                <h3>Flashes</h3>

                {% if collector.flashes is empty %}
                    <div class=\"empty\">
                        <p>No flash messages were created.</p>
                    </div>
                {% else %}
                    {{ include('@WebProfiler/Profiler/table.html.twig', { data: collector.flashes }, with_context = false) }}
                {% endif %}
            </div>
        </div>

        {% if profile.parent %}
        <div class=\"tab\">
            <h3 class=\"tab-title\">Parent Request</h3>

            <div class=\"tab-content\">
                <h3>
                    <a href=\"{{ path('_profiler', { token: profile.parent.token }) }}\">Return to parent request</a>
                    <small>(token = {{ profile.parent.token }})</small>
                </h3>

                {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: profile.parent.getcollector('request').requestattributes }, with_context = false) }}
            </div>
        </div>
        {% endif %}

        {% if profile.children|length %}
        <div class=\"tab\">
            <h3 class=\"tab-title\">Sub Requests <span class=\"badge\">{{ profile.children|length }}</span></h3>

            <div class=\"tab-content\">
                {% for child in profile.children %}
                    <h3>
                        <a href=\"{{ path('_profiler', { token: child.token }) }}\">
                            {{- child.getcollector('request').identifier -}}
                        </a>
                        <small>(token = {{ child.token }})</small>
                    </h3>

                    {{ include('@WebProfiler/Profiler/bag.html.twig', { bag: child.getcollector('request').requestattributes }, with_context = false) }}
                {% endfor %}
            </div>
        </div>
        {% endif %}
    </div>
{% endblock %}

{% macro set_handler(controller, route, method) %}
    {% if controller.class is defined -%}
        {%- if method|default(false) %}<span class=\"sf-toolbar-status sf-toolbar-redirection-method\">{{ method }}</span>{% endif -%}
        {%- set link = controller.file|file_link(controller.line) %}
        {%- if link %}<a href=\"{{ link }}\" title=\"{{ controller.file }}\">{% else %}<span>{% endif %}

            {%- if route|default(false) -%}
                @{{ route }}
            {%- else -%}
                {{- controller.class|abbr_class|striptags -}}
                {{- controller.method ? ' :: ' ~ controller.method -}}
            {%- endif -%}

        {%- if link %}</a>{% else %}</span>{% endif %}
    {%- else -%}
        <span>{{ route|default(controller) }}</span>
    {%- endif %}
{% endmacro %}
", "@WebProfiler/Collector/request.html.twig", "C:\\Users\\Ivo\\Desktop\\Exam Prep\\PHP Skeleton\\vendor\\symfony\\symfony\\src\\Symfony\\Bundle\\WebProfilerBundle\\Resources\\views\\Collector\\request.html.twig");
    }
}

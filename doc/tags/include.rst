``include``
===========

The ``include`` statement includes a template and returns the rendered content
of that file into the current namespace:

.. code-block:: xml+jinja

    <t:include from="header.html"/>
        Body
    <t:include from="footer.html"/>

A little bit different syntax to include a template can be:

.. code-block:: xml+jinja

    <div class="content" t:include="news.html">
        <h1>Fake news content</h1>
        <p>Lorem ipsum</p>
    </div>

In this case, the content of div will be replaced with the content of template 'news.html'.


You can add additional variables by passing them after the ``with`` attribute:

.. code-block:: xml+jinja

    <t:include from="header.html" with="{'foo': 'bar'}"/>


You can disable the access to the current context by using the ``only`` attribute:

.. code-block:: xml+jinja

    <t:include from="header.html" with="{'foo': 'bar'} only="true"/>

You can mark an include with the ``ignore-missing`` attribute in which case Twital
 will ignore the statement if the template to be included does not exist.

.. code-block:: xml+jinja

    <t:include from="header.html" with="{'foo': 'bar'} ignore-missing="true"/>

``ignore-missing`` can not be an expression; it has to be evauluated only at compile time.


To use Twig expressions as template name you have to use a namespace prefix on 'form' attribute:

.. code-block:: xml+jinja

    <t:include t:from="ajax ? 'ajax.html' : 'not_ajax.html' " />
    <t:include t:from="['one.html','two.html']" />

.. note::

    For more information about the ``include`` tag, please refer to
    `Twig official documentation <http://twig.sensiolabs.org/doc/tags/include.html>`_.

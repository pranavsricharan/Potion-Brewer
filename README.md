# Potion-Brewer
A PHP templating engine
<dl>
	<dt>Folder structure</dt>
	<dd>The static files such as css, images are stored under <i>assets/static/</i> and the templates are stored under <i>assets/templates/</i>
	<dt>Initializing</dt>
	<dd>Import the <i>potion.php</i> under <i>lib/</i> directory. Create a new instance of the Potion object with path to template and an associative array of data(optional).</dd>
	<dt>Setting values to variables</dt>
	<dd>Values can be set to variables by using the set method of the potion object. 
	
	Example:<br />
	<code>
		$template = new Potion(PATH_TO_TEMPLATE);<br />
		$template->set("title","My page title");<br />
		$template->set("sitename","My website");
	</code>
	</dd>
	<dt>Accessing data</dt>
	<dd>The data present in the variables can accessed by specifying the variable name within a pair of braces.<br />
	<code>
		&lt;html&gt;<br />
	&lt;head&gt;<br />
		&lt;title&gt; &#123;title&#125; &lt;/title&gt;</code>
	&lt;/head&gt;
	
	
	&lt;body&gt;<br />
		&lt;h3&gt;Welcome to &#123;sitename&#125;&lt;/h3&gt;
	&lt;/body&gt;<br />
	
&lt;/html&gt;
	
	</dd>
	<dt>Static files</dt>
	<dd>Static files such as images, scripts and css can be included using the static keyword.<br />
	<code>
		&lt;img src="&#123;static logo.png&#125;" /&gt;
	</code>
	<br />
	You can also change the path to static directory as follows: 
	<code>
		$template->setStaticDir("assets/files/staticfiles");
	</code>
	</dd>
</dl>

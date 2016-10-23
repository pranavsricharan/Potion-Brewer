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
		$template->set("title","My page title");
	</code>
	</dd>
	<dt>Accessing data</dt>
	<dd>The data present in the variables can accessed by specifying the variable name within a pair of braces.<br />
	<code>
		&lt;title&gt;{title}&lt;/title&gt;
	</code>
	</dd>
	<dt>Static files</dt>
	<dd>Static files such as images, scripts and css can be included using the static keyword.<br />
	<code>
		&lt;img src="{static logo.png}" /&gt;
	</code>
	</dd>
</dl>

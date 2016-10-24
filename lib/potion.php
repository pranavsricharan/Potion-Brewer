<?php
class Potion
{
	// Initialize the Potion brewing engine
	public function __construct($path,$data=array())
	{
		$this->path = $path; // Path to template file
		
		/*
		**
		** Set the default path to the directory containing static file
		** setStaticDir(PATH_TO_DIR) method can be called from the main template object also to change the static directory
		**
		*/
		$this->setStaticDir("assets/static");
		
		/*
		**
		** The data is passed as an associative array
		** The data passed can be accessed in the template by using the index name
		** For instance, the value at $data['title'] can be accessed in the template as {title} anywhere on the whole page
		**
		*/
		
		$this->data = $data; // Data to be rendered on view
	}
	// Method to add values to the data array
	public function set($key,$value)
	{
		$this->data[$key] = $value;
	}
	
	// Set path to static directory
	public function setStaticDir($path)
	{
		// Add a trailing slash to the end if the path doesn't end with a '/'
		if(strrpos($path,"/") != strlen($path) - 1)
			$path .= '/';
		$this->staticDir = $path; // Set static path
	}
	
	// The main callable function to render the template
	public function render()
	{
		// Check if template file exists
		if(file_exists($this->path))
		{
			$this->fileData = file_get_contents($this->path); // Load the file for parsing if exists
			$this->parseStatic(); // Parse the HTML file static data paths (like css,scripts and images)
			$this->parseData(); // Parse the HTML file for brewing
			$this->displayData(); // Display the final rendered result to the view
		}
		else
		{
			exit("<b>Error: </b>The following file does not exist<pre>" . $this->path . "</pre>"); // Terminate execution if file doesn't exist
		}
		
	}
	
	// Parse static file paths
	private function parseStatic()
	{
		// Find all the brewable portions of the template
		preg_match_all("({static ([^\}]+)})",$this->fileData,$matches);
		// Map all the potion static files to actual path
		for($i=0;$i<sizeof($matches[1]);$i++)
		{
			$this->fileData = preg_replace("(" . $matches[0][$i] . ")",$this->staticDir . $matches[1][$i],$this->fileData);//Replace the potion variable with actual path to file
		}
	}
	
	// Parse the template file for variables
	private function parseData()
	{
		// Find all the brewable portions of the template
		preg_match_all("({[\w]+})",$this->fileData,$matches);
		
		// Replace all the potion variables with actual data
		foreach($matches[0] as $match)
		{
			$replacementVar = trim($match,'{}'); // Trim the braces to find the array key
			if(array_key_exists($replacementVar,$this->data)) //Find if key(potion variable) is set
			{
				$this->fileData = preg_replace("($match)",$this->data[$replacementVar],$this->fileData);//Replace the potion variable with actual page data
			}
		}
	}
	
	// Display the brewed page
	private function displayData()
	{
		echo $this->fileData;
	}
}
?>
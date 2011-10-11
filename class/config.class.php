<?php


class Config
{
	protected $file_path;
	public $xml;
	
	public function __construct()
	{
		if (is_file("config.xml"))
			$this->file_path = "config.xml";
		else
			$this->file_path = "../config.xml";
			
		$this->xml = simplexml_load_file($this->file_path);
	}

	public function is_admin()
	{
		return (isset($_SESSION['admin']) and $_SESSION['admin']);
	}

	public function __get($field)
	{
		return $this->xml->$field;
	}

	/**
	 * Sauvegarde la config actuelle
	 */
	public function save()
	{
		$f = fopen($this->file_path, 'w');
		fwrite($f, $this->xml->asXML());
		fclose($f);
	}

	public function addRubrique($filename, $name)
	{
		$rubrique = $this->xml->menu->addChild('rubrique');
		$rubrique->addChild('filename', $filename);
		$rubrique->addChild('name', $name);
	}

	/**
	 * @param $menu (array<rubrique_2_array()>)
	 */
	public function addMenu($menu)
	{
		$this->xml->addChild('menu');
		var_dump($menu);
		foreach ($menu as $rubrique_arr)
			$this->addRubrique($rubrique_arr['filename'], $rubrique_arr['name']);
	}

	public function delete($node)
	{
		$xpath_node = $this->xml->xpath($node);
		if (count($xpath_node >= 1))
		{
			$xpath_node = $xpath_node[0];
			$dom_old_node = dom_import_simplexml($xpath_node);
			$dom_old_node->parentNode->removeChild($dom_old_node);
			return True;
		}
		else
			return False;
	}

	public static function rubrique_xml_2_array($rubrique)
	{
		return array("filename"=>(String)$rubrique->filename, "name"=>(String)$rubrique->name);
	}
}

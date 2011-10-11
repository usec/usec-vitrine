<?php


class Page
{
	public $filename, $filepath, $url, $state;

	const STATE_404 = -1;
	const STATE_OK = 0;
	
	public function __construct($filename)
	{
		$filename = (String)$filename;
		if (is_string($filename))
			$this->change_filename($filename);
	}

	public function change_filename($filename)
	{
		$this->filename = $filename;
		$this->compute_page_path();
		$this->compute_page_url();
	}

	/**
	 * Construit l'url pour acceder à une page
	 */
	protected function compute_page_url()
	{
		$this->url = $this->page_url($this->filename);
	}

	public static function page_url($filename)
	{
		global $config;
		if ($config->site->urlrewritting == 'on')
			return $config->siteurl . $filename . $config->site->pagesext;
		else
			return $config->siteurl . 'page.php?p=' . $filename;
	}

	/**
	 * Construit la chemin à partir de la racine pour acceder au fichier contenant la page
	 */
	protected function compute_page_path()
	{
		global $config;
		$this->filepath = $config->site->rootdir . 'pages/' . $this->filename . '.html';
		if (is_file($this->filepath))
			$this->state = self::STATE_OK;
		else
			$this->state = self::STATE_404;
	}
	
	/**
	 * Sauvegarder une page
	 */
	public function save($content)
	{
		$f = fopen($this->filepath, 'w');
		fwrite($f, $content);
		fclose($f);
	}

	public function remove()
	{
		unlink($this->filepath);
	}
}

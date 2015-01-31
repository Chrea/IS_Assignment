<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author Rhea Lauzon
 * 
 * This is a simple about page for the project.
 */
class About extends Application {

	public function index()
	{
            $this->data['pagebody'] = 'about';
            $this->render();
	}
}

/* End of file About.php */
/* Location: ./application/controllers/About.php */
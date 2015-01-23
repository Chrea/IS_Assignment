<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {

	public function index()
	{
		$this->data['pagebody'] = 'gallery';
                $this->render();
                
	}
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
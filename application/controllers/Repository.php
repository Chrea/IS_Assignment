<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Repository extends Application {

	public function index()
	{
                $this->data['pagebody'] = 'repository';
                $this->render();
	}
}

/* End of file Repository.php */
/* Location: ./application/controllers/Repository.php */
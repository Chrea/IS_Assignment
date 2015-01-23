<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
                $this->data['pagebody'] = 'home';
                $this->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
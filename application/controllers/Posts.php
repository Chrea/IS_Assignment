<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends Application {

	public function index()
	{
                $this->data['pagebody'] = 'posts';
                $this->render();
	}
}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
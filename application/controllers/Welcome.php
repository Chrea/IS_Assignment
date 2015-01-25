<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
            
            //get the newest photo added to the database
            $picture = $this->photos->getFirstPhoto();
            
            $cell[] = $this->parser->parse('_cell', (array) $picture, true);
            
            
            //prime the table class
            $this->load->library('table');
            $parms = array (
                'table_open' => '<table class="gallery">', 
                'cell_start' => '<td class="oneimage">', 
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            
            $rows = $this->table->make_columns($cell, 1);
            $this->data['newestimage'] = $this->table->generate($rows);
            
            
                $this->data['pagebody'] = 'home';
                $this->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
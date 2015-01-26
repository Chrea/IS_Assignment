<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {

	public function index()
	{
            //get all the photos from the database
            $pictures = $this->photos->getAllPhotos();
            
            //build array of formatted cells
            foreach ($pictures as $picture)
            {
                $cells[] = $this->parser->parse('_cell', (array) $picture, true);
            }
            
            //prime the table class
            $this->load->library('table');
            $parms = array (
                'table_open' => '<table class="gallery">', 
                'cell_start' => '<td class="oneimage">', 
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            
            $rows = $this->table->make_columns($cells, 3);
            $this->data['thetable'] = $this->table->generate($rows);
            
            //render the data
            $this->data['pagebody']= 'gallery';
            $this->render();
	}
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	public function index()
	{
            
            $this->newestPhotos();
            $this->newestPosts();
            
            $this->data['pagebody'] = 'home';
            $this->render();
	}
        
        /************************************************
         * Fetches the 3 newest photos in the database
         * and displays them in the side bar of the page.
         ***********************************************/
        public function newestPhotos()
        {
            //get the three newest photos
            $pictures[] = $this->photos->getNewestPhotos(3);
            ////$pictures[] = $this->photos->getFirstPhoto();            
            //$pictures[] = $this->photos->getPhoto( 2 );
            //$pictures[] = $this->photos->getPhoto( 3 );
            
            foreach ( $pictures as $picture )
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
            
            $rows = $this->table->make_columns($cells, 1);
            $this->data['newestimages'] = $this->table->generate($rows);       
        }
        
        
          /************************************************
         * Fetches the 3 newest blog posts in the database
         * and displays them in the main content region.
         ***********************************************/
        public function newestPosts()
        {
            //get the three newest posts
            $posts[] = $this->blogposts->getNewestPosts(3);
            
            foreach ( $posts as $post )
            {
                $cells[] = $this->parser->parse('_post', (array) $post, true);
            }
                  
            //prime the table class
            $this->load->library('table');
            $parms = array (
                'table_open' => '<table class="gallery">', 
                'cell_start' => '<td class="oneimage">', 
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            
            $rows = $this->table->make_columns($cells, 1);
            $this->data['newestposts'] = $this->table->generate($rows);       
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
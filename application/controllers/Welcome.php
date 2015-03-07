<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author Rhea Lauzon & Christofer Klassen
 * 
 * This page is the home page of the application.
 * It displays the 3 newest blog posts in the main
 * body and the 3 newest images in the sidebar.
 */
class Welcome extends Application {

	public function index()
	{
            $this->data['pagebody'] = 'home';
            
            $this->newestPhotos();
            $this->newestPosts();
          
            $this->render();
	}
        
        /************************************************
         * Fetches the 3 newest photos in the database
         * and displays them in the side bar of the page.
         ***********************************************/
        public function newestPhotos()
        {
            //get the three newest photos
            $pictures = $this->photos->getNewestPhotos(3);
            
            foreach ( $pictures as $picture )
            {
                $cells[] = $this->parser->parse('_cell', (array) $picture, true);
            }
                 
            if (sizeof($pictures) > 0)
            {
                //prime the table class
                $this->load->library('table');
                $parms = array (
                    'table_open' => '<table class="gallery">', 
                    'cell_start' => '<td class="oneimage">', 
                    'cell_alt_start' => '<td class="oneimage">'
                );
                $this->table->set_template($parms);

                $rows = $this->table->make_columns($cells, 1);
                //place the data on screen
                $this->data['newestimages'] = $this->table->generate($rows);
            }
            else
            {
                $this->data['newestimages'] = "";
            }
        }
        
        
          /************************************************
         * Fetches the 3 newest blog posts in the database
         * and displays them in the main content region.
         ***********************************************/
        public function newestPosts()
        {
            //get the three newest posts
            $posts = $this->blogposts->getNewestPosts(3);
                        
            foreach ( $posts as $post )
            {
                $post->images = array();
                $cells[] = $this->parser->parse('_post', (array) $post, true);
            }
            
            if (sizeof($posts))
            {
                //prime the table class
                $this->load->library('table');
                $parms = array (
                    'table_open' => '<table class="gallery">', 
                    'cell_start' => '<td class="oneimage">', 
                    'cell_alt_start' => '<td class="oneimage">'
                );
                $this->table->set_template($parms);

                $rows = $this->table->make_columns($cells, 1);
                //place the data on the screen
                $this->data['newestposts'] = $this->table->generate($rows);  
            }
            else
            {
                $this->data['newestposts'] = "There are no posts.";
            }
        }
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author Rhea Lauzon & Christofer Klassen
 * 
 * This page displays the blog posts in order
 * by the highest rated to lowest rated.s
 */
class Top_Rated extends Application {

	public function index()
	{
                $posts = $this->blogposts->getTopPosts(10);
                $content = "";
                
                // Parse each blog post into html
                foreach($posts as $post)
                {
                    $content .= $this->createPost($post);
                }
                
                // Place the blog posts html into the page
                $this->data['blogposts'] = $content;
                
                $this->data['pagebody'] = 'top_rated';
                $this->render();
	}
        
        // Parse the contents of a single post into the post template
        public function createPost($post)
        {
            $content = $this->parser->parse('_post', (array) $post, true);
            
            return $content;
        }
        
}

/* End of file Top_rated.php */
/* Location: ./application/controllers/Top_Rated.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author Rhea Lauzon & Christofer Klassen
 * 
 * This page displays all posts of the application
 * displayed chronologically (newest first, oldest last)
 */
class Posts extends Application {

        // Load all blog posts onto the page
	public function index()
	{
                $posts = $this->blogposts->getAllPosts();
                $content = "";
                
                // Parse each blog post into html
                foreach($posts as $post)
                {
                    $content .= $this->createPost($post);
                }
                
                // Place the blog posts html into the page
                $this->data['blogposts'] = $content;
                
                $this->data['pagebody'] = 'posts';
                $this->render();
	}

        // Parse the contents of a single post into the post template
        public function createPost($post)
        {
            $content = $this->parser->parse('_post', (array) $post, true);
            
            return $content;
        }
        
}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */
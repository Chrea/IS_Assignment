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
                $posts = $this->blogposts->getPostsNewestFirst();
                $content = "";
                // Parse each blog post into html
                foreach($posts as $post)
                {
                    $post['images'] = array();//$this->parseBlogImages($post);
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
        
        
        public function post($id)
        {
            //set the data to the post we want to display
            $this->data['pagebody'] = '_post';  
            $post = $this->blogposts->get($id);
            $post->images = $this->parseBlogImages($post);
            $this->data = array_merge($this->data, (array) $post);

            $this->render();            
        }
        
        //handle an upvote and update the database
        public function upvote($id)
        {   
            
            //fetch the post that is being upvoted
            $post = $this->blogposts->get($id);
            
            //update the votes value
            $post->votes++;
            $this->blogposts->update($post);
            

            redirect('/posts');

        }
        
        public function parseBlogImages($post)
        {
            $imageString = $post->images;
            $imageArray = array();
            
            while (strlen($imageString) > 0)
            {
                $pos = strpos($imageString, '~');
                if ($pos === false)
                {
                    $imageArray[] = array('img' => $imageString);
                    break;
                }
                
                $imageArray[] = array('img' => substr($imageString, 0, $pos));
                $imageString = substr($imageString, $pos + 1, strlen($imageString));
            }
                        
            return $imageArray;
        }
        
}

/* End of file Post.php */
/* Location: ./application/controllers/Post.php */

<?php

/**
 * @author Christofer Klassen
 * 
 * This is a simple mock-database representing blog posts
 * submitted to the blog page of Develop().
 */
class BlogPosts extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('blogposts', 'postId');
    }

    // Retrieve a single blog post
    public function getPost($postNum) {
        
        if ($postNum <= $this->size())
        {
            //retrieve the specified post from the database
            return $this->get($$postNum);
        }
        else
        {
            return null;
        }
      
    }
    
    // Retrieve a number of newest blog posts
    public function getNewestPosts($num) {    
        
        //fetch the highest ID value 
        $highestVal = $this->highest();
        
        $posts = array();
        
        // Retrieve the newest $num blog posts
        for ($i = 0; $i < $num &&  $i < $this->size(); $i++)
        {
            $posts[] = $this->get($highestVal -$i);
        }
        
        return $posts;
    }

    // Retrieve all blog posts
    public function getAllPosts() {
        return $this->all();
    }

    // Retrieve the first blog post
    public function getFirstPost() {
        return $this->get(1);
    }
    
    // Retrieve the top n blog posts by rating
    public function getTopPosts($num) {
        
        $postsSorted = $this->db->query('SELECT * FROM blogposts ORDER BY votes DESC');
        $postsArray = $postsSorted->result_array();
        
        $posts = array();
        
        for ($i = 0; $i < $this->size() && $i < $num; $i++)
        {
            $posts[] = $postsArray[$i];
        }
        
        return $posts;
    }
    
    //retrieve all posts in newest to oldest order
    public function getPostsNewestFirst(){
        
        $postsSorted = $this->db->query('SELECT * FROM blogposts ORDER BY postId DESC');
        $postsArray = $postsSorted->result_array();
                
        return $postsArray;
    }
}

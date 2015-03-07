<?php

/**
 * @author Christofer Klassen
 * 
 * This is a simple mock-database representing photos
 * submitted to the photos of Develop().
 */
class Photos extends MY_Model {

    // Constructor
    public function __construct() {
        parent::__construct('photos', 'photoId');
    }

    // Retrieve a single photo
    public function getPhoto($photoNum) {
        
        if ($photoNum <= $this->size())
        {
            //retrieve the specified photo from the database
            return $this->get($photoNum);
        }
        else
        {
            return null;
        }
        
    }
        

    // Retrieve a number of newest photos
    public function getNewestPhotos($num) {       
        
        // Retrieve the newest $num blog posts        
        $highestVal = $this->highest();
        
        $photos = array();
        
        for ($i = 0; $i < $num && $i < $this->size(); $i++)
        {
            $photos[] = $this->get($highestVal - $i);
        }
        
        return $photos;
    }
    
    // Retrieve all photos
    public function getAllPhotos() {
        return $this->all();
    }

    // Retrieve the first photo
    public function getFirstPhoto() {
        return $this->get(1);
    }
}

<?php

/**
 * @author Christofer Klassen
 * 
 * This is a simple mock-database representing photos
 * submitted to the photos of Develop().
 */
class Photos extends CI_Model {

    // Dummy data to represent some photos
    var $data = array(
        array('id' => '1', 'author' => 'Chris Klassen', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/7e7973792cdb7608f68f6efd3876ef56.png',
            'description' => 'Beautiful.', 'date' => 'January 23, 2015'),
        array('id' => '2', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/3590225fc185f3877a9990556a09e2b2.png',
            'description' => 'Such code.', 'date' => 'January 23, 2015'),
           array('id' => '3', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2014/07/screen2.png',
            'description' => 'So ocean.', 'date' => 'January 23, 2015'),
                array('id' => '1', 'author' => 'Chris Klassen', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/7e7973792cdb7608f68f6efd3876ef56.png',
            'description' => 'Beautiful.', 'date' => 'January 23, 2015'),
        array('id' => '2', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/3590225fc185f3877a9990556a09e2b2.png',
            'description' => 'Such code.', 'date' => 'January 23, 2015'),
           array('id' => '3', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2014/07/screen2.png',
            'description' => 'So ocean.', 'date' => 'January 23, 2015'),
                array('id' => '1', 'author' => 'Chris Klassen', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/7e7973792cdb7608f68f6efd3876ef56.png',
            'description' => 'Beautiful.', 'date' => 'January 23, 2015'),
        array('id' => '2', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2015/01/3590225fc185f3877a9990556a09e2b2.png',
            'description' => 'Such code.', 'date' => 'January 23, 2015'),
           array('id' => '3', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2014/07/screen2.png',
            'description' => 'So ocean.', 'date' => 'January 23, 2015'),
        array('id' => '3', 'author' => 'Rhea Lauzon', 'photo' => 'https://magnesiumninja.files.wordpress.com/2014/07/screen2.png',
            'description' => 'So ocean.', 'date' => 'January 23, 2015')
    );

    // Constructor
    public function __construct() {
        parent::__construct();
    }

    // Retrieve a single photo
    public function getPhoto($photoNum) {
        
        // Loop through and find the photo
        foreach ($this->data as $record)
        {
            if ($record['id'] == $photoNum)
            {
                return $record;
            }
        }
        
        // If we didn't find it, return null
        return null;
    }

    // Retrieve a number of newest photos
    public function getNewestPhotos($num) {        
        
        $photos = array();
        
        // Retrieve the newest $num blog posts
        for ($i = 0; $i < $num && $i < sizeof($this->data); $i++)
        {
            $photos[] = $this->data[$i];
        }
        
        return $photos;
    }
    
    // Retrieve all photos
    public function getAllPhotos() {
        return $this->data;
    }

    // Retrieve the first photo
    public function getFirstPhoto() {
        return $this->data[0];
    }
}

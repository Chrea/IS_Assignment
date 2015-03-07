<?php

defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * @author Christofer Klassen
 * 
 * This is the administration page.
 */
class Admin extends Application {
        function __construct()
        {
            parent::__construct();
            $this->load->helper('formfields');
            $this->load->helper('url');
          
        }
        
	public function index()
	{
            $this->data['blogposts'] = $this->blogposts->all();
            $this->data['photos'] = $this->photos->all();
            
            $this->data['pagebody'] = 'admin';

            $this->render();
	}
        
        function addPost()
        {
            $post = $this->blogposts->create();
            $this->showPost($post);
        }

        function editPost($pid)
        {
            $post = $this->blogposts->get($pid);
            $this->showPost($post);
        }
        
        function deletePost($pid)
        {
            $this->blogposts->delete($pid);
            redirect('/admin');
        }
        
        function showPost($post) {
            // Identify any errors
            $message = '';
            
            if (count($this->errors) > 0) {
                foreach ($this->errors as $error)
                {
                    $message .= $error . BR;
                }
            }
            
            $this->data['errorMessage'] = $message;
            $this->data['postId'] = $post->postId;
            
            // Fill the text fields and make the form fields
            $this->data['fImages'] = makeUploadImageField('Post images', 'userfile[]');
            $this->data['fId'] = makeTextField('Id', 'postId', $post->postId, "", 10, 10, true);
            $this->data['fAuthor'] = makeTextField('Author', 'author', $post->author);
            $this->data['fAvatar'] = makeTextField('Avatar', 'avatar', $post->avatar);
            $this->data['fTitle'] = makeTextArea('Title', 'title', $post->title);
            $this->data['fContent'] = $post->content;
            
            $this->data['pagebody'] = 'edit_post';

            $this->data['fSubmit'] = makeSubmitButton('Submit Post', "Submit the "
                    . "updated post", 'btn-success');

            $this->render();
        }

        function confirmPost($pid) {
            $record = $this->blogposts->create();
            
            // If this post already exists, retrieve its image list
            if ($pid > 0)
            {
                $temp = $this->blogposts->get($pid);
                $record->images = $temp->images;
            }
            
            //upload the image
            $config['upload_path'] = realpath('./uploads');
            $config['allowed_types'] = 'gif|jpg|png';
            
            $this->load->library('upload');
            $this->upload->initialize($config);

            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            
            for($i = 0; $i < $cpt; $i++)
            {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];    

                $this->upload->do_upload();

                $record->images .= "~../../uploads/" . $files['userfile']['name'][$i];
            }
            
            // Extract submitted fields
            $record->postId = $pid;
            $record->author = $this->input->post('author');
            $record->avatar = $this->input->post('avatar');
            $record->title = $this->input->post('title');
            $record->content = $this->input->post('content');

            // Error checking
            if (empty($record->author))
            {
                $this->errors[] = 'You must specify an author.';
            }
            
            if (empty($record->avatar))
            {
                $this->errors[] = 'You must specify an avatar.';
            }

            if (empty($record->title))
            {
                $this->errors[] = 'You must specify a title.';
            }

            if (empty($record->content))
            {
                $this->errors[] = 'You must specify a post body.';
            }
            
            if (count($this->errors) > 0)
            {
                $this->showPost($record);
                return;
            }

            // Update the record's date
            $date = getdate();
            $dateString = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
            $record->postDate = $dateString;
            
            // Add or update the record
            if (empty($record->postId)) 
            {
                $newestPost = $this->blogposts->getNewestPosts(1);
                
                if (count($newestPost) != 0)
                {
                    // If there are pre-existing posts
                    $record->postId = $newestPost[0]->postId + 1;
                }
                else
                {
                    $record->postId = 0;
                }
                
                $this->blogposts->add($record);
            }
            else 
            {
                $this->blogposts->update($record);
            }

            redirect('/admin');
        }
        
        function addPhoto()
        {
            $photo = $this->photos->create();
            $this->showPhoto($photo);
        }

        function editPhoto($pid)
        {
            $photo = $this->photos->get($pid);
            $this->showPhoto($photo);
        }
        
        function deletePhoto($pid)
        {
            $this->photos->delete($pid);
            redirect('/admin');
        }
        
        function showPhoto($photo) {
            // Identify any errors
            $message = '';
            
            if (count($this->errors) > 0) {
                foreach ($this->errors as $error)
                {
                    $message .= $error . BR;
                }
            }
            
            $this->data['errorMessage'] = $message;
            $this->data['photoId'] = $photo->photoId;
            
            // Fill the text fields
            $this->data['fId'] = makeTextField('Id', 'photoId', $photo->photoId, "", 10, 10, true);
            $this->data['fAuthor'] = makeTextField('Author', 'author', $photo->author);
            $this->data['fDescription'] = makeTextField('Description', 'description', $photo->description);
            $this->data['fTitle'] = makeTextField('Title', 'title', $photo->title);
            $this->data['fPhoto'] = makeTextField('Photo', 'photo', $photo->photo);
            
            $this->data['pagebody'] = 'edit_photo';

            $this->data['fSubmit'] = makeSubmitButton('Submit Photo', "Submit the "
                    . "updated photo", 'btn-success');

            $this->render();
        }

        function confirmPhoto($pid) {
            $record = $this->photos->create();      

            // Extract submitted fields
            $record->photoId = $pid;
            $record->author = $this->input->post('author');
            $record->description = $this->input->post('description');
            $record->title = $this->input->post('title');
            $record->photo = $this->input->post('photo');

            // Error checking
            if (empty($record->author))
            {
                $this->errors[] = 'You must specify an author.';
            }
            
            if (empty($record->photo))
            {
                $this->errors[] = 'You must specify a photo.';
            }

            if (empty($record->title))
            {
                $this->errors[] = 'You must specify a title.';
            }

            if (empty($record->description))
            {
                $this->errors[] = 'You must specify a description.';
            }
            
            if (count($this->errors) > 0)
            {
                $this->showPhoto($record);
                return;
            }

            // Update the record's date
            $date = getdate();
            $dateString = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'];
            $record->postDate = $dateString;
            
            // Add or update the record
            if (empty($record->photoId)) 
            {
                $newestPhoto = $this->photos->getNewestPhotos(1);
                
                if (count($newestPhoto) != 0)
                {
                    // If there are pre-existing posts
                    $record->photoId = $newestPhoto[0]->photoId + 1;
                }
                else
                {
                    $record->photoId = 0;
                }
                
                $this->photos->add($record);
            }
            else 
            {
                $this->photos->update($record);
            }

            redirect('/admin');
        }
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */

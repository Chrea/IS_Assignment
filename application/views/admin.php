<div id="contents">
    <h1>Blog Posts</h1>
    
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Content</th>
        </tr>
        
        {blogposts}
        <tr>
            <td>{postId}</td>
            <td>{author}</td>
            <td>{title}</td>
            <td>{content}</td>
        </tr>
        {/blogposts}
        
    </table> 
    <a href='/admin/addPost'>Add a new Post</a>
    <br />
    <br />
    <h1>Photos</h1>
    
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Photo</th>
            <th>Description</th>
        </tr>
        
        {photos}
        <tr>
            <td>{photoId}</td>
            <td>{title}</td>
            <td>{author}</td>
            <td>{photo}</td>
            <td>{description}</td>
        </tr>
        {/photos}
        
    </table> 
    <a href='/admin/addPhoto'>Add a new Photo</a>
</div>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'.richtext'});</script>

<div class="row">
  <div class="errors">{errorMessage}</div>
    <form action="/admin/confirmPost/{postId}" method="post">
    
        {fId}
        {fAuthor}
        {fAvatar}
        {fTitle}
        <textarea name="content" id="content" class="richtext">{fContent}</textarea>
        {fSubmit}
    </form>
</div>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'.richtext'});</script>

<div class="row">
  <div class="errors">{errorMessage}</div>
    <form action="/admin/confirmPost/{postId}" method="post">
    <form action="/admin/confirmPost" method="post">
        
<div class="fileinput fileinput-new input-group" data-provides="fileinput">
  <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
</div>

        {fId}
        {fAuthor}
        {fAvatar}
        {fTitle}
        <textarea name="content" id="content" class="richtext">{fContent}</textarea>
        {fSubmit}
    </form>
</div>

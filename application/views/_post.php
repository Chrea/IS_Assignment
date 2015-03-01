<div class="post">
    <div class="date">
            <p>
                <img src={avatar} />
            </p>
    </div>
    <h1><a href="/posts/post/{postId}">{title}</a><span class="author">{author}</span></h1>
    <p id="postContent">
        {content}
    </p>
    <p>
        {postDate} - {votes} votes
        <a href="/posts/upvote/{postId}">
        <img id="like" src="/images/like.png" />
        </a>
    </p>
</div>
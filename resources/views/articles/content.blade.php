<div id="page_meta" class="home-section">
    <div class="inner group">
        <div class="meta-left">
            <h2 class="page-title">Testimonials</h2>
            <div id="slogan">
                <h2>Our <span>customer</span> say..</h2>
            </div>
        </div>
        <div class="meta-right">
            <p id="crumbs" class="theme_breadcumb"><a class="home" href="#">Home Page</a>  //  <a class="no-link" href="#">Portfolio</a>  //  <a class="no-link current" href="#">Full Description</a></p>
        </div>
    </div>
</div>
<div id="primary" class="layout-sidebar-right home-section">
<div class="inner group">
    <!-- START CONTENT -->
<div id="content" class="group">
    
    <div class="clear"></div>
    
    <div class="post hentry-post blog-big">
        <div class="meta group">
            <p class="date">
                <i class="icon-calendar"></i>{{ date('d-m-Y H:i', strtotime($content->created_at)) }}
            </p>
            <p class="author">
                <i class="icon-external-link"></i> <span>{{ trans('ua.source') }}:
                <a href="{{ $content->source ?: route('home') }}"  class="link">{{ $content->source ?: route('home')}}</a></span>
            </p>
            <p class="categories">
                <i class="icon-tags"></i> <span>{{ trans('ua.cat') }}: <a href="{{ route('cat_alias', $content->category->alias) }}" class="cats">{{ trans('categories.' . $content->category->title) }}</a></span>
            </p>
            <p class="comments">
                <i class="icon-comment"></i> <span><a href="#" title="Comment on Another great article of the blog">2 comments</a></span>
            </p>
            <p class="edit-link"><i class="icon-pencil"></i><a class="post-edit-link" href="#" title="Edit Post">Edit</a></p>
        </div>
        <div class="thumbnail">
            <h1 class="post-title">{{ $content->title }}</h1>
            <div class="image-wrap">
                <img width="720" height="298" src="{{ asset(config('settings.theme')) }}/images/articles/{{ $content->img }}" class="attachment-blog_big wp-post-image" alt="{{ $content->img }}" title="{{ $content->title }}" />                            
            </div>
        </div>
        <div class="clearer"></div>
        <div class="the-content-single">
            {!! $content->text !!}
        </div>
    </div>
    
    <div id="comments">
        <h3 id="comments-title">
            <span>2</span> comments			
        </h3>
        <ol class="commentlist group">
            <li class="comment byuser comment-author-marco even thread-even depth-1">
                
                <div id="comment-3" class="comment-container">
                    <div class="comment-author vcard">
                        <img alt="" src="images/avatar/marco.jpeg" class="avatar avatar-75 photo" height="75" width="75" />                <cite class="fn">marco</cite>             
                    </div>
                    <div class="comment-meta commentmetadata">
                        <div class="intro">
                            <div class="commentDate">
                                <a href="#comment-3">
                                May 8, 2012 at 2:09 pm</a> <a class="comment-edit-link" href="#" title="Edit comment">(Edit)</a>                    
                            </div>
                            <div class="commentNumber">#&nbsp;1</div>
                        </div>
                        <div class="comment-body">
                            <p>This is a comment!</p>
                        </div>
                        <div class="reply group">
                            <a class="comment-reply-link" href="#respond">Reply</a>                
                        </div>
                    </div>
                </div>
                
                <ul class="children">
                    <li class="comment byuser comment-author-nando odd alt depth-2">
                        <div id="comment-4" class="comment-container">
                            <div class="comment-author vcard">
                                <img alt="" src="images/avatar/nando.jpeg" class="avatar avatar-75 photo" height="75" width="75" />                <cite class="fn">nando</cite>             
                            </div>
                            <div class="comment-meta commentmetadata">
                                <div class="intro">
                                    <div class="commentDate">
                                        <a href="#comment-4">
                                        May 8, 2012 at 5:02 pm</a> <a class="comment-edit-link" href="#" title="Edit comment">(Edit)</a>                    
                                    </div>
                                    <div class="commentNumber">#&nbsp;2</div>
                                </div>
                                <div class="comment-body">
                                    <p>thank you so much for you great feedback!</p>
                                </div>
                                <div class="reply group">
                                    <a class="comment-reply-link" href="#">Reply</a>                
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </li>
        </ol>
        
        <!-- START TRACKBACK & PINGBACK -->
        <h2 id="trackbacks">Trackback e pingback</h2>
        <ol class="trackbacklist">
        </ol>
        <p><em>No trackback or pingback available for this article</em></p>
        <!-- END TRACKBACK & PINGBACK -->
        
        <div id="respond">
            <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
            <form action="#" method="post" id="commentform">
                <p class="comment-form-author"><label for="author">Name</label> <input id="author" name="author" type="text" value="" size="30" aria-required="true" /></p>
                <p class="comment-form-email"><label for="email">Email</label> <input id="email" name="email" type="text" value="" size="30" aria-required="true" /></p>
                <p class="comment-form-url"><label for="url">Website</label><input id="url" name="url" type="text" value="" size="30" /></p>
                <p class="comment-form-comment"><label for="comment">Your comment</label><textarea id="comment" name="comment" cols="45" rows="8"></textarea></p>
                <div class="clear"></div>
                <p class="form-submit">
                    <input name="submit" type="submit" id="submit" value="Post Comment" />
                    <input type="hidden" name="comment_post_ID" value="390" id="comment_post_ID" />
                    <input type="hidden" name="comment_parent" id="comment_parent" value="0" />
                </p>
                <p style="display: none;"><input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="8d7e42eb4f" /></p>
            </form>
        </div>
    </div>
    
</div>
<!-- END CONTENT -->
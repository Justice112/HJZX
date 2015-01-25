<div data-role="page" id="wrap" class="recentNews">
    <header>
        <script src="/js/common.js"></script>
        <h1><a href="javascript:;" class="logo">沪江在线</a></h1>
        <a href="javascript:;" class="list">我的沪江<i></i></a>
        <a href="/Users/logout" class="key"></a>
    </header>
    <div id="content">
        <div class="newsDBG" style="background-image:url(/images/w100/01.jpg)"></div>
        <section>
            <h2><?php echo $post['Post']['title']; ?><span><?php echo $post['Post']['content']; ?></span></h2>
            <a href="/Mobile/Replies/createreply/<?php echo $post['Post']['id']; ?>" class="subscription">发表回复</a>
            <div class="recentNewsList cf">
                <h2>帖子详情<a href="/Mobile/Posts/postlist/<?php echo $post['Post']['course_id']; ?>" class="moreNews">帖子列表</a></h2>
                <?php foreach($replies as $reply): ?>
                    <div class="onereply">
                        <strong><?php echo $reply['Reply']['floor']; ?></strong>
                        <p><?php echo $reply['Reply']['content']; ?></p>
                        <span class="from">来自 <?php echo $reply['User']['name']; ?></span><span><?php echo $reply['Reply']['created']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>
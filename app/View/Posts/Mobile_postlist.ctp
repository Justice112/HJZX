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
            <h2><?php echo $course['Course']['name']; ?><span><?php echo $course['Course']['teacher_name']; ?></span></h2>
            <a href="/Mobile/Posts/createpost/<?php echo $course['Course']['id']; ?>" class="subscription">发表帖子</a>
            <div class="recentNewsList cf">
                <h2>帖子列表<a href="/Mobile/Courses/courselist" class="moreNews">回到课表</a></h2>
                <?php foreach($posts as $post): ?>
                <a href="/Mobile/Replies/replylist/<?php echo $post['Post']['id']; ?>">
                    <h3><?php echo $post['Post']['title']; ?></h3>
                    <p><?php echo $post['Post']['content']; ?></p>
                    <span class="from">来自 <?php echo $post['User']['name']; ?></span><span><?php echo $post['Post']['created']; ?></span>
                </a>
                <?php endforeach; ?>
            </div>
        </section>
    </div>
</div>
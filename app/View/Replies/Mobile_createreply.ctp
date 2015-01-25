<div data-role="page" id="wrap" class="register">
    <header>
        <script src="/js/common.js"></script>
        <h1><a href="javascript:;" class="logo">沪江在线</a></h1>
        <a href="javascript:;" class="list">我的沪江<i></i></a>
        <a href="/Users/logout" class="key"></a>
    </header>
    <div id="content">
        <form id="form1" method="post" action="/Mobile/Replies/createreply/<?php echo $post_id; ?>">
            <h2>新建帖子</h2>
            <p class="inputP"><textarea placeholder="内容" name="data[Reply][content]"></textarea></p>
            <a href="javascript:;" class="btnBlue submit">提交</a>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".popReg p").css('margin-top',$(window).height()/2-100);
        });
    </script>
</div>

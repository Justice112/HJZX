<div data-role="page" id="wrap" class="login">
    <header>
        <script src="/js/common.js"></script>
        <h1><a href="javascript:;" class="logo">沪江在线</a></h1>
        <a href="javascript:;" class="list">我的沪江<i></i></a>
        <a href="/Users/logout" class="key"></a>
    </header>
    <div id="content">
        <h2>用户登录</h2>
        <form id="form1" method="post" action="/Mobile/Users/login">
            <p class="inputP"><input type="text" data-role="none" placeholder="邮箱" name="data[User][email]"></p>
            <p class="inputP"><input type="password" data-role="none" placeholder="密码" name="data[User][password]"></p>
            <a href="javascript:;" class="btnBlue submit">登录</a>
            <div class="cf">
                <a href="javascript:;" class="findKey">找回密码</a>
                <a href="/Mobile/Users/register" class="registerA">注册新用户</a>
            </div>
        </form>
    </div>
</div>
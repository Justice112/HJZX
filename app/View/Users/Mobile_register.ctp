<div data-role="page" id="wrap" class="register">
    <header>
        <script src="/js/common.js"></script>
        <h1><a href="javascript:;" class="logo">沪江在线</a></h1>
        <a href="javascript:;" class="list">我的沪江<i></i></a>
        <a href="/Users/logout" class="key"></a>
    </header>
    <div id="content">
        <form id="form1" method="post" action="/Mobile/Users/register">
            <h2>注册新用户</h2>
            <p class="inputP"><input type="text" data-role="none" name="data[User][email]" placeholder="邮箱"></p>
            <p class="inputP"><input type="text" data-role="none" name="data[User][name]" placeholder="姓名"></p>
            <p class="inputP"><input type="password" data-role="none" name="data[User][password]" placeholder="密码"></p>
            <p class="selectBox inputP"><select name="data[User][role]"><option value="学生">学生</option><option value="老师">老师</option></select><i></i></p>
            <p class="ps"><i></i>请正确填写学号，以便导入课表</p>
            <p class="inputP"><input type="text" data-role="none" placeholder="学号" name="data[jwcName]"></p>
            <p class="inputP"><input type="password" data-role="none" placeholder="教务处密码" name="data[jwcPwd]"></p>
            <a href="javascript:;" class="btnBlue submit">注册</a>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".popReg p").css('margin-top',$(window).height()/2-100);
        });
    </script>
</div>

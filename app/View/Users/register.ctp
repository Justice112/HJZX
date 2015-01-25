<h1>Register</h1>
<form id="form1" method="post"
	action="<?php echo $this->Html->url(array('action' => 'register')); ?>">
	<label>邮箱<input type="text" name="data[User][email]"><span
		class="errorInfo"></span></label> 
	<label>密码<input type="password"
		name="data[User][password]"><span class="errorInfo"></span></label> 
	<label>姓名<input
		type="text" name="data[User][name]"><span class="errorInfo"></span></label>
	<label>角色<input type="text" name="data[User][role]"><span
		class="errorInfo"></span></label> 
	<label>学号<input type="text"
		name="data[jwcName]"><span class="errorInfo"></span></label> 
	<label>教务处密码<input
		type="text" name="data[jwcPwd]"><span class="errorInfo"></span></label>
	<a href="javascript:document:form1.submit();">提交</a>
</form>
<script>
$('#form1 input').change(function(){ 
	var thisHtml = $(this);
	$.ajax({
		async:false,
		type:'post',
		complete:function(request, json) {
			thisHtml.siblings('.errorInfo').text(request.responseText); 
		},
		url:'/HJZX/users/emailIsOne/'+$(this).val()
	});
});
</script>
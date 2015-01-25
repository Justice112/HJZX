<h1>login</h1>
<form id="form1" method="post"
	action="<?php echo $this->Html->url(array('action' => 'login')); ?>">
	<label>账号
		<input type="text" name="data[User][email]">
		<span class="errorInfo"></span>
	</label>
	<label>密码
		<input type="password" name="data[User][password]">
		<span class="errorInfo"></span>
	</label>
	<a href="javascript:document:form1.submit();">提交</a>
	<a href="/HJZX/users/register">注册</a>
</form>
<script>

</script>
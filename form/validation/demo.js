$(document).ready(function(){

	/**
	 * 添加错误提示
	 *
	 * @param e element 节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-1
	 * @author jun
	 * @return bool
	 */
	function addError(e, t, s=false){
		if(s){
			t='请填写该项';
		}
		var m = '<td class="status"><label id="user_name-error" class="error" for="user_name">'+t+'</label></td>';
		$(e).parent().parent().append(m); // 添加错误提示
		$(e).addClass('error');// 错误input状态
		return true;
	}

	function removeError(e){
		$(e).parent().next().remove(); // 去除错误提示
		$(e).removeClass('error'); // 错误input状态
		return true;
	}

	/**
	 * 判断是否填写
	 * 如果s是false那么默认提示不变，
	 * 如果s是true那么提示字符改变
	 * 
	 * @param e element节点
	 * @param t 错误提示文字
	 * @param s 如果s为真那么错误提示改变
	 * @since 2015-10-1
	 * @author jun
	 * @return bool
	 */
	function noEmpty(e, t, s=false){
		var text = $(e).val().length;
		removeError(e);
		if(text){
			return true;
		}else{
			if(s) addError(e, t);
			else addError(e);
			return false;
		}
	}


	$("#sub").click(function(){
		noEmpty("#u_name",'请填写用户名',true);
	});
});

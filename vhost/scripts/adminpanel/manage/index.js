requirejs([ 'jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message' ],
		function($, aci) {
			
			$('#refreshBtn').click(mytogglerefresh);
			$('#refreshBtnF').click(mytogglerefresh);
			
			$('#searchform').bootstrapValidator({
				message : '输入项不能为空',
				feedbackIcons : {
					valid : 'glyphicon glyphicon-ok',
					invalid : 'glyphicon glyphicon-remove',
					validating : 'glyphicon glyphicon-refresh'
				},
				fields : {
					keyword : {
						validators : {
							notEmpty : {
								message : '请输入'
							}
						}
					}
				}
			}).on('success.form.bv', function(e) {
				e.preventDefault();
				$("#dosubmit").attr("disabled", "disabled");
				$.scojs_message('正在查找，请稍候...', $.scojs_message.TYPE_WAIT);
			});
		});
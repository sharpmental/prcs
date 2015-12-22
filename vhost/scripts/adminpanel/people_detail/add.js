requirejs([ 'jquery', 'jquery-ui-dialog-extend', 'aci', 'bootstrapValidator',
		'bootstrap', 'message' ], function($, jui, aci) {

	var validator_config = {
		message : '输入框不能为空',
		feedbackIcons : {
			valid : 'glyphicon glyphicon-ok',
			invalid : 'glyphicon glyphicon-remove',
			validating : 'glyphicon glyphicon-refresh'
		},
		fields : {
			person_id : {
				validators : {
					notEmpty : {
						message : '人员ID不能为空'
					},
					numeric : {
						message : '必须是数字'
					}
				}
			},
			person_no : {
				validators : {
					notEmpty : {
						message : '人员NO不能为空'
					},
					numeric : {
						message : '必须是数字'
					}
				}
			},
			person_name : {
				validators : {
					notEmpty : {
						message : '名称不能为空'
					}
				}
			},
			birthday : {
				validators : {
					notEmpty : {
						message : '出生日期不能为空'
					},
					data : {
						format : 'YYYY/DD/MM h:m:s',
						message : '必须为YYYY/DD/MM h:m:s'
					}
				}
			},
			gender : {
				validators : {
					notEmpty : {
						message : '性别不能为空'
					}
				}
			},
		}
	};

	$('#validateform').bootstrapValidator(validator_config).on(
			'success.form.bv',
			function(e) {
				e.preventDefault();

				$("#dosubmit").attr("disabled", "disabled");

				$.scojs_message('请稍候...', $.scojs_message.TYPE_WAIT);
				$.ajax({
					type : "POST",
					url : SITE_URL + folder_name + "/people_detail/add/",
					data : $("#validateform").serialize(),
					success : function(response) {
						var dataObj = jQuery.parseJSON(response);
						if (dataObj.status) {
							$.scojs_message('操作成功,3秒后将返回列表页...',
									$.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL + folder_name
									+ '/edittable/index/', 1);
						} else {
							$.scojs_message(dataObj.tips,
									$.scojs_message.TYPE_ERROR);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error : function(request, status, error) {
						$.scojs_message(request.responseText,
								$.scojs_message.TYPE_ERROR);
						$("#dosubmit").removeAttr("disabled");
					}
				});

			}).on('error.form.bv', function(e) {
		$.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);
		$("#dosubmit").removeAttr("disabled");
	});
});
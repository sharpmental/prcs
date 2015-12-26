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
			people_id : {
				validators : {
					notEmpty : {
						message : '人员ID不能为空'
					},
					numeric : {
						message : '必须为数字'
					}
				}
			},
			people_no : {
				validators : {
					notEmpty : {
						message : '用户号码不能为空'
					},
					numeric : {
						message : '必须为数字'
					}
				}
			},
			people_name : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
//			birthday : {
//				validators : {
//					notEmpty : {
//						message : '不能为空'
//					},
//					date : {
//						format : 'YYYY-MM-DD',
//						message : '时间必须为YYYY-MM-DD'
//					}
//				}
//			},
			gender : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			education : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			job : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			homeland : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			liveland : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			national : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			},
			zipcode : {
				validators : {
					notEmpty : {
						message : '不能为空'
					},
					numeric : {
						message : '必须为数字'
					}
				}
			},
			sentence : {
				validators : {
					notEmpty : {
						message : '不能为空'
					},
					numeric : {
						message : '必须为数字'
					}
				}
			},
//			start : {
//				validators : {
//					notEmpty : {
//						message : '不能为空'
//					},
//					date : {
//						message : '必须为数字',
//						format : 'YYYY-MM-DD',
//						message : '时间必须为YYYY-MM-DD'
//					}
//				}
//			},
//			end : {
//				validators : {
//					notEmpty : {
//						message : '不能为空'
//					},
//					date : {
//						message : '必须为数字',
//						format : 'YYYY-MM-DD',
//						message : '时间必须为YYYY-MM-DD'
//					}
//				}
//			},
//			entertime : {
//				validators : {
//					notEmpty : {
//						message : '不能为空'
//					},
//					date : {
//						message : '必须为数字',
//						format : 'YYYY-MM-DD',
//						message : '时间必须为YYYY-MM-DD'
//					}
//				}
//			},
			level : {
				validators : {
					notEmpty : {
						message : '不能为空'
					},
//					numeric : {
//						message : '必须为数字'
//					}
				}
			},
			status : {
				validators : {
					notEmpty : {
						message : '不能为空'
					},
					numeric : {
						message : '必须为数字'
					}
				}
			},
			crime : {
				validators : {
					notEmpty : {
						message : '不能为空'
					}
				}
			}
		}
	};

	$('#birthday').datepicker({
		  dateFormat: "yy-mm-dd"
	});
	$('#start').datepicker({
		  dateFormat: "yy-mm-dd"
	});
	$('#end').datepicker({
		  dateFormat: "yy-mm-dd"
	});
	$('#entertime').datepicker({
		  dateFormat: "yy-mm-dd"
	});
	
	$('#validateform').bootstrapValidator(validator_config).on(
			'success.form.bv',
			function(e) {
				e.preventDefault();

				$("#dosubmit").attr("disabled", "disabled");

				$.scojs_message('请稍候...', $.scojs_message.TYPE_WAIT);
				$.ajax({
					type : "POST",
					url : SITE_URL + folder_name + "/people_detail/modify/" + id,
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
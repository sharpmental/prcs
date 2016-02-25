requirejs([ 'jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message' ],
		function($, aci) {
			/* For auto refresh control */
			var reloadtime = 15000;
			var startreload = 1;

			function myrefresh() {
				if (startreload > 0) {
					$.scojs_message('自动刷新', $.scojs_message.TYPE_OK);
					window.location.reload();
				}
			}

			function mytogglerefresh() {
				startreload = !startreload;

				if (startreload > 0) {
					$('#refreshBtn>span').text(' 停止刷新');
					$('#refreshBtnF>span').text(' 停止刷新');
				} else {
					$('#refreshBtn>span').text(' 开始刷新');
					$('#refreshBtnF>span').text(' 开始刷新');
				}
			}

			setInterval(myrefresh, reloadtime);

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

			$('#outBtn').click(
					function(event) {

						var par = "";
						$('.pid_sel').each(function(index, element) {
							if (this.checked)
								par = par + $(this).attr('value') + '_';
						});

						$.ajax({
							type : "POST",
							url : SITE_URL + folder_name + "/manage/out/",
							data : {
								id : par
							},
							success : function(response) {
								var dataObj = jQuery.parseJSON(response);
								if (dataObj.status) {
									$.scojs_message('操作成功,3秒后将返回列表页...',
											$.scojs_message.TYPE_OK);
									aci.GoUrl(SITE_URL + folder_name
											+ '/manage/index/', 1);
								} else {
									$.scojs_message(dataObj.tips,
											$.scojs_message.TYPE_ERROR);
								}
							},
							error : function(request, status, error) {
								$.scojs_message(request.responseText,
										$.scojs_message.TYPE_ERROR);
							}
						});
					});

			$('#backBtn').click(
					function(event) {

						var par = "";
						$('.pid_sel').each(function(index, element) {
							if (this.checked)
								par = par + $(this).attr('value') + '_';
						});

						$.ajax({
							type : "POST",
							url : SITE_URL + folder_name + "/manage/back/",
							data : {
								id : par
							},
							success : function(response) {
								var dataObj = jQuery.parseJSON(response);
								if (dataObj.status) {
									$.scojs_message('操作成功,3秒后将返回列表页...',
											$.scojs_message.TYPE_OK);
									aci.GoUrl(SITE_URL + folder_name
											+ '/manage/index/', 1);
								} else {
									$.scojs_message(dataObj.tips,
											$.scojs_message.TYPE_ERROR);
								}
							},
							error : function(request, status, error) {
								$.scojs_message(request.responseText,
										$.scojs_message.TYPE_ERROR);
							}
						});
					});
		});
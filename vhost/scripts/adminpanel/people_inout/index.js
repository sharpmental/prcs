requirejs([ 'jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message', 'jquery-ui' ],
		function($, aci) {

			$('#refreshBtn').click(mytogglerefresh);
			$('#refreshBtnF').click(mytogglerefresh);
			$('#startdate').datepicker({
				  dateFormat: "yy-mm-dd"
			});
			$('#enddate').datepicker({
				  dateFormat: "yy-mm-dd"
			});
		});

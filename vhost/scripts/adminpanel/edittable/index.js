requirejs([ 'jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message' ],
		function($, aci) {

			$('#refreshBtn').click(myfresh);
			$('#refreshBtnF').click(myfresh);
			
			function myrefresh(){
				windows.location.reload();
			} 
		});

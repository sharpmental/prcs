requirejs([ 'jquery', 'aci', 'bootstrap', 'bootstrapValidator', 'message' ],
		function($, aci) {

			$('#refreshBtn').click(myrefresh);
			$('#refreshBtnF').click(myrefresh);
			
			function myrefresh(){
				windows.location.reload();
			} 
		});

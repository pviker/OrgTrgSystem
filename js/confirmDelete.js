
/** Validates zip code **/
function confirmUserDelete() {

	document.getElementById("delete").innerHTML = "HELLO";
    var txt;
    var deleteConfirm = confirm("Are you sure you would like to delete this user?");
    if (deleteConfirm == true) {
        txt = "You want to delete";
    } else {
        txt = "You cancelled deletion";
    }
   // document.getElementById("delete").innerHTML = txt;
}

function confirmWindow() {
	
	//var redirect = "deleteEmployee.php?id="+id;
	//document.querySelector('.confirmDelete').onclick = function(){
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this employee!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#003f7f',
			confirmButtonText: 'Yes, delete employee!',
			cancelButtonText: "No, cancel!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
		    if (isConfirm){
		    	//window.location.assign(redirect);
		    	var flag = true;
		    	
		    	//swal("Deleted!", "Employee delete successful!", "success");
		    } else {
		      swal("Cancelled", "Employee not deleted", "error");
		      var flag = false;
		    }
		});
	//};
		return flag;
}

function alertBox(id) {
	var redirect = "deleteEmployee.php?id="+id;
	//document.querySelector('.confirmDelete').onclick = function(){
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this employee!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#003f7f',
			confirmButtonText: 'Yes, delete employee!',
			cancelButtonText: "No, cancel!",
			closeOnConfirm: false,
			closeOnCancel: false
		},
		function(isConfirm){
		    if (isConfirm){
		    	window.location.assign(redirect);
		    	//swal("Deleted!", "Employee delete successful!", "success");
		    } else {
		      swal("Cancelled", "Employee not deleted", "error");
		    }
		});
	//};
}
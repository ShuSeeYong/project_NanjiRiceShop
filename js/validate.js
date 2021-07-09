function validateNewForm() {
	var primage = document.forms.newForm.idimage.value;
	var prname = document.forms.newForm.idname.value;
	var prtype = document.forms.newForm.idtype.value;
	var prprice = document.forms.newForm.idprice.value;
	var prqty = document.forms.newForm.idqty.value;
	
	if ((prname === '') || (prtype === '') || (prprice === '') || (prqty === '')) {
		alert('Please fill in all required fields');
		return false;
	}

	if(primage !=''){
	}else{
		alert ("No Image is Selected...");
		return false;
	}

	if (prtype== 'noselection') {
		alert("Please select the food type...");
		return false;
	}
}

function validateCartForm() {
	var prname = document.forms.cartForm.idname.value;
	var prprice = document.forms.cartForm.idprice.value;
	var qty = document.forms.cartForm.idqty.value;

	if ((prname === '') || (prtype === '') || (prprice === '') || (qty === '') ) {
		alert('Please fill in all required fields');
		return false;
	}
}

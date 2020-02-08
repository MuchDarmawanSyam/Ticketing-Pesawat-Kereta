function showpass(){

	var x = document.getElementById('password');

	if (x.type === "password"){

		x.type = "text";
	}
	else
	{
		x.type = "password";
	}
}

function time_now(){

	var waktu = new Date();
	setTimeout("time_now()", 1000);
	document.getElementById("jam").innerHTML = waktu.getHours();
	document.getElementById("menit").innerHTML = waktu.getMinutes();
	document.getElementById("detik").innerHTML = waktu.getSeconds();
}

function copytext() {

  var copyText = document.getElementById("copywa");


  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

 
  document.execCommand("copy");


  alert("Copied to Clipboard: " + copyText.value);
} 
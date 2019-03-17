// const nama = document.getElementsById("nama");
// // console.log(nama.value());
// nama.addEventListener("click", function(){ 
// 	alert("Hello World!");
// });
// function tes() {
// 	alert('TES');
// }

$(document).ready(function () {
	$("#nama").change(function () {
		$("#input").load('../tes.php?nama=' + $("#nama").val());
	});
	$("#hitung").click(function () {
		// $("#total").val()="tes";
		// console.log('tes');
		let a = $("#harga_jual").val();
		let b = $("#jmlh").val();
		let c = a * b;
		$("#total").attr('value', c);
	});
});
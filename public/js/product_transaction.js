$(function(){
	$("#add-product").submit(function(){
		var sku = $("#sku").val();
		var qty = $("#qty").val();

		$.ajax({
			'url':'sell/add',
			'method':'post',
			'data': {"sku":sku , "qty":qty},
			'success':function(data){
				$("#temp-product").append(data);
			}
		});

		$("#sku").val("");
		$("#qty").val("");

		return false;
	});
});

function remove_product(id){
	$("#SKU-PROD-11").remove();
}
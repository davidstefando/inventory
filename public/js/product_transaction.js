


	$("#add-product-to-sell").submit(function(){
		var sku = $("#sku").val();
		var qty = $("#qty").val();

		if(!document.getElementById(sku)){
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
		} else {
			$("#sku").val("");
			$("#qty").val("");
		}
			
		return false;
	});

	$("#add-product-to-purchase").submit(function(){
		var sku = $("#sku").val();
		var qty = $("#qty").val();
		var supplier = $("#supplier").val();

		if(!document.getElementById(sku)){
			$.ajax({
			'url':'purchase/add',
			'method':'post',
			'data': {"sku":sku , "qty":qty, "supplier":supplier},
			'success':function(data){
				$("#temp-product").append(data);
				}
			});
			
			$("#sku").val("");
			$("#qty").val("");	
		} else {
			$("#sku").val("");
			$("#qty").val("");
		}

		return false;
	});

	/** 
	*	Product Autocomplete
	*	Suggest product by SKU or Name
	*/
	$("#sku").on('keyup', function(){
		$("#autocomplete-result").css({'display' : 'block'});

		var qry = this.value;

		$.ajax({
			'url' : $("#sku").attr('url'),
			'method' : 'post',
			'data' : {'qry' : qry},
			'success' : function(result){
				$("#autocomplete-result").html(result);
			}			
		});
	});	

	function autocomplete_select(id){
		$("#autocomplete-result").css({'display' : 'none'});		
		$("#sku").val(id);
	}


function remove_product(id){
	$('#'+id).remove();
}
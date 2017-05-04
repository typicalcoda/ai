
var toModify = null;

// FUNCTIONS ======================
function applyModifier(item, modifier){

	
	item.children()[1].innerHTML += "<br/>-<span style='font-size:12px;font-style:italic;'>" + modifier.name + "</span>";
	item.children()[2].innerHTML += "<br/><span style='font-size:12px;font-style:italic;'>£" + modifier.price + "</span>";

}

function addItem(name,price, sc){
	sc = sc.replaceAll("%20", " ");
	sc = sc.replaceAll("%2520", " ");
	name = name.replaceAll("%2520", " ");
	name = name.replaceAll("%20", " ");
	var content = "<tr data-price=" + price + "><td><button data-qty=\"plus\" class=\"qty\"><i class=\"fa fa-plus fa-fw\"></i></button><span class=\"show-qty\">x1</span><button data-qty=\"minus\" class=\"qty\"><i class=\"fa fa-minus fa-fw\"></i></button></td><td>"+name+" (" + sc +")</td><td>£"+(price*1).toFixed(2)+"</td><td><button class=\"remove\"><i class=\"fa fa-remove\"></i></button><button class=\"leaf\"><i class=\"fa fa-leaf fa-fw\"></i></button></td></tr>";
	$("#cart").append(content);

	//price 
	var currentPrice = $(".basket-subtotal").text() * 1;
	var newPrice = (price + currentPrice).toFixed(2);

	$(".basket-subtotal").text(newPrice);



	

}
String.prototype.replaceAll = function(search, replacement) {
	var target = this;
	return target.replace(new RegExp(search, 'g'), replacement);
};

function showPopup(products, subCategoryName){

	// at this point, we've got all of the relevant products, and we're just focused on displaying them

	$("#modal").show();

	var contentString = "";
	for (var i = 0; i < products.length; i++) {

		contentString += "<li onclick=addItem(\"" + encodeURIComponent(products[i].name) + "\"," + products[i].price + ",\"" + encodeURIComponent(subCategoryName) + "\") id=" + products[i].id + "><div class='product'>" +
		"<span class='name'>" + products[i].name + "</span><br>" + 
		"<span class='price'>£"+ products[i].price +"</span>" + 
		"<span class='description'>" +
		products[i].description +
		"</div></li>";
	}
	$("#modal-content").html(contentString);
}
function popup(subcategoryId, subCategoryName){
	var sID = subcategoryId;
	subCategoryName = subCategoryName.replace('+', ' ');
	var products = [];
	$.ajax({

		type: 'GET',
		url:  siteUrl + "api/get-p.php",
		data: 'sID=' + sID,

		success: function(data){
			products = JSON.parse(data);

			showPopup(products, subCategoryName);
		}
	});
}
function loadIntoView(items, isSubcategory, categoryName){

	var content = "";
	for (var i = 0; i < items.length - 1; i++){

		
		content += !isSubcategory ? "<li onclick=addItem(\"" + encodeURIComponent(items[i].name) + "\"," + items[i].price + ",\"" + encodeURIComponent(categoryName) + "\") >" : 
		"<li onclick=popup(" + items[i].id + ",\"" + encodeURIComponent(items[i].name) + "\") >" ;

		content += "<div class=\"product\">";

		content += "<span class=\"name\">"+ items[i].name +"</span>";
		
		if(!isSubcategory)
			content += "<span class=\"price\">£" + items[i].price + "</span>";

		content += "<span class=\"description\">"+ items[i].description +"</span>";


		content += "</div>";
		content += "</li>";

	} 
	$("#content").html(content);	
}

function clearCart(){

	$("#cart").html("");

	$(".basket-subtotal").text("0.00");
}


$(document).ready(function(){

	$(".exit-modifier").click(function(){

		$(".modifier-modal").fadeOut(300);

	});

	$(".apply").click(function(){

		$(".modifier-modal").fadeOut(300);

	});

	$("body").on('click','.leaf', function(){

		toModify = $(this).parent().parent(); //global var
		$(".modifier-modal .title").html("Add modifier to <b>" + toModify.children()[1].innerText + "</b>");
		$(".modifier-modal").fadeIn(300);

	});

	$("body").on('click', '#mod', function(){
		
		var modifierText = $(this).children()[1].innerText;		
		var modifierPrice = $(this).children()[0].innerText.substr(1);	

		var modifier = {
			name : modifierText,
			price : modifierPrice
		};

		applyModifier(toModify, modifier);

	});



	$("#checkout").click(function(e){
		$.ajax({

			type:'POST',
			url: siteUrl+"api/sesh.php",
			data: 'order=' + $("#order").html(),
			success:function(data){

				console.log(data);

			}
		});
		window.location = siteUrl+'members/checkout.php';
	});

	$("#cart").on('click', '.qty', function(){

		var addOrRemove = $(this).data('qty') == "plus" ? true : false;
		var newQty = 0;
		var qty = addOrRemove ? $(this).next('.show-qty').text().substr(1) : $(this).prev('.show-qty').text().substr(1);				
		
		if((!addOrRemove && qty > 1) || (addOrRemove)) {
			if(addOrRemove){

				newQty = (qty * 1 + 1);
				$(this).next('.show-qty').text("x"+ newQty);			
			}

			else {


				newQty = (qty * 1 - 1);
				$(this).prev('.show-qty').text("x"+ newQty);
			}


		// price updating affects both circumstances

		console.log("Price is now being updated, okay?");
		var row = $(this).parent().parent();
		var originalProductPrice = ($(row).data('price') * 1);
		console.log("Original Price: " + originalProductPrice);
		var currentPrice = ($(row).children()[2].innerHTML.substr(1) * 1);
		console.log(("Current Price: " + currentPrice));
		var newPrice = addOrRemove ? (currentPrice + originalProductPrice) : (currentPrice - originalProductPrice);
		console.log("New Price: " + newPrice);
		var priceField = $(row).children()[2];

		// as well as updating the item's price
		priceField.innerHTML = "£" + newPrice.toFixed(2);

		// we also need to update the overall total price
		var currentTotalPrice = ($(".basket-subtotal").text() * 1);
		var newTotalPrice = addOrRemove ? (currentTotalPrice + originalProductPrice) : (currentTotalPrice - originalProductPrice);

		$(".basket-subtotal").text(newTotalPrice.toFixed(2));

	}


});



	$("body").on('click', '.remove', function(){
		
		var tr = $(this).closest('tr');
		var price = tr.children()[2].innerHTML.substr(1);

		console.log("The price is: "+ price);

		tr.remove();

			// GET PRICE (without currency symbol)
			var currentPrice = $(".basket-subtotal").text();
			var newPrice = (currentPrice - price).toFixed(2);

			$(".basket-subtotal").text(newPrice);


			// TODO: deduct from total
			// Apply changes


		});

	$(":not(#modal,.modifier-modal)").click(function(){

		$('#modal').hide();
	});


	$(".food-cat").on('click', function(e){
		e.preventDefault();
		var categoryID = $(this).children()[0].id;
		var categoryName = $(this).children()[0].innerHTML;
		var products = [];
		$("#category_title").text($(this).text());


		$.ajax({

			type:'POST',
			url: siteUrl+"api/get-scorp.php",
			data: 'category_id=' + categoryID + "&category_name=" + categoryName,
			success:function(data){

				data = JSON.parse(data);
				loadIntoView(data, data[data.length - 1].is_subcategory, categoryName);

			}
		});
	});
});
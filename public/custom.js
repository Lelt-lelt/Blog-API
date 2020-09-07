$(document).ready(function(){
	count();
	$(".card-body").on('click','.addtocart',function(){
		// alert("Hello");
		var id = $(this).data('id');
		var photo = $(this).data('photo');
		var name = $(this).data('name');
		var price = $(this).data('price');
		var discount = $(this).data('discount');

		var item={
			id:id,
			photo:photo,
			name:name,
			price:price,
			discount:discount,
			qty:1
		}
		var item_str = localStorage.getItem("item");
		var item_arr;
		if(item_str==null){
					item_arr = Array(); // cridte array
				}else{
					item_arr=JSON.parse(item_str); // chg string to array
				}

				var status=false;
				$.each(item_arr,function(i,v){
					if(id==v.id){
						status=true;
						v.qty++;
					}
				})
				if(!status){
						item_arr.push(item); // input data to array
					}


				var shopData=JSON.stringify(item_arr); // chg data from array to string
				localStorage.setItem("item",shopData); // input string data
				count();

			})

	function count(){
		var item_str=localStorage.getItem("item");
		if(item_str){
			var item_arr=JSON.parse(item_str);

			var count=0;
			$.each(item_arr,function(i,v){
				count +=v.qty;
				$("#count").text(count);
			})
		}
	}
	showTable();
	function showTable(){
		var item_str = localStorage.getItem("item");
		if (item_str) {
			var item_arr=JSON.parse(item_str);
			// console.log(item_arr);	
			var mytable = '';
			var total = 0;
			var j=1;

			$.each(item_arr,function(i,v){
				var id = v.id;
				var photo = v.photo;
				var name = v.name;
				var price = v.price;
				var discount = v.discount;
				var qty = v.qty;
				if (discount>0) {
					var unit = discount;
				}
				else{
					var unit = price;
				}
				var subtotal = unit*qty;
				mytable += `<tr>
				<td>${j++}</td>
				<td><img src="${v.photo}" width="100" height="50"></td>
				<td>${v.name}</td>
				<td>${v.price}</td>
				<td>`;
				if (discount>0) {
					mytable+=`<h5 class="text-danger">${discount}ks</h5>
					<p class="font-weight-lighter"><del>${price}Ks</del></p>`
				}
				else{
					mytable += `<h5 class="text-danger">${price} Ks</h5>`;
				}
				mytable+=`</td>
				<td>
				<button class="btn btn-outline-danger minus mx-3" data-item_i="${i}"><i class="fas fa-minus"></i></button> ${v.qty} 
				<button class="btn btn-outline-danger plus mx-3" data-item_i="${i}"><i class="fas fa-plus"></i></button>
				</td>
				<td>${subtotal}</td>
				<td><button class="btn btn-outline-danger remove" data-id="${i}"><i class="fas fa-times"></i></button></td>
				</tr>`;
				total+=subtotal;
			});
			mytfoot = `<tr>
			<td colspan="9">
			<h3 class="text-right">Total : ${total}</h3>
			</td>
			</tr>
			<tr>
			<td colspan="6">
			<textarea class="form-control" id="notes"></textarea>
			</td>
			<td colspan="4">
			<button class="btn btn-secondary btn-block checkoutbtn" data-total=${total} style="background-color: #673AB7; border-color:#673AB7">Check out</button>
			</td>
			</tr>`;
			$('.shoppingcart_div').show();
			$('.noneshoppingcart_div').hide();
			$('#shoppingcart_table').html(mytable);
			$('#shoppingcart_tfoot').html(mytfoot);
			// $('#tbody').html(mytable);
		}
		else{
			// mytable = '';
			// $('#tbody').html(mytable);
			$('.shoppingcart_div').hide();
			$('.noneshoppingcart_div').show();
		}
	}
	$("#shoppingcart_table").on('click','.plus',function(){
		var item_i=$(this).data("item_i");

		var item_str=localStorage.getItem("item");
		if(item_str){
			var item_arr=JSON.parse(item_str);

			$.each(item_arr,function(i,v){
				if(item_i==i){
					v.qty++;
				}
				var itemData=JSON.stringify(item_arr);
				localStorage.setItem("item",itemData);
				showTable();
			})
		}
	})
	$("#shoppingcart_table").on('click','.minus',function(){
		var item_i=$(this).data("item_i");
		var item_str=localStorage.getItem("item");
		if(item_str){
			var item_arr=JSON.parse(item_str);
			$.each(item_arr,function(i,v){
				if(item_i==i){
					v.qty--;
					if(v.qty==0){
						item_arr.splice(item_i,1);
					}
				}
				var itemData=JSON.stringify(item_arr);
				localStorage.setItem("item",itemData);
				showTable();
			})
		}
	})
	
	$("#shoppingcart_table").on('click','.remove',function(){
		var id=$(this).data("id");
		var item_str=localStorage.getItem("item");
		var item_arr = JSON.parse(item_str);
		$.each(item_arr,function(i,v){
			if (i==id) {
				item_arr.splice(id,1);
			}
		})
		var itemData = JSON.stringify(item_arr);
		localStorage.setItem("item",itemData);
		showTable();
		cartnoti();
	});

	$('.checkoutbtn').click(function(){
		$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
		// alert("Hello");
		let lostr = localStorage.getItem("item");
		let note = "Hello !"
		// let itemArr = JSON.parse(lostr);
		
		$.post('/orders', {data:lostr,note:note},function(res){
			console.log(res);
		})
	})
});

// Steps we will take
// We need to capture all the add to cart buttons
// We need to attach an event listener to each of the buttons
// we need to get the data (the id) from the button
// we need to get the quantity from the input
// we need to check if the quantity > 0
// if yes, send the data to the controller via... fetch

let addToCartBtns = document.querySelectorAll(".addToCart");
// console.log(addToCartBtns);

addToCartBtns.forEach(indiv_btn=>{

	indiv_btn.addEventListener("click", btn=>{
		let id = btn.target.getAttribute("data-id");
		let quantity = btn.target.previousElementSibling.value;

		if(quantity <= 0){
			alert("Please enter valid quantity");
		}else{
			let data = new FormData;

			data.append("id", id);
			data.append("cart", quantity);

			fetch("../controllers/add-to-cart-process.php", {
				method: "POST",
				body: data
			})
			.then(response=>{
				return response.text();
			})
			.then(res=>{
				document.getElementById('cartCount').textContent = res;
			})
		}
	})
})
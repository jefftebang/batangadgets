let spanQs = document.querySelectorAll(".spanQ");

spanQs.forEach(indiv_spanQ=>{
	indiv_spanQ.parentElement.addEventListener("click", ()=>{
		indiv_spanQ.nextElementSibling.classList.remove('d-none');
		indiv_spanQ.classList.add('d-none');
	});

	let quantity = 0;

	indiv_spanQ.nextElementSibling.lastElementChild.addEventListener("change", ()=> {

		quantity = indiv_spanQ.nextElementSibling.lastElementChild.value;

		if(quantity <= 0){
			alert("Invalid Quantity");
			indiv_spanQ.classList.remove('d-none');
			indiv_spanQ.nextElementSibling.classList.add('d-none');
		}else{
			indiv_spanQ.nextElementSibling.submit();
		}
		
	});

	indiv_spanQ.nextElementSibling.lastElementChild.addEventListener("keypress", (e)=>{

		quantity = indiv_spanQ.nextElementSibling.lastElementChild.value;
		
		if(e.keyCode == 13 && quantity <= 0){
			e.preventDefault();
			// console.log(quantity);
			alert("Invalid quantity");
			indiv_spanQ.classList.remove('d-none');
			indiv_spanQ.nextElementSibling.classList.add('d-none');
			indiv_spanQ.nextElementSibling.lastElementChild.value = indiv_spanQ.textContent;
		}
	})

	
})
let firstName = document.getElementById("firstName");
let lastName = document.getElementById("lastName");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("confirmPassword");
let registerBtn = document.getElementById("registerUser");

const validate = (firstName, lastName, email, password, confirmPassword) => {

	let errors = 0;

	if(firstName.value == ""){
		firstName.nextElementSibling.textContent = "Please provide a valid First Name :/";
		errors++
	}else{
		firstName.nextElementSibling.textContent = "";
	}

	if(lastName.value == ""){
		lastName.nextElementSibling.textContent = "Please provide a valid Last Name :/";
		errors++
	}else{
		lastName.nextElementSibling.textContent = "";
	}

	if(email.value == ""){
		email.nextElementSibling.textContent = "Please provide a valid email :/";
		errors++;
	}else{
		email.nextElementSibling.textContent = "";
	}

	if(password.value == ""){
		password.nextElementSibling.textContent = "Please provide a valid password :/";
		errors++;
	}else{
		password.nextElementSibling.textContent = "";
	}

	if(confirmPassword.value == ""){
		confirmPassword.nextElementSibling.textContent = "Please provide a valid password :/";
		errors++;
	}else{
		confirmPassword.nextElementSibling.textContent = "";
	}

	if(password.value.length < 8 || password.value.length > 24){
		password.nextElementSibling.textContent = "Password must be between 8-24 characters";
		errors++
	}else{
		password.nextElementSibling.textContent = "";
	}

	if(password.value != confirmPassword.value){
		confirmPassword.nextElementSibling.textContent = "Password does not match";
		errors++;
	}else{
		confirmPassword.nextElementSibling.textContent = "";
	}

	if(errors>0){
		return false;
	}else{
		return true;
	}

}

confirmPassword.addEventListener("input", ()=>{
	if(password.value != confirmPassword.value){
		confirmPassword.nextElementSibling.textContent = "Password does not match";
	}else{
		confirmPassword.nextElementSibling.textContent = "";
	}
});

registerBtn.addEventListener("click", ()=>{
	if(validate(firstName, lastName, email, password, confirmPassword)){

		let data = new FormData;

		data.append("firstName", firstName.value);
		data.append("lastName", lastName.value);
		data.append("email", email.value);
		data.append("password", password.value);

		fetch("../controllers/register-process.php", {
			method: "POST",
			body:data
		}).then(res=>res.text())
		.then(res=>{
			if(res=="user_exists"){
				email.nextElementSibling.textContent = "User already exists :/"
			}else{
				window.location.replace("login.php");
			}
		})
	}
})

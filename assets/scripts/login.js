let loginUserBtn = document.getElementById('loginUser');

loginUserBtn.addEventListener("click", ()=> {
// capture the details;
	let email = document.getElementById('email').value;
	let password = document.getElementById('password').value;

	// create a new formData;
	let data = new FormData;
	data.append("email", email);
	data.append("password", password);

	// use fetch to access our login-process;
	fetch("../controllers/login-process.php", {
		method: "POST",
		body: data
	}).then(res=>res.text())
	.then(res=>{
		console.log(res)
		if(res=="login_failed"){
			document.getElementById("email").nextElementSibling.textContent = "Please provide valid credentials :/"
		}else{
			window.location.replace("catalog.php");
		}
	})

})


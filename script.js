function validateForm() {
  var fullName = document.getElementById("full-name").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (fullName === "" || email === "" || password === "") {
    alert("All fields are required.");
    return false;
  }

  if (!email.match(emailPattern)) {
    alert("Please enter a valid email address.");
    return false;
  }

  if (password.length < 8) {
    alert("Password must be at least 8 characters long.");
    return false;
  }

  return true;
}

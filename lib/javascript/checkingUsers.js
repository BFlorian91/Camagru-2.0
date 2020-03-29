function checkUsername() {
  const username = document.getElementById("editUsername").value
  const button = document.getElementById("btnUser")

  if (username.length > 2 && username.length < 25) {
    return true
  }
  button.style.color = "red"
  return false
}

function checkPassword() {
  const password = document.getElementById("newPassword").value
  const confirmPassword = document.getElementById("confirmPassword").value
  const button = document.getElementById("btnPass")

  if (password === confirmPassword && password.length > 8) {
    for(let i = 0; i < password.length; i++) {
      character = password.charAt(i)
      if (character === character.toUpperCase()) {
        console.log("Majuscule")
        return true
      }
    }
  }
  console.log("fail")
  button.style.color = "red"
  return false
}
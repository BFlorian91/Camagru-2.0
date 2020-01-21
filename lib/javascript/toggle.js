function toggleDiv(divId) {
  const div = document.getElementById(divId)
  div.style.display === "none" ? div.style.display = "block" : div.style.display = "none"
}
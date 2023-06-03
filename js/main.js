function myFunction() {
  var x = document.getElementById("mySelect").value;
  if (x == Bongabong) {
  	document.getElementById("slctbarangay").innerHTML = "<select><option value='Malitbog'>Malitbog</option></select>"
  }
  else if (x == Gloria) {
  	document.getElementById("slctbarangay").innerHTML = "<select><option value='Malamig'>Malamig</option></select>"
  }
}
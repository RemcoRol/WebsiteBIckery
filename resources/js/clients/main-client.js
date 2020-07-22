// Menu
document.getElementById('menuButton').onclick = function() {
	document.getElementById("bickery-menu").style.width = "250px";
	document.getElementById("main").style.marginRight = "250px";
}

document.getElementById('closeMenuButton').onclick = function() {
   document.getElementById("bickery-menu").style.width = "0";
   document.getElementById("main").style.marginRight = "0";
}

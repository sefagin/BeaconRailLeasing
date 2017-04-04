$(document).ready(function() {
  openMenu();
  closeMenu();
});
  function openMenu() {
      document.getElementById("myMenu").style.height = "100%";
  }

  function closeMenu() {
      document.getElementById("myMenu").style.height = "0%";
  }

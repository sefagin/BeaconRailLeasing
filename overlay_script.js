$(document).ready(function() {
  openNav(id);
  closeNav(id);
});
  function openNav(id) {
      document.getElementById(id).style.height = "100%";
  }

  function closeNav(id) {
      document.getElementById(id).style.height = "0%";
  }

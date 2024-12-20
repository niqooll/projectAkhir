document.addEventListener("DOMContentLoaded", function () {
  var popup = document.getElementById("popup");
  var closeButton = document.getElementsByClassName("close")[0];

  // Ketika tombol Beli Sekarang ditekan, tampilkan popup
  var buyButtons = document.querySelectorAll(".explain a");
  buyButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      popup.style.display = "block";
    });
  });

  // Ketika tombol close pada popup ditekan, tutup popup
  closeButton.addEventListener("click", function () {
    popup.style.display = "none";
  });
});

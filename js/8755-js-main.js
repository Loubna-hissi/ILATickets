(function ($) {
  $(".toggle-password").click(function () {
    $(this).toggleClass("zmdi-eye zmdi-eye-off");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
})(jQuery);

let Checked = false;

function checked_Student() {
  document.getElementById("input-1").value = "";
  document.getElementById("input-2").checked = false;
  document.getElementById("input-3").checked = false;
  if (!Checked) {
    document.getElementById("input1").classList.remove("hidden");
    document.getElementById("input2").classList.remove("hidden");
    document.getElementById("input3").classList.remove("hidden");
    Checked = true;
  } else if (Checked) {
    document.getElementById("input1").classList.add("hidden");
    document.getElementById("input2").classList.add("hidden");
    document.getElementById("input3").classList.add("hidden");
    Checked = false;
  }
}

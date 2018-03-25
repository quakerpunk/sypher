(function($) {
  $(document).ready(function() {
    $("#decryptForm").validate();
    $("#decryptForm").submit(function(event) {
      $.ajax("/decrypt", {
        data: {
          text: $("#encrypted_text").val()
        },
        dataType: "json",
        method: "POST",
        success: function(data) {
          var decryptedText = data.data;
          $("#decrypted_text").val(decryptedText);
        },
        error: function(data) {
          console.log(data.error);
        }
      });
      event.preventDefault();
    });
  });
})(jQuery);

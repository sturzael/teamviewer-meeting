alert('connected');

var APIKey;

jQuery(document).ready(function($) {

  $.ajax({
    url: "/data.json",
    dataType: "json",
    beforeSend: function(xhr) {
      if (xhr.overrideMimeType) {
        xhr.overrideMimeType("application/json");
      }
    },
    success: function(DataFromJson) {
      APIKey = DataFromJson.apikey;
      console.log(APIKey);
      // start();
    },
    error: function() {
      console.log("Something Went Wrong");
    }
  });

  function start() {
    $.ajax({
      url: 'URL',
      type: 'POST',
      data: 'DATA',
      contentType: 'application/json; charset=utf-8',
      dataType: 'json',
      success: function(DataFromJson) {
        console.log(DataFromJson);
      },
      error: function() {
        console.log("Something Went Wrong");
      }
    })
  }

});
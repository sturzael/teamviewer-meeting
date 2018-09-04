var APIKey;

jQuery(document).ready(function($) {



  $.ajax({
    url: "data.json",
    dataType: "json",
    beforeSend: function(xhr) {
      if (xhr.overrideMimeType) {
        xhr.overrideMimeType("application/json");
      }
    },
    success: function(DataFromJson) {
      APIKey = DataFromJson.apikey;
      addHeaders();
    },
    error: function() {
      console.log("Something Went Wsrong");
    }
  });

  function addHeaders() {
    start();

  };

  function start() {
    const myHeaders = new Headers();

    myHeaders.append('Content-Type', 'application/json');
    myHeaders.append('Authorization', `Bearer ${APIKey}`);

    $.ajax({
      url: 'https://webapi.teamviewer.com/api/v1/ping',
      type: 'GET',
      mode: 'no-cors',
      headers: myHeaders,
      contentType: 'application/json;',
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
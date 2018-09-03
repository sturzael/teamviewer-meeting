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
      console.log(APIKey);
      addHeaders();
    },
    error: function() {
      console.log("Something Went Wsrong");
    }
  });

  function addHeaders() {
    var myHeaders = new Headers();
    myHeaders.append('Authorization', APIKey);

    var myInit = {
      method: 'GET',
      headers: myHeaders,
      mode: 'cors',
      cache: 'default'
    };

    var myRequest = new Request(APIKey, myInit);

    myContentType = myRequest.headers.get('Authorization');
    start();
  };

  function start() {
    $.ajax({
      url: 'https://webapi.teamviewer.com/api/v1/ping',
      type: 'GET',
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
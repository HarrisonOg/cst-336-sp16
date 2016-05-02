

$('.go-button').button().click(function() {
     var lookupText = $('#lookupText').val();

console.log('lookup text: ' + lookupText);
      
   var callUrl = 'http://hosting.otterlabs.org/laramiguel/ajax/zip.php?zip_code=' + lookupText;
   
   console.log(callUrl);
   
      $.ajax({ url: callUrl, 
               dataType: 'json', 
               type:'GET',
               success: function(data) {
                 console.log('successful');
                 console.log(data);
                 
                 
                 // REALLY IMPORTANT EXAMPLE RIGHT HERE:
                 var newHeader = $('<h2></h2>');
                 newHeader.html(data.city);
                 $('div.results').append(newHeader);
               }, 
               error: function() {
                 console.log('problem');
               },
              complete: function() {
                 console.log('done');
              }
      });
   
   console.log('done running script');
    });


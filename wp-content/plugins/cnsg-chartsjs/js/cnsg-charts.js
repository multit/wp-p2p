// Carica il file cvs lo trasforma e disegna le charAt(index)


jQuery(document).ready(function($) {



  // Solo Foundation 6
  //     $(window).on('changed.zf.mediaquery', function(event, name) {
  // // name is the name of the breakpoint
  //     console.log('test');
  //   });

  $(window).resize(function() { 
    //disegna_le_charts();

  });


   var options = {
      animation: false,
      segmentShowStroke : false,
      percentageInnerCutout : 75,
      showTooltips: true,
      responsive: true,
      maintainAspectRatio: true
   };


	// Seleziona ogni canvas presente in pagina generato da php e per ognuno crea un data object
	// http://api.jquery.com/each/
	// https://github.com/evanplaice/jquery-csv  per convertire un cvs in array
	// http://www.webdesignermag.co.uk/build-html5-charts-with-chart-js/ come creare una chart usando CSV-jquery


  var disegna_le_charts = function () {

        $( ".doughnut_single" ).each(function( index ) {
          
          resto = 100 - $( this ).attr('data');      

          var ctx = $( this ).get(0).getContext("2d");

          var data = [
              {
                  value: $( this ).attr('data'),
                  color:"#AC9865",
                  highlight: "#AC9865",
                  label: $( this ).attr('titolo')
              },
              {
                  value: resto,
                  color: "#CCCCCC",
                  highlight: "#CCCCCC",
                  label: ""
              }
          ]
          //console.log($(this).is(":visible"));
          if ( $(this).is(":visible") )  {
          var myDoughnutChart = new Chart(ctx).Doughnut(data,options);


          //var legenda = myDoughnutChart.generateLegend();      
          $(this).after( "<div class='chart-label' align='center'>" + $( this ).attr('titolo') + "</div>" );  // Titolo della chart
          $(this).after( "<div class='chart-numerone'>" + $( this ).attr('data') + "%</div>" ); //Numero inscritto al centro
          // centra il titolo verticalmente
          var hdist = ( $(this).height() - $('.chart-numerone').height() ) / 2; 
          $('.chart-numerone').css('margin-top', hdist);
          // Centra il canvas orizzontalmente nella colonna ???
          var hmov = (  $(this).width() -  $(this).parent().width()  )  / 2;
          $(this).css('margin-left', -hmov);
          }

      });  // end funzione each
      


      $( ".doughnut" ).each(function( index ) {


      });  // end funzione each doughnut_single


      // ********************************** *** *** *** **************************************
      // Sviluppa i chart line


       $( ".bar-chart" ).each(function( index ) {
          var ctx = $( this ).get(0).getContext("2d");
          var file_cvs = $( this ).attr('chartcvs');
          var data_caricati = legge_file_cvs ( file_cvs,ctx );
          $(this).after( "<div class='chart-label' align='center'>" + $( this ).attr('titolo') + "</div>" );  // Titolo della chart

      });  // end funzione each line-chart    

  };  //end disegna_le_charts





disegna_le_charts();
  

	  
// Funzione che disegna le chart dopo che sono stati caricati i dati
function disegna_bar_chart(data_caricati, ctx) {
    var myBarChart = new Chart(ctx).Bar(data_caricati, options);
    var legenda = myBarChart.generateLegend();      
          
        
}










  // ********************************** *** *** *** **************************************
  // Helper functions


  // Funzione che ripulisce i dati leti con la funzione to Arrays
  
  function ripulisci_dati(data) {
      for (var i = 0, len = data.length; i < len;     i++) {
        for (var j = 0, l = data[i].length; j <     l;     j++) {
            if (!isNaN(parseFloat(data[i][j])))
                data[i][j] = parseFloat(data[i][j]);
           else if (!data[i][j].length)
                   data[i][j] = 0;
           }
        }
        return data;
  }

 

  // Funzione che carica il file 
  function legge_file_cvs (file_da_caricare, ctx) {

     var data = { labels:[], datasets:[
          {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: []
            }

        ] };

      var valori = [];


      var jqxhr = $.ajax( file_da_caricare )
        .done(function() {
          
        })
        .fail(function() {
          console.log( "error" );
        })
        .always(function() {
          // console.log( "complete" );
        });             
      // Perform other work here ...       
      // Set another completion function for the request above
      jqxhr.always(function(daticaricati) {          
        //array_da_file = $.csv.toArrays(daticaricati, {separator:';'});        
        objects_da_file = $.csv.toObjects(daticaricati, {delimeter:';'});
        
        $.each(objects_da_file, function(index, value) {          
          keys =  Object.keys(value);
          data.labels[index] = value[keys[0]];
          valori[index] = value[ keys[1] ];
        }); 
        
        data.datasets[0].data = valori;

        disegna_bar_chart(data, ctx)

      });      
      // console.log(valori.length);
      // console.log(data.labels.length);
      // console.log(data.datasets[0].data);
      // console.log(data);
      // return data;
  }


});
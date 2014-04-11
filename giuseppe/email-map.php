<html>
  <head>
    <!-- Gsollazz https://developers.google.com/chart/interactive/docs/gallery/geochart -->
    <script type='text/javascript' src='https://www.google.com/jsapi'></script>
    <script type='text/javascript'>
     google.load('visualization', '1', {'packages': ['geochart']});
     google.setOnLoadCallback(drawMarkersMap);

      function drawMarkersMap() {
      // var data = google.visualization.arrayToDataTable([
      //   ['Latitude', 'Longitude',  'Popularity'],
      //   [37.44027, -112.4849, 1],[51.59002, 0.47361, 1],[51.37981028135175, -2.361411186833557, 2],[52.18831, -0.45316, 3],[51.459005200295245, 0.1089813625559741, 35],[52.48048, -1.89823, 28],[52.578010524734, -1.1973394512600954, 1],[53.6666667, -2.4666667, 2],[53.8333333, -3.0333333, 5],[50.7166667, -1.8666667, 3],[51.4166667, -0.75, 2],[50.43333, -3.83333, 34],[50.844674049620956, -0.1286775134206411, 7],[51.45, -2.6, 5],[51.33333, 0.08333, 7],[51.782717520060345, -0.8037518709119682, 2],[51.899159829048216, -0.835883453305406, 1],[52.3733109875086, 0.013419574323135341, 1],[51.5, -3.1666667, 1],[53.16702, -2.36245, 1],[53.0833333, -3.75, 1],[50.4166667, -4.75, 10],[52.4166667, -1.5, 9],[54.612696136436554, -2.9008567830393615, 12],[54.612696136436554, -2.9008567830393615, 1],[54.5333333, -1.5333333, 3],[52.30988, -1.0337, 1],[53.11711842942569, -1.6001933542711675, 3],[50.720256276038484, -3.7690866028893324, 13],[51.0611, -3.92728, 1],[50.7948587473371, -2.3199529912102177, 7],[54.7768000648463, -1.57575488090515, 75],[51.51071266589052, -0.3066118622609001, 13],[53.9166667, -0.5, 1],[50.93532512057269, 0.36888720367434447, 7],[51.65095516171764, -0.07007087232575977, 7],[41.4056504, -73.4442886, 14],[36.67065, -93.93996, 2],[54.93333, -1.66667, 28],[51.53333, -0.08333, 9],[53.3333333, -2.75, 1],[52.11794, -1.01717, 18],[51.5879, -0.1063, 5],[52.0833333, -2.75, 4],[51.83802878143392, -0.274207662467638, 29],[51.83802878143392, -0.274207662467638, 7],[51.4677, -0.36469, 10],[53.75, -0.3333333, 1],[50.6666667, -1.3333333, 17],[51.19120292256518, 0.7371109141674955, 24],[53.86038830587273, -2.5655598733983833, 2],[53.7964432369944, -1.54769897460938, 12],[52.6333333, -1.1333333, 3],[52.684991439937754, -1.1303972465931358, 2],[53.12441438942767, -0.23526696533141386, 3],[53.4166667, -2.9166667, 4],[51.8911, -0.42793, 3],[51.26609828120291, 0.5213875833154208, 10],[53.4166667, -2.25, 46],[51.4166667, 0.5, 1],[54.5333333, -1.2, 10],[52.0833333, -0.75, 1],[51.33333, -2.5, 3],[53.53333, -0.08333, 3],[52.67274020955446, 0.9554795890234478, 13],[51.95642, -0.1644, 10],[36.4168197, -77.3663601, 1],[52.44813, -0.50664, 7],[51.0611, -3.92728, 1],[53.53333, -0.08333, 1],[55.0333333, -1.5, 16],[55.25, -2.0, 18],[54.08854157395345, -1.3881097897155525, 2],[52.9666667, -1.15, 1],[53.14478020122277, -1.004523675345066, 5],[51.813907368175045, -1.2892742512484212, 3],[52.5833333, -0.25, 5],[50.3833333, -4.1333333, 1],[50.8, -1.0666667, 3],[51.45625, -0.97113, 1],[54.55, -1.0, 6],[53.5833333, -2.1666667, 1],[51.27474, -0.76692, 5],[53.4166667, -1.5, 4],[52.6666667, -2.75, 3],[51.5, -0.56667, 3],[51.33333, -2.5, 3],[51.33333, -2.5, 4],[50.9166667, -1.3833333, 1],[51.5392, 0.714, 2],[51.5, -2.41667, 1],[54.95, -1.4166667, 1],[51.46538543701172, -0.06552019063383341, 2],[53.4166667, -2.75, 1],[37.5513973236084, -93.7438850402832, 30],[51.25821, -1.21602, 12],[52.0625, 0.95954, 3],[52.15001, 1.41469, 1],[, , 1],[, , 2],[54.8833333, -1.4166667, 23],[51.2674282268911, -0.3921129574930146, 16],[51.23719, -0.04678, 1],[51.5, 0.4166667, 3],[53.0833333, -3.3333333, 3],[51.464051847890524, -0.19315482883029533, 47],[53.4166667, -2.5833333, 1],[52.3201682846079, -1.565878190375642, 3],[51.75, -0.2166667, 1],[51.41667, -1.25, 1],[51.5, -0.16667, 53],[50.94316943145964, -0.45800119666107597, 1],[51.25, -1.9166667, 1],[51.4166667, -0.9166667, 2],[52.59051597053467, -2.1260331262502885, 1],[52.20979572958447, -2.2079689460246716, 6],[52.35, -2.3666667, 5],[54.56205693254732, -0.9742248410812034, 1]
      // ]);
      
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Latitude');
      data.addColumn('number', 'Longitude');
      data.addColumn('string', 'Label');
      data.addColumn('number', 'Emails');

      data.addRows([[37.44027, -112.4849, "alton.gov.uk", 1],[51.59002, 0.47361, "basildon.gov.uk", 1],[51.37981028135175, -2.361411186833557, "bathnes.gov.uk", 2],[52.18831, -0.45316, "bedford.gov.uk", 3],[51.459005200295245, 0.1089813625559741, "bexley.gov.uk", 35],[52.48048, -1.89823, "birmingham.gov.uk", 28],[52.578010524734, -1.1973394512600954, "blaby.gov.uk", 1],[53.6666667, -2.4666667, "blackburn.gov.uk", 2],[53.8333333, -3.0333333, "blackpool.gov.uk", 5],[50.7166667, -1.8666667, "bournemouth.gov.uk", 3],[51.4166667, -0.75, "bracknell-forest.gov.uk", 2],[50.43333, -3.83333, "brent.gov.uk", 34],[50.844674049620956, -0.1286775134206411, "brighton-hove.gov.uk", 7],[51.45, -2.6, "bristol.gov.uk", 5],[51.33333, 0.08333, "bromley.gov.uk", 7],[51.782717520060345, -0.8037518709119682, "buckscc.gov.uk", 2],[51.899159829048216, -0.835883453305406, "bury.gov.uk", 1],[52.3733109875086, 0.013419574323135341, "cambridgeshire.gov.uk", 1],[51.5, -3.1666667, "cardiff.gov.uk", 1],[53.16702, -2.36245, "cheshireeast.gov.uk", 1],[53.0833333, -3.75, "conwy.gov.uk", 1],[50.4166667, -4.75, "cornwall.gov.uk", 10],[52.4166667, -1.5, "coventry.gov.uk", 9],[54.612696136436554, -2.9008567830393615, "cumbria.gov.uk", 12],[54.612696136436554, -2.9008567830393615, "cumbriacc.gov.uk", 1],[54.5333333, -1.5333333, "darlington.gov.uk", 3],[52.30988, -1.0337, "daventrydc.gov.uk", 1],[53.11711842942569, -1.6001933542711675, "derbyshire.gov.uk", 3],[50.720256276038484, -3.7690866028893324, "devon.gov.uk", 13],[51.0611, -3.92728, "northdevon.gov.uk", 1],[50.7948587473371, -2.3199529912102177, "dorsetcc.gov.uk", 7],[54.7768000648463, -1.57575488090515, "durham.gov.uk", 75],[51.51071266589052, -0.3066118622609001, "ealing.gov.uk", 13],[53.9166667, -0.5, "eastriding.gov.uk", 1],[50.93532512057269, 0.36888720367434447, "eastsussex.gov.uk", 7],[51.65095516171764, -0.07007087232575977, "enfield.gov.uk", 7],[41.4056504, -73.4442886, "essex.gov.uk", 14],[36.67065, -93.93996, "exeter.gov.uk", 2],[54.93333, -1.66667, "gateshead.gov.uk", 28],[51.53333, -0.08333, "hackney.gov.uk", 9],[53.3333333, -2.75, "halton-borough.gov.uk", 1],[52.11794, -1.01717, "hants.gov.uk", 18],[51.5879, -0.1063, "haringey.gov.uk", 5],[52.0833333, -2.75, "herefordshire.gov.uk", 4],[51.83802878143392, -0.274207662467638, "hertfordshire.gov.uk", 29],[51.83802878143392, -0.274207662467638, "hertscc.gov.uk", 7],[51.4677, -0.36469, "hounslow.gov.uk", 10],[53.75, -0.3333333, "hullcc.gov.uk", 1],[50.6666667, -1.3333333, "iow.gov.uk", 17],[51.19120292256518, 0.7371109141674955, "kent.gov.uk", 24],[53.86038830587273, -2.5655598733983833, "lancashire.gov.uk", 2],[53.7964432369944, -1.54769897460938, "leeds.gov.uk", 12],[52.6333333, -1.1333333, "leicester.gov.uk", 3],[52.684991439937754, -1.1303972465931358, "leics.gov.uk", 2],[53.12441438942767, -0.23526696533141386, "lincolnshire.gov.uk", 3],[53.4166667, -2.9166667, "liverpool.gov.uk", 4],[51.8911, -0.42793, "luton.gov.uk", 3],[51.26609828120291, 0.5213875833154208, "maidstone.gov.uk", 10],[53.4166667, -2.25, "manchester.gov.uk", 46],[51.4166667, 0.5, "medway.gov.uk", 1],[54.5333333, -1.2, "middlesbrough.gov.uk", 10],[52.0833333, -0.75, "milton-keynes.gov.uk", 1],[51.33333, -2.5, "n-somerset.gov.uk", 3],[53.53333, -0.08333, "nelincs.gov.uk", 3],[52.67274020955446, 0.9554795890234478, "norfolk.gov.uk", 13],[51.95642, -0.1644, "north-herts.gov.uk", 10],[36.4168197, -77.3663601, "northampton.gov.uk", 1],[52.44813, -0.50664, "northamptonshire.gov.uk", 7],[51.0611, -3.92728, "northdevon.gov.uk", 1],[53.53333, -0.08333, "northlincs.gov.uk", 1],[55.0333333, -1.5, "northtyneside.gov.uk", 16],[55.25, -2.0, "northumberland.gov.uk", 18],[54.08854157395345, -1.3881097897155525, "northyorks.gov.uk", 2],[52.9666667, -1.15, "nottinghamcity.gov.uk", 1],[53.14478020122277, -1.004523675345066, "nottscc.gov.uk", 5],[51.813907368175045, -1.2892742512484212, "oxfordshire.gov.uk", 3],[52.5833333, -0.25, "peterborough.gov.uk", 5],[50.3833333, -4.1333333, "plymouth.gov.uk", 1],[50.8, -1.0666667, "portsmouthcc.gov.uk", 3],[51.45625, -0.97113, "reading.gov.uk", 1],[54.55, -1.0, "redcar-cleveland.gov.uk", 6],[53.5833333, -2.1666667, "rochdale.gov.uk", 1],[51.27474, -0.76692, "rushmoor.gov.uk", 5],[53.4166667, -1.5, "sheffield.gov.uk", 4],[52.6666667, -2.75, "shropshire.gov.uk", 3],[51.5, -0.56667, "slough.gov.uk", 3],[51.33333, -2.5, "n-somerset.gov.uk", 3],[51.33333, -2.5, "somerset.gov.uk", 4],[50.9166667, -1.3833333, "southampton.gov.uk", 1],[51.5392, 0.714, "southend.gov.uk", 2],[51.5, -2.41667, "southglos.gov.uk", 1],[54.95, -1.4166667, "southtyneside.gov.uk", 1],[51.46538543701172, -0.06552019063383341, "southwark.gov.uk", 2],[53.4166667, -2.75, "sthelens.gov.uk", 1],[37.5513973236084, -93.7438850402832, "stockton.gov.uk", 30],[51.25821, -1.21602, "stoke.gov.uk", 12],[52.0625, 0.95954, "suffolk.gov.uk", 3],[52.15001, 1.41469, "suffolkcoastal.gov.uk", 1],[, , "school.sunderland.gov.uk", 1],[, , "schools.sunderland.gov.uk", 2],[54.8833333, -1.4166667, "sunderland.gov.uk", 23],[51.2674282268911, -0.3921129574930146, "surreycc.gov.uk", 16],[51.23719, -0.04678, "tandridge.gov.uk", 1],[51.5, 0.4166667, "thurrock.gov.uk", 3],[53.0833333, -3.3333333, "wales.gov.uk", 3],[51.464051847890524, -0.19315482883029533, "wandsworth.gov.uk", 47],[53.4166667, -2.5833333, "warrington.gov.uk", 1],[52.3201682846079, -1.565878190375642, "warwickshire.gov.uk", 3],[51.75, -0.2166667, "welhat.gov.uk", 1],[51.41667, -1.25, "westberks.gov.uk", 1],[51.5, -0.16667, "westminster.gov.uk", 53],[50.94316943145964, -0.45800119666107597, "westsussex.gov.uk", 1],[51.25, -1.9166667, "wiltshire.gov.uk", 1],[51.4166667, -0.9166667, "wokingham.gov.uk", 2],[52.59051597053467, -2.1260331262502885, "wolverhampton.gov.uk", 1],[52.20979572958447, -2.2079689460246716, "worcestershire.gov.uk", 6],[52.35, -2.3666667, "wyreforestdc.gov.uk", 5],[54.56205693254732, -0.9742248410812034, "york.gov.uk", 1]]);

      var options = {
        sizeAxis: { minValue: 0, maxValue: 75 },
        region: 'GB',
        displayMode: 'markers',
        colorAxis: {colors: ['orange', 'red']}
      };

      var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    };
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootswatch: Readable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="assets/css/bootswatch.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
  <style>

path.slice{
  stroke-width:2px;
}

polyline{
  opacity: .3;
  stroke: black;
  stroke-width: 2px;
  fill: none;
}

.arc path {
  stroke: #fff;
}


.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.bar {
  fill: steelblue;
}

.x.axis path {
  display: none;
}
</style>  
  </head>

  <body>
    <script src="../assets/js/bsa.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    

    <div class="container">

      <div class="pdepartment-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1>Budget Questions</h1>
            <p class="lead">What would you like to ask?</p>
          </div>
        </div>
      </div>


      <button id="q_biggest_budget" type="button" class="btn btn-default">Which department has the biggest budget?</button>
      <button id="q_biggest_cut" type="button" class="btn btn-default">How has funding changed over the years?</button>
      <button id="q_delame" type="button" class="btn btn-default">What does the Statement of Parliamentary Supply look like?</button>
      <button id="q_biggest_increase" type="button" class="btn btn-default">Which department experienced the biggest cuts?</button>
      <button id="q_admin" type="button" class="btn btn-default">Which department has the biggest admin costs?</button>
      <button id="q_capital" type="button" class="btn btn-default">Which department budget has the biggest share of capital?</button>


      <div id="chart" class="container">

        
      </div>

      <footer>
        <div class="row">
          <div class="col-lg-12">

            <!--ul class="list-unstyled">
              <li class="pull-right"><a href="#top">Back to top</a></li>
              <li><a href="http://news.bootswatch.com" onclick="pdepartmentTracker._link(this.href); return false;">Blog</a></li>
              <li><a href="http://feeds.feedburner.com/bootswatch">RSS</a></li>
              <li><a href="https://twitter.com/thomashpark">Twitter</a></li>
              <li><a href="https://github.com/thomaspark/bootswatch/">GitHub</a></li>
              <li><a href="../help/#api">API</a></li>
              <li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=F22JEM3Q78JC2">Donate</a></li>
            </ul-->
            <!--p>Made by <a href="http://thomaspark.me" rel="nofollow">Thomas Park</a>. Contact him at <a href="mailto:thomas@bootswatch.com">thomas@bootswatch.com</a>.</p>
            <p>Code released under the <a href="https://github.com/thomaspark/bootswatch/blob/gh-pdepartments/LICENSE">MIT License</a>.</p>
            <p>Based on <a href="http://getbootstrap.com" rel="nofollow">Bootstrap</a>. Icons from <a href="http://fortawesome.github.io/Font-Awesome/" rel="nofollow">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts" rel="nofollow">Google</a>.</p-->

          </div>
        </div>

      </footer>


    </div>



    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootswatch.js"></script>

    <script>

      $('#q_biggest_budget').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
        pie();
        $("#svg_display").appendTo("#chart");
      });

$('#q_admin').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
        adminRatio();
        $(".pie").each().appendTo("#chart");
        console.log($(".pie"));
        $("#legend2").appendTo("#chart");
      });

        $('#q_delame').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
        delameacc();
        
      });


      $('#q_biggest_cut').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
        cut_bars();
        $("#svg_display").appendTo("#chart");
      });

      $('#q_biggest_increase').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
      });

      $('#q_admin').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
      });

      $('#q_capital').click(function() {
        $('#chart').empty();
        // reset all buttons
        $('button').attr("class","btn btn-default");
        
        // set current one
        $(this).attr("class","btn btn-success");
      });

    </script>

    <script src="lib/d3.v3.min.js"></script>
<script>
function pie(){

var width = 860,
    height = 400,
    radius = Math.min(width, height) / 2;

var color = d3.scale.ordinal()
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

var arc = d3.svg.arc()
    .outerRadius(radius - 10)
    .innerRadius(radius - 70);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d.budget; });

var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height)
    .attr("id","svg_display")
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

d3.csv("data/data.csv", function(error, data) {

  data.forEach(function(d) {
    d.budget = +d.budget;
  });

  var g = svg.selectAll(".arc")
      .data(pie(data))
      .enter().append("g")
      .attr("class", "arc");

  g.append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.department); });

  g.append("text")
      .attr("transform", function(d) { return "translate(" + arc.centroid(d) + ")"; })
      .attr("dy", ".5em")
      .style("text-anchor", "middle")
      .style("font-size", "6pt")
      .style("font-weight", "bold")
      .text(function(d) { return d.data.department; });

});
}


function cut_bars() {

var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 1000 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

var x0 = d3.scale.ordinal()
    .rangeRoundBands([0, width], .1);

var x1 = d3.scale.ordinal();

var y = d3.scale.linear()
    .range([height, 0]);

var color = d3.scale.ordinal()
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

var xAxis = d3.svg.axis()
    .scale(x0)
    .orient("bottom");

var yAxis = d3.svg.axis()
    .scale(y)
    .orient("left")
    .tickFormat(d3.format(".2s"));

var svg = d3.select("body").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .attr("id","svg_display")
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

d3.csv("data/data_bars.csv", function(error, data) {
  var ageNames = d3.keys(data[0]).filter(function(key) { return key !== "State"; });

  data.forEach(function(d) {
    d.ages = ageNames.map(function(name) { return {name: name, value: +d[name]}; });
  });

  x0.domain(data.map(function(d) { return d.State; }));
  x1.domain(ageNames).rangeRoundBands([0, x0.rangeBand()]);
  y.domain([0, d3.max(data, function(d) { return d3.max(d.ages, function(d) { return d.value; }); })]);

  svg.append("g")
      .attr("class", "x axis")
      .attr("transform", "translate(0," + height + ")")
      .call(xAxis);

  svg.append("g")
      .attr("class", "y axis")
      .call(yAxis)
      .append("text")
      .attr("transform", "rotate(-90)")
      .attr("y", 6)
      .attr("dy", ".71em")
      .style("text-anchor", "end")
      .text("£M");

  var state = svg.selectAll(".state")
      .data(data)
      .enter().append("g")
      .attr("class", "g")
      .attr("transform", function(d) { return "translate(" + x0(d.State) + ",0)"; });

  state.selectAll("rect")
      .data(function(d) { return d.ages; })
      .enter().append("rect")
      .attr("width", x1.rangeBand())
      .attr("x", function(d) { return x1(d.name); })
      .attr("y", function(d) { return y(d.value); })
      .attr("height", function(d) { return height - y(d.value); })
      .style("fill", function(d) { return color(d.name); });

  var legend = svg.selectAll(".legend")
      .data(ageNames.slice().reverse())
      .enter().append("g")
      .attr("class", "legend")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
      .attr("x", width - 18)
      .attr("width", 18)
      .attr("height", 18)
      .style("fill", color);

  legend.append("text")
      .attr("x", width - 24)
      .attr("y", 9)
      .attr("dy", ".5em")
      .style("text-anchor", "end")
      .style("font-size", "10pt")
      .text(function(d) { return d; });

});
}

function delameacc() {

  setTimeout(function(){google.load('visualization', '1', {'callback':'drawChart()', 'packages':['corechart']})}, 500);

}

function drawChart() {

  var data = google.visualization.arrayToDataTable([
        ['Department', 'Resource DEL', 'Capital DEL', 'Resource AME', 'Capital AME','Net Cash Requirement', 'Admin outturn', { role: 'annotation' } ],
        ['MOJ', 8894981, 344095, -184712, 0, 8620762, 641835, ''],
        ['DfE', 51196135, 5042189, 63634, 0, 56349458, 373935, ''],
        ['FCO', 2175214, 115219, 61072, 0, 2189168, 167685, ''],
        ['HO', 8835170, 494382, 1060092, 0, 9991249, 548558, ''],
        ['DECC', 1158505, 1454315, 3716197, -57635, 3501624, 157522, ''],
      ]);

    var visualization = new google.visualization.BarChart(document.getElementById("chart"));


 var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
  title: "Statement of Parliamentary Supply",
  width: 600,
  height: 400,
  isStacked: true,
  bar: {groupWidth: "75%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("chart"));
      chart.draw(view, options);


}

function adminRatio() {
var radius = 74,
    padding = 10;

var color = d3.scale.ordinal()
    .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

var arc = d3.svg.arc()
    .outerRadius(radius)
    .innerRadius(radius - 30);

var pie = d3.layout.pie()
    .sort(null)
    .value(function(d) { return d.population; });

d3.csv("data/data_admin.csv", function(error, data) {
  color.domain(d3.keys(data[0]).filter(function(key) { return key !== "State"; }));

  data.forEach(function(d) {
    d.ages = color.domain().map(function(name) {
      return {name: name, population: +d[name]};
    });
  });

  var legend = d3.select("body").append("svg")
      .attr("class", "legend")
      .attr("id", "legend2")
      .attr("width", radius * 2)
      .attr("height", radius * 2)
    .selectAll("g")
      .data(color.domain().slice().reverse())
    .enter().append("g")
      .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

  legend.append("rect")
      .attr("width", 18)
      .attr("height", 18)
      .style("fill", color);

  legend.append("text")
      .attr("x", 24)
      .attr("y", 9)
      .attr("dy", ".35em")
      .text(function(d) { return d; });

  var svg = d3.select("body").selectAll(".pie")
      .data(data)
    .enter().append("svg")
      .attr("class", "pie")
      .attr("width", radius * 2)
      .attr("height", radius * 2)
    .append("g")
      .attr("transform", "translate(" + radius + "," + radius + ")");

  svg.selectAll(".arc")
      .data(function(d) { return pie(d.ages); })
    .enter().append("path")
      .attr("class", "arc")
      .attr("d", arc)
      .style("fill", function(d) { return color(d.data.name); });

  svg.append("text")
      .attr("dy", ".35em")
      .style("text-anchor", "middle")
      .text(function(d) { return d.State; });

});


}

</script>

  </body>
</html>

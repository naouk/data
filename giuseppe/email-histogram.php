<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Raphaël · Analytics</title>
        <link rel="stylesheet" href="assets/css/demo.css" type="text/css" media="screen">
        <link rel="stylesheet" href="assets/css/demo-print.css" type="text/css" media="print">
        <script src="lib/raphael.js"></script>
        <script src="lib/popup.js"></script>
        <script src="lib/jquery.js"></script>
        <script src="lib/analytics.js"></script>
        <style type="text/css" media="screen">
            #holder {
                height: 250px;
                margin: -125px 0 0 -400px;
                width: 800px;
            }
        </style>
        <script type="text/javascript">

    // This will parse a delimited string into an array of
    // arrays. The default delimiter is the comma, but this
    // can be overriden in the second argument.
    function CSVToArray( strData, strDelimiter ){
        // Check to see if the delimiter is defined. If not,
        // then default to comma.
        strDelimiter = (strDelimiter || ",");

        // Create a regular expression to parse the CSV values.
        var objPattern = new RegExp(
            (
                // Delimiters.
                "(\\" + strDelimiter + "|\\r?\\n|\\r|^)" +

                // Quoted fields.
                "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" +

                // Standard fields.
                "([^\"\\" + strDelimiter + "\\r\\n]*))"
            ),
            "gi"
            );


        // Create an array to hold our data. Give the array
        // a default empty first row.
        var arrData = [[]];

        // Create an array to hold our individual pattern
        // matching groups.
        var arrMatches = null;


        // Keep looping over the regular expression matches
        // until we can no longer find a match.
        while (arrMatches = objPattern.exec( strData )){

            // Get the delimiter that was found.
            var strMatchedDelimiter = arrMatches[ 1 ];

            // Check to see if the given delimiter has a length
            // (is not the start of string) and if it matches
            // field delimiter. If id does not, then we know
            // that this delimiter is a row delimiter.
            if (
                strMatchedDelimiter.length &&
                (strMatchedDelimiter != strDelimiter)
                ){

                // Since we have reached a new row of data,
                // add an empty row to our data array.
                arrData.push( [] );

            }


            // Now that we have our delimiter out of the way,
            // let's check to see which kind of value we
            // captured (quoted or unquoted).
            if (arrMatches[ 2 ]){

                // We found a quoted value. When we capture
                // this value, unescape any double quotes.
                var strMatchedValue = arrMatches[ 2 ].replace(
                    new RegExp( "\"\"", "g" ),
                    "\""
                    );

            } else {

                // We found a non-quoted value.
                var strMatchedValue = arrMatches[ 3 ];

            }


            // Now that we have our value string, let's add
            // it to the data array.
            arrData[ arrData.length - 1 ].push( strMatchedValue );
        }

        // Return the parsed data.
        return( arrData );
    }

    

</script>
    </head>
    <body>
        <table id="data">
            <tfoot>
                <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>8</th>
                    <th>9</th>
                    <th>10</th>
                    <th>11</th>
                    <th>12</th>
                    <th>13</th>
                    <th>14</th>
                </tr>
            </tfoot>

            <tbody>
                <tr id="tbodyvalues">
                    <td>8</td>
                    <td>25</td>
                    <td>27</td>
                    <td>25</td>
                    <td>54</td>
                    <td>59</td>
                    <td>79</td>
                    <td>47</td>
                    <td>27</td>
                    <td>44</td>
                    <td>44</td>
                    <td>51</td>
                    <td>56</td>
                    <td>83</td>
                </tr>
            </tbody>
        </table>
        

        <select id="domains">
        </select>
        <button id="action">Submit</button>
        <center><h2 id="heading"></h2></center>
            <script>

                $('select#domains').change(function() {
                    var domainname = $(this).val();
                    $('#heading').text(domainname);

                    $.get('data/14weeks.csv', function(data) {
                        var theIndex = -1;
                        var csv = CSVToArray(data);
                        for (var i = 0; i < csv.length; i++) {
                            var thisline = csv[i];
                           if (thisline[0] == domainname) {
                            theIndex = i;
                            break;
                            }
                        }
                        if (theIndex != -1) {
                            $('#tbodyvalues').empty();
                            var thisdomain = csv[theIndex];
                            for (var j = 1; j < thisdomain.length; j++) {
                                
                                var newtd = $('<td>').text(thisdomain[j]);
                                $('#tbodyvalues').append(newtd);
                            }
                        }
                    


                                                
                    });

                    $('#holder').empty();

                 });

                (function() {

                    var csv_path = "data/uniqdomains";

                    var renderCSVDropdown = function(csv) {
                        var dropdown = $('select#domains');
                        for(var i = 0; i < csv.length; i++) {
                            var record = csv[i];
                            var entry = $('<option>').attr('value', record[0]).text(record[0]);
                            dropdown.append(entry);
                        }
                    };

                    $.get(csv_path, function(data) {
                        var csv = CSVToArray(data);
                        renderCSVDropdown(csv);
                    });

                }());

                $('#action').click(function() {
                    var test = "Hello";
                    drawthis();
                });
            </script>



        <div id="holder"></div>
         <script>
         $(document).ready(function() {
            $('#domains')
                .val('local.gov.uk')
                .trigger('change');
            });        
         
            
            </script>
    </body>
</html>

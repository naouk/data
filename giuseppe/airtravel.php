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
        <script src="lib/analytics-anders.js"></script>
        <style type="text/css" media="screen">
            #holder {
                height: 350px;
                margin: -125px 0 0 -400px;
                width: 1000px;
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

<th>11/02/2013</th>
<th>04/03/2013</th>
<th>18/03/2013</th>
<th>03/04/2013</th>
<th>04/04/2013</th>
<th>05/04/2013</th>
<th>07/04/2013</th>
<th>08/04/2013</th>
<th>09/04/2013</th>
<th>10/04/2013</th>
<th>11/04/2013</th>
<th>12/04/2013</th>
<th>14/04/2013</th>
<th>15/04/2013</th>
<th>16/04/2013</th>
<th>17/04/2013</th>
<th>18/04/2013</th>
<th>19/04/2013</th>
<th>21/04/2013</th>
<th>22/04/2013</th>
<th>23/04/2013</th>
<th>24/04/2013</th>
<th>25/04/2013</th>
<th>26/04/2013</th>
<th>28/04/2013</th>
<th>29/04/2013</th>
<th>30/04/2013</th>
<th>01/05/2013</th>
<th>02/05/2013</th>
<th>03/05/2013</th>
<th>06/05/2013</th>
<th>07/05/2013</th>
<th>08/05/2013</th>
<th>09/05/2013</th>
<th>10/05/2013</th>
<th>11/05/2013</th>
<th>12/05/2013</th>
<th>13/05/2013</th>
<th>14/05/2013</th>
<th>15/05/2013</th>
<th>16/05/2013</th>
<th>17/05/2013</th>
<th>19/05/2013</th>
<th>20/05/2013</th>
<th>21/05/2013</th>
<th>22/05/2013</th>
<th>23/05/2013</th>
<th>24/05/2013</th>
<th>27/05/2013</th>
<th>28/05/2013</th>
<th>29/05/2013</th>
<th>30/05/2013</th>
<th>31/05/2013</th>
<th>03/06/2013</th>
<th>04/06/2013</th>
<th>05/06/2013</th>
<th>06/06/2013</th>
<th>07/06/2013</th>
<th>09/06/2013</th>
<th>10/06/2013</th>
<th>11/06/2013</th>
<th>12/06/2013</th>
<th>13/06/2013</th>
<th>14/06/2013</th>
<th>17/06/2013</th>
<th>18/06/2013</th>
<th>19/06/2013</th>
<th>20/06/2013</th>
<th>21/06/2013</th>
<th>22/06/2013</th>
<th>23/06/2013</th>
<th>24/06/2013</th>
<th>25/06/2013</th>
<th>26/06/2013</th>
<th>27/06/2013</th>
<th>28/06/2013</th>
<th>01/07/2013</th>
<th>02/07/2013</th>
<th>03/07/2013</th>
<th>04/07/2013</th>
<th>05/07/2013</th>
<th>08/07/2013</th>
<th>09/07/2013</th>
<th>10/07/2013</th>
<th>11/07/2013</th>
<th>12/07/2013</th>
<th>14/07/2013</th>
<th>15/07/2013</th>
<th>16/07/2013</th>
<th>17/07/2013</th>
<th>18/07/2013</th>
<th>19/07/2013</th>
<th>21/07/2013</th>
<th>22/07/2013</th>
<th>23/07/2013</th>
<th>24/07/2013</th>
<th>25/07/2013</th>
<th>26/07/2013</th>
<th>28/07/2013</th>
<th>29/07/2013</th>
<th>30/07/2013</th>
<th>31/07/2013</th>
<th>01/08/2013</th>
<th>02/08/2013</th>
<th>04/08/2013</th>
<th>05/08/2013</th>
<th>06/08/2013</th>
<th>07/08/2013</th>
<th>08/08/2013</th>
<th>09/08/2013</th>
<th>12/08/2013</th>
<th>13/08/2013</th>
<th>14/08/2013</th>
<th>15/08/2013</th>
<th>16/08/2013</th>
<th>19/08/2013</th>
<th>20/08/2013</th>
<th>21/08/2013</th>
<th>22/08/2013</th>
<th>23/08/2013</th>
<th>26/08/2013</th>
<th>27/08/2013</th>
<th>28/08/2013</th>
<th>29/08/2013</th>
<th>30/08/2013</th>
<th>31/08/2013</th>
<th>01/09/2013</th>
<th>02/09/2013</th>
<th>03/09/2013</th>
<th>04/09/2013</th>
<th>05/09/2013</th>
<th>06/09/2013</th>
<th>09/09/2013</th>
<th>10/09/2013</th>
<th>11/09/2013</th>
<th>12/09/2013</th>
<th>13/09/2013</th>
<th>14/09/2013</th>
<th>15/09/2013</th>
<th>16/09/2013</th>
<th>17/09/2013</th>
<th>18/09/2013</th>
<th>19/09/2013</th>
<th>20/09/2013</th>
<th>22/09/2013</th>
<th>23/09/2013</th>
<th>24/09/2013</th>
<th>25/09/2013</th>
<th>26/09/2013</th>
<th>27/09/2013</th>
<th>29/09/2013</th>
<th>30/09/2013</th>
<th>01/10/2013</th>
<th>02/10/2013</th>
<th>03/10/2013</th>
<th>04/10/2013</th>
<th>06/10/2013</th>
<th>07/10/2013</th>
<th>08/10/2013</th>
<th>09/10/2013</th>
<th>10/10/2013</th>
<th>11/10/2013</th>
<th>12/10/2013</th>
<th>13/10/2013</th>
<th>14/10/2013</th>
<th>15/10/2013</th>
<th>16/10/2013</th>
<th>17/10/2013</th>
<th>18/10/2013</th>
<th>19/10/2013</th>
<th>20/10/2013</th>
<th>21/10/2013</th>
<th>22/10/2013</th>
<th>23/10/2013</th>
<th>24/10/2013</th>
<th>25/10/2013</th>
<th>26/10/2013</th>
<th>27/10/2013</th>
<th>28/10/2013</th>
<th>29/10/2013</th>
<th>30/10/2013</th>
<th>31/10/2013</th>
<th>01/11/2013</th>
<th>02/11/2013</th>
<th>03/11/2013</th>
<th>04/11/2013</th>
<th>05/11/2013</th>
<th>06/11/2013</th>
<th>07/11/2013</th>
<th>08/11/2013</th>
<th>11/11/2013</th>
<th>12/11/2013</th>
<th>13/11/2013</th>
<th>14/11/2013</th>
<th>15/11/2013</th>
<th>17/11/2013</th>
<th>18/11/2013</th>
<th>19/11/2013</th>
<th>20/11/2013</th>
<th>21/11/2013</th>
<th>22/11/2013</th>
<th>23/11/2013</th>
<th>24/11/2013</th>
<th>25/11/2013</th>
<th>26/11/2013</th>
<th>27/11/2013</th>
<th>28/11/2013</th>
<th>29/11/2013</th>
<th>01/12/2013</th>
<th>02/12/2013</th>
<th>03/12/2013</th>
<th>04/12/2013</th>
<th>05/12/2013</th>
<th>06/12/2013</th>
<th>08/12/2013</th>
<th>09/12/2013</th>
<th>10/12/2013</th>
<th>11/12/2013</th>
<th>12/12/2013</th>
<th>13/12/2013</th>
<th>16/12/2013</th>
<th>17/12/2013</th>
<th>18/12/2013</th>
<th>19/12/2013</th>
<th>20/12/2013</th>
<th>22/12/2013</th>
<th>31/12/2013</th>
<th>02/01/2014</th>
<th>03/01/2014</th>
<th>05/01/2014</th>
<th>06/01/2014</th>
<th>07/01/2014</th>
<th>08/01/2014</th>
<th>09/01/2014</th>
<th>10/01/2014</th>
<th>12/01/2014</th>
<th>13/01/2014</th>
<th>14/01/2014</th>
<th>15/01/2014</th>
<th>16/01/2014</th>
<th>17/01/2014</th>
<th>18/01/2014</th>
<th>19/01/2014</th>
<th>20/01/2014</th>
<th>21/01/2014</th>
<th>22/01/2014</th>
<th>23/01/2014</th>
<th>24/01/2014</th>
<th>26/01/2014</th>
<th>27/01/2014</th>
<th>28/01/2014</th>
<th>29/01/2014</th>
<th>30/01/2014</th>
<th>31/01/2014</th>
<th>02/02/2014</th>
<th>03/02/2014</th>
<th>04/02/2014</th>
<th>05/02/2014</th>
<th>06/02/2014</th>
<th>07/02/2014</th>
<th>09/02/2014</th>
<th>10/02/2014</th>
<th>11/02/2014</th>
<th>12/02/2014</th>
<th>13/02/2014</th>
<th>14/02/2014</th>
<th>15/02/2014</th>
<th>16/02/2014</th>
<th>17/02/2014</th>
<th>18/02/2014</th>
<th>19/02/2014</th>
<th>20/02/2014</th>
<th>21/02/2014</th>
<th>22/02/2014</th>
<th>23/02/2014</th>
<th>24/02/2014</th>
<th>25/02/2014</th>
<th>26/02/2014</th>
<th>27/02/2014</th>
<th>28/02/2014</th>
<th>01/03/2014</th>
<th>02/03/2014</th>
<th>03/03/2014</th>
<th>04/03/2014</th>
<th>05/03/2014</th>
<th>06/03/2014</th>
<th>07/03/2014</th>
<th>09/03/2014</th>
<th>10/03/2014</th>
<th>11/03/2014</th>
<th>12/03/2014</th>
<th>13/03/2014</th>
<th>14/03/2014</th>
<th>16/03/2014</th>
<th>17/03/2014</th>
<th>18/03/2014</th>
<th>19/03/2014</th>
<th>20/03/2014</th>
<th>21/03/2014</th>
<th>22/03/2014</th>
<th>23/03/2014</th>
<th>24/03/2014</th>
<th>25/03/2014</th>
<th>26/03/2014</th>
<th>27/03/2014</th>
<th>28/03/2014</th>
<th>30/03/2014</th>
<th>31/03/2014</th>
<th>01/04/2014</th>
<th>02/04/2014</th>
<th>03/04/2014</th>
<th>04/04/2014</th>
<th>05/04/2014</th>
<th>06/04/2014</th>
<th>07/04/2014</th>
<th>08/04/2014</th>
<th>09/04/2014</th>
<th>10/04/2014</th>
<th>11/04/2014</th>
<th>13/04/2014</th>
<th>14/04/2014</th>
<th>15/04/2014</th>
<th>16/04/2014</th>
<th>17/04/2014</th>
<th>22/04/2014</th>
<th>25/04/2014</th>
<th>28/04/2014</th>
<th>29/04/2014</th>
<th>30/04/2014</th>
<th>01/05/2014</th>
<th>02/05/2014</th>
<th>06/05/2014</th>
<th>07/05/2014</th>
<th>08/05/2014</th>
<th>12/05/2014</th>
<th>13/05/2014</th>
<th>19/05/2014</th>
<th>20/05/2014</th>
<th>27/05/2014</th>
<th>06/06/2014</th>
                </tr>
            </tfoot>

            <tbody>
                <tr id="tbodyvalues">
<td>0</td>
<td>0</td>
<td>0</td>
<td>458</td>
<td>198</td>
<td>564</td>
<td>4098</td>
<td>4245</td>
<td>3080</td>
<td>5090</td>
<td>3272</td>
<td>3735</td>
<td>748</td>
<td>8605</td>
<td>4069</td>
<td>5392</td>
<td>7503</td>
<td>1280</td>
<td>124</td>
<td>11271</td>
<td>7627</td>
<td>5274</td>
<td>9066</td>
<td>3575</td>
<td>537</td>
<td>19505</td>
<td>4445</td>
<td>10375</td>
<td>8138</td>
<td>3659</td>
<td>201</td>
<td>20737</td>
<td>6541</td>
<td>9485</td>
<td>4083</td>
<td>290</td>
<td>2191</td>
<td>26187</td>
<td>8240</td>
<td>5972</td>
<td>3306</td>
<td>6287</td>
<td>494</td>
<td>23331</td>
<td>7298</td>
<td>10779</td>
<td>4016</td>
<td>4375</td>
<td>506</td>
<td>21831</td>
<td>9058</td>
<td>6648</td>
<td>3615</td>
<td>23491</td>
<td>7689</td>
<td>7832</td>
<td>10812</td>
<td>3048</td>
<td>1622</td>
<td>14474</td>
<td>7785</td>
<td>5428</td>
<td>3738</td>
<td>7615</td>
<td>9779</td>
<td>6671</td>
<td>3448</td>
<td>6688</td>
<td>2128</td>
<td>378</td>
<td>781</td>
<td>11483</td>
<td>6673</td>
<td>2343</td>
<td>4779</td>
<td>2867</td>
<td>11873</td>
<td>5606</td>
<td>7332</td>
<td>3533</td>
<td>3132</td>
<td>5260</td>
<td>7638</td>
<td>6812</td>
<td>2301</td>
<td>1423</td>
<td>447</td>
<td>3542</td>
<td>5208</td>
<td>6671</td>
<td>4160</td>
<td>2742</td>
<td>1341</td>
<td>6809</td>
<td>3843</td>
<td>4648</td>
<td>2334</td>
<td>1737</td>
<td>1035</td>
<td>1076</td>
<td>6141</td>
<td>2856</td>
<td>3737</td>
<td>879</td>
<td>293</td>
<td>2861</td>
<td>2905</td>
<td>858</td>
<td>3731</td>
<td>327</td>
<td>2236</td>
<td>2709</td>
<td>4153</td>
<td>2533</td>
<td>81</td>
<td>2162</td>
<td>4143</td>
<td>5381</td>
<td>2517</td>
<td>1405</td>
<td>290</td>
<td>3623</td>
<td>3516</td>
<td>3788</td>
<td>3241</td>
<td>537</td>
<td>6802</td>
<td>3928</td>
<td>4334</td>
<td>3717</td>
<td>4044</td>
<td>229</td>
<td>4352</td>
<td>2789</td>
<td>6191</td>
<td>3686</td>
<td>3136</td>
<td>115</td>
<td>1076</td>
<td>5565</td>
<td>5651</td>
<td>7517</td>
<td>4759</td>
<td>3574</td>
<td>74</td>
<td>4542</td>
<td>7459</td>
<td>4213</td>
<td>4399</td>
<td>2581</td>
<td>91</td>
<td>8051</td>
<td>4210</td>
<td>8302</td>
<td>4522</td>
<td>2383</td>
<td>1076</td>
<td>6620</td>
<td>6952</td>
<td>6228</td>
<td>5407</td>
<td>1262</td>
<td>14</td>
<td>725</td>
<td>5977</td>
<td>5348</td>
<td>7394</td>
<td>7711</td>
<td>6207</td>
<td>199</td>
<td>16</td>
<td>5847</td>
<td>6969</td>
<td>4342</td>
<td>4259</td>
<td>3167</td>
<td>726</td>
<td>1193</td>
<td>1417</td>
<td>1807</td>
<td>2287</td>
<td>1923</td>
<td>315</td>
<td>537</td>
<td>537</td>
<td>6097</td>
<td>3827</td>
<td>7249</td>
<td>5149</td>
<td>1726</td>
<td>8952</td>
<td>4216</td>
<td>4743</td>
<td>8722</td>
<td>2755</td>
<td>2087</td>
<td>5708</td>
<td>17189</td>
<td>11078</td>
<td>8755</td>
<td>2849</td>
<td>17</td>
<td>848</td>
<td>4380</td>
<td>5553</td>
<td>6952</td>
<td>5544</td>
<td>2477</td>
<td>1259</td>
<td>7768</td>
<td>6084</td>
<td>3006</td>
<td>4785</td>
<td>1246</td>
<td>1342</td>
<td>5294</td>
<td>7455</td>
<td>6933</td>
<td>2402</td>
<td>1162</td>
<td>3805</td>
<td>2393</td>
<td>2449</td>
<td>1395</td>
<td>505</td>
<td>538</td>
<td>35</td>
<td>35</td>
<td>169</td>
<td>270</td>
<td>2885</td>
<td>3615</td>
<td>3396</td>
<td>3760</td>
<td>738</td>
<td>1847</td>
<td>14048</td>
<td>6463</td>
<td>6292</td>
<td>8154</td>
<td>2582</td>
<td>189</td>
<td>1113</td>
<td>11771</td>
<td>5758</td>
<td>4580</td>
<td>6290</td>
<td>1227</td>
<td>538</td>
<td>12907</td>
<td>4183</td>
<td>5460</td>
<td>5102</td>
<td>2844</td>
<td>187</td>
<td>18556</td>
<td>6831</td>
<td>4753</td>
<td>5521</td>
<td>3443</td>
<td>179</td>
<td>18111</td>
<td>4272</td>
<td>4941</td>
<td>6332</td>
<td>2269</td>
<td>598</td>
<td>860</td>
<td>22396</td>
<td>4446</td>
<td>6031</td>
<td>2551</td>
<td>3781</td>
<td>378</td>
<td>1812</td>
<td>14647</td>
<td>4327</td>
<td>5012</td>
<td>3656</td>
<td>2189</td>
<td>949</td>
<td>1891</td>
<td>15385</td>
<td>4975</td>
<td>7956</td>
<td>3947</td>
<td>1719</td>
<td>2089</td>
<td>11499</td>
<td>4522</td>
<td>6478</td>
<td>4415</td>
<td>2165</td>
<td>551</td>
<td>19430</td>
<td>5586</td>
<td>6549</td>
<td>4369</td>
<td>2870</td>
<td>0</td>
<td>1424</td>
<td>10438</td>
<td>4735</td>
<td>5712</td>
<td>1785</td>
<td>699</td>
<td>537</td>
<td>3325</td>
<td>1724</td>
<td>2543</td>
<td>3219</td>
<td>2776</td>
<td>185</td>
<td>118</td>
<td>4677</td>
<td>674</td>
<td>376</td>
<td>746</td>
<td>847</td>
<td>192</td>
<td>4607</td>
<td>188</td>
<td>1210</td>
<td>327</td>
<td>3438</td>
<td>268</td>
<td>3652</td>
<td>560</td>
<td>190</td>
<td>635</td>
<td>16</td>
<td>2089</td>
<td>418</td>
<td>741</td>
<td>988</td>
<td>336</td>
<td>192</td>
<td>513</td>
<td>665</td>
<td>4</td>

                </tr>
            </tbody>
        </table>
        

        
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Government Searches</title>
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
</head>
<body>
	<div class="container large-margin-top" id="postcodeSearch">

        <!-- Search Box -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class="form" role="form">
                    <div class="input-group">
                        <input v-model="postcode" class="form-control" id="postcode" name="postcode" type="text" placeholder="Enter a postcode"/>
                        <span class="input-group-btn">
                            <button v-on="click: getPostcode" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </span>
                    </div>
                </form>
            </div>
        </div><!-- End Search Box -->

        <!-- Results Box -->
        <div v-show="postcodeDetails" class="debug">
            <h2>Coordinates</h2>
            <div v-repeat="postcodeDetails">
                <p>Postcode: @{{ pc }}</p>
                <p>Northing: @{{ no }}</p>
                <p>Easting:  @{{ ea }}</p>
            </div>
        </div><!-- Results Box -->

        <!-- Results Box -->
        <div v-show="brmaDetails" class="debug">
            <h2>LHA Rates for @{{ postcode | uppercase}}</h2>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>BRMA Name</th>
                    <th>Room</th>
                    <th>1 Bed</th>
                    <th>2 Beds</th>
                    <th>3 Beds</th>
                    <th>4 Beds</th>
                </tr>
                <tr v-repeat="brmaDetails">
                    <td>@{{ name }}</td>
                    <td>&pound; @{{ room }}</td>
                    <td>&pound; @{{ one }}</td>
                    <td>&pound; @{{ two }}</td>
                    <td>&pound; @{{ three }}</td>
                    <td>&pound; @{{ four }}</td>
                </tr>
            </table>
        </div><!-- Results Box -->

        <!-- <pre class="debug">
            @{{ $data | json }}
        </pre> -->
    </div>

	<!-- Scripts -->
	<script src="/js/bundle.js"></script>
</body>
</html>

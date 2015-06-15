<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Government Searches</title>
    <link href="{{ elixir("css/all.css") }}" rel="stylesheet">
</head>
<body>
	<div class="container large-margin-top" id="postcodeSearch">
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
        </div>
    </div>

	<!-- Scripts -->
	<script src="js/bundle.js"></script>
</body>
</html>

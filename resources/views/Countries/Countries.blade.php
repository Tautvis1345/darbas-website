<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Best Airline</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous"> </head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<nav class="navbar navbar-expand-lg bg-light">
		<div class="container-fluid"> <a class="navbar-brand" href="#">Best Airline</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav"> <a class="nav-link" href="/Airports">Airports</a> <a class="nav-link" href="/Countries">Countries</a> <a class="nav-link" href="/Airlines">Airlines</a> </div>
			</div>
		</div>
	</nav>
	<div class="text-center"> <a class="btn btn-danger" href="New_Country" role="button">New Country</a> <a class="btn btn-danger" href="Countries_without_airlines" role="button">Countries without airlines</a> <a class="btn btn-danger" href="Countries_without_airlines_and_airports" role="button">Countries without airlines and airports</a> </div>
	<hr>
	<div class="container-fluid mt-2">
		<table class="table table-dark table-hover">
			<tbody>
				<tr>
					<th scope="row">Name</th>
					<td colspan="2">ISO</td>
					<td></td>
					<td>Actions</td>
					</td>
				</tr>
				<tr>
					<th scope="row">Italy</th>
					<td colspan="2">4321</td>
					<td>
						<div class="text-center">
							<td> <a class="btn btn-warning" href="Countries_Edit" role="button">Edit</a> <a class="btn btn-danger" href="Countries_Delete" role="button">Delete</a> </div>
						</td>
					</td>
				</tr>
				<tr>
					<th scope="row">Tokyo Air</th>
					<td colspan="2">2121</td>
					<td>
						<div class="text-center">
							<td> <a class="btn btn-warning" href="Countries_Edit" role="button">Edit</a> <a class="btn btn-danger" href="Countries_Delete" role="button">Delete</a> </div>
						</td>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>
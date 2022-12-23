<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Companies</title>
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> 

</head>
<body>
	<style>
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<div class="text-center mt-3">
		<h5>Companies</h4>
	</div>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Company Name</th>
				<th>Email</th>
				<th>Website</th>
			</tr>
		</thead>
		<tbody>
			@foreach($companies as $key => $c)
			<tr>
				<td>{{$key + 1 }}</td>
				<td>{{$c->name}}</td>
				<td>{{$c->email}}</td>
				<td>{{$c->website}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
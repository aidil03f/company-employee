<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employees</title>
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
		<h5>Employees</h4>
	</div>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Employee Name</th>
				<th>Company Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@foreach($employees as $key => $employee)
			<tr>
				<td>{{$key + 1 }}</td>
				<td>{{$employee->name}}</td>
				<td>{{$employee->company_id && $employee->company ? $employee->company->name :'-'}}</td>
				<td>{{$employee->email}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
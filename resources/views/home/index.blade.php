@extends('layouts.default')

@section('content')
    <table class="table table-bordered table-striped">
        <tr>
            <td>
              <button type="button" class="btn" data-toggle="collapse" data-target="#collapseme">
                Click to expand
              </button>
            </td>
        </tr>
		<tr class="collapse out" id="collapseme"><td><div>Should be collapsed</div></td></tr>
    </table>

    <table class="table table-responsive table-hover">
    <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
    </thead>
    <tbody>
        <tr class="clickable" data-toggle="collapse" id="row1" data-target=".row1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
        <tr class="collapse row1">
            <td>- child row</td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
    </tbody>
	</table>

	<table class="table table-responsive table-hover">
    <thead>
        <tr><th>Column</th><th>Column</th><th>Column</th><th>Column</th></tr>
    </thead>
    <tbody>
        <tr class="clickable" data-toggle="collapse" data-target="#buka1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>  
            <td>data</td>
        </tr>
	    <table class="table table-striped table-responsive collapse" id="buka1">
		    <thead>
		        <tr><th>Column</th><th>Column</th></tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td>You are using collapse on the div inside of your table row (tr).</td>
		          	<td>data</td>  
		        </tr>
		        <tr>
		            <td>data</td>
		          	<td>You are using collapse on the div inside of your table row (tr).</td>  
		        </tr>
		    </tbody>
	    </table>

        <tr class="clickable" data-toggle="collapse" data-target="#buka1">
            <td><i class="glyphicon glyphicon-plus"></i></td>
            <td>data</td>
          	<td>data</td>
            <td>data</td>
        </tr>
	    <table class="table table-striped table-responsive collapse" id="buka1">
		    <thead>
		        <tr><th>Column</th><th>Column</th></tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td>You are using collapse on the div inside of your table row (tr).</td>
		          	<td>data</td>
		        </tr>
		        <tr>
		            <td>data</td>
		          	<td>You are using collapse on the div inside of your table row (tr).</td>
		        </tr>
		    </tbody>
	    </table>
    </tbody>
	</table>
@stop
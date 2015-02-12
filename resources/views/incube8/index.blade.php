@extends('incube8.master')

@section('content')
<p><label>Enter Bus Stop Number:</label></p>
<input type="text" id="search_location" name="search_location" value="" autocomplete="off" placeholder="e.g. 84071">
<div class="result" id="bus_stop_result"><ul></ul></div>
<div class="result" id="bus_detail_result"><ul></ul></div>
@stop
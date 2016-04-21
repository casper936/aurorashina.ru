<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<style type="text/css">
		body {
			font-family: tahoma, arial, verdana, sans-serif, Lucida Sans;
			font-size: 11px;
		}
		td {
			border-bottom: solid 1px #414141;
			border-left: solid 1px #414141;
			color: #3b73af;
		}
		th {
			border-bottom: solid 1px #414141;
			background-color: #e6e6e6;
		}
		table {
		/*	border: solid 1px #414141;*/
			text-align: center;
		/*	box-shadow: 0 0 10px rgba(0,0,0,0.5);*/
		}
		.problem {
			color: red;
		}
		.ok {
			color: green;
		}
		.Disaster {
			background-color: #FF3333;
		}
		.High {
			background-color: #FF9999;
		}
		.Average {
			background-color: #FFCC99;
		}
		.Warning {
			background-color: #FFFF99;
		}
		.Information {
			background-color: #CCFFFF;
		}
	</style>
</head>

<body>
	<table border = "0" cellspacing = "0" cellpadding = "0" width="450">
		<thead>
			<tr>
				<th colspan="2" height = "50" style = "font-weight: bold; background-color: #205081; color: white;">{HOST.NAME1}</th>
				<th colspan="3" height = "50" style = "font-weight: bold; background-color: #205081; color: white">{HOST.CONN1}</th>
			</tr>
			<tr>
				<th colspan="2" class = "{TRIGGER.STATUS}" style = "font-weight: bold;">{TRIGGER.STATUS}</th>
				<th colspan="3" style = "font-weight: bold; border-left: solid 1px #414141;">Дата события: {EVENT.DATE}<br> Время события: {EVENT.TIME}<br> Возраст события: {EVENT.AGE}</th>
			</tr>
		</thead>
		<tbody>	
			<tr class = "{TRIGGER.SEVERITY}">
				<td colspan="2" rowspan="3" style = "border-bottom: solid 1px #414141;  border-left:0 !important;">{HOST.NAME1}</td>
				<td height = "25">Severity: </td>
				<td colspan="2">{TRIGGER.SEVERITY}</td>
			</tr>
			<tr style = "background-color: #f5f5f5;">
				<td height = "25">Событие: </td>
				<td colspan="2">{ITEM.NAME1} = {ITEM.VALUE1}</td>
			</tr>
			<tr style = "background-color: #f5f5f5;">
				<td height = "25">Cтатус: </td>
				<td colspan="2" class = "{TRIGGER.STATUS}">{TRIGGER.STATUS}</td>
			</tr>
		<tr style = "background-color: #205081;">
			<td colspan="5" style = "border-bottom: 0 !important; color: white !important">Description: {TRIGGER.DESCRIPTION}</td>
		</tr>
		</tbody>
	</table>
</body>
</html>
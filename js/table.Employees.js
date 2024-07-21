
/*
 * Editor client script for DB table Employees
 * Created by http://editor.datatables.net/generator
 */

addEventListener("DOMContentLoaded", function () {
	var editor = new DataTable.Editor( {
		ajax: 'php/table.Employees.php',
		table: '#Employees',
		fields: [
			{
				"label": "first_name:",
				"name": "first_name"
			},
			{
				"label": "last_name:",
				"name": "last_name"
			},
			{
				"label": "email:",
				"name": "email"
			},
			{
				"label": "department_id:",
				"name": "department_id"
			},
			{
				"label": "manager_id:",
				"name": "manager_id"
			},
			{
				"label": "role_id:",
				"name": "role_id"
			},
			{
				"label": "rfid_card_id:",
				"name": "rfid_card_id"
			},
			{
				"label": "external_id:",
				"name": "external_id"
			},
			{
				"label": "adp_employee_id:",
				"name": "adp_employee_id"
			},
			{
				"label": "employment_type:",
				"name": "employment_type",
				"type": "select",
				"options": [
					"'Part Time'",
					"'Full Time'",
					"'Temp'"
				]
			},
			{
				"label": "temp_agency_id:",
				"name": "temp_agency_id"
			},
			{
				"label": "active:",
				"name": "active",
				"type": "checkbox",
				"separator": ",",
				"options": [
					"True"
				]
			},
			{
				"label": "created_at:",
				"name": "created_at",
				"type": "datetime",
				"format": "YYYY-MM-DD HH:mm:ss"
			},
			{
				"label": "created_by:",
				"name": "created_by"
			},
			{
				"label": "updated_at:",
				"name": "updated_at",
				"type": "datetime",
				"format": "YYYY-MM-DD HH:mm:ss"
			},
			{
				"label": "updated_by:",
				"name": "updated_by"
			}
		]
	} );

	var table = new DataTable('#Employees', {
		ajax: 'php/table.Employees.php',
		columns: [
			{
				"data": "first_name"
			},
			{
				"data": "last_name"
			},
			{
				"data": "email"
			},
			{
				"data": "department_id"
			},
			{
				"data": "manager_id"
			},
			{
				"data": "role_id"
			},
			{
				"data": "rfid_card_id"
			},
			{
				"data": "external_id"
			},
			{
				"data": "adp_employee_id"
			},
			{
				"data": "employment_type"
			},
			{
				"data": "temp_agency_id"
			},
			{
				"data": "active"
			},
			{
				"data": "created_at"
			},
			{
				"data": "created_by"
			},
			{
				"data": "updated_at"
			},
			{
				"data": "updated_by"
			}
		],
		layout: {
			topStart: {
				buttons: [
					{ extend: 'create', editor: editor },
					{ extend: 'edit', editor: editor },
					{ extend: 'remove', editor: editor }
				]
			}
		},
		select: true
	});
});


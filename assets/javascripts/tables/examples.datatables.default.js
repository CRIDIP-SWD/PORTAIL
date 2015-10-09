/*
Name: 			Tables / Advanced - Examples
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version: 	1.4.1
*/

(function( $ ) {

	'use strict';

	var datatableInit = function() {

		$('#etat_service_serveur').dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
			}
		});
		$('#chantier_cridip').dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.9/i18n/French.json"
			}
		});

	};

	$(function() {
		datatableInit();
	});

}).apply( this, [ jQuery ]);
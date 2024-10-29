(function( $ ) {
	'use strict';

jQuery(document).ready(function() {

    jQuery("#example").DataTable({
            responsive: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>tp",

            buttons: [
            {extend: 'copy', className: 'btn btn-primary btn-xs'},
            {
            extend: 'csv', title: 'Department mapping',className:  'btn btn-warning btn-xs' ,
            exportOptions: {columns:[0,1,2], modifier: {page: 'current'} }
            },
            {
            extend: 'excel',
            title: 'Department mapping',
            className:  'btn btn-success btn-xs' ,
            exportOptions: {columns:[0,1,2],modifier: {page: 'current'} }
            },
            {
            extend: 'pdf',
            title: 'Department mapping',
            className: 'btn btn-danger btn-xs',
            exportOptions: { columns:[0,1,2],modifier: {page: 'current'} }
            },
            {
            extend: 'print', className:  'btn btn-info btn-xs',
            exportOptions: { columns:[0,1,2], modifier: { page: 'current'}}
            }
         ]
    });


    jQuery("#exampledsfsd").DataTable({
            responsive: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>tp",

            buttons: [
            {extend: 'copy', className: 'btn btn-primary btn-xs'},
            {
            extend: 'csv', title: 'Department mapping',className:  'btn btn-warning btn-xs' ,
            exportOptions: {columns:[0,1,2,3,4,5,6,7], modifier: {page: 'current'} }
            },
            {
            extend: 'excel',
            title: 'Department mapping',
            className:  'btn btn-success btn-xs' ,
            exportOptions: {columns:[0,1,2,3,4,5,6,7],modifier: {page: 'current'} }
            },
            {
            extend: 'pdf',
            title: 'Department mapping',
            className: 'btn btn-danger btn-xs',
            exportOptions: { columns:[0,1,2,3,4,5,6,7],modifier: {page: 'current'} }
            },
            {
            extend: 'print', className:  'btn btn-info btn-xs',
            exportOptions: { columns:[0,1,2,3,4,5,6,7], modifier: { page: 'current'}}
            }
         ]
    });    

    jQuery("#customer").DataTable({
            responsive: true,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            dom: "<'row'<'col-sm-4'l><'col-sm-4'B><'col-sm-4'f>>tp",

            buttons: [
            {extend: 'copy', className: 'btn btn-primary btn-xs'},
            {
            extend: 'csv', title: 'Department mapping',className:  'btn btn-warning btn-xs' ,
            exportOptions: {columns:[0,1,2,3,4,5,6,7], modifier: {page: 'current'} }
            },
            {
            extend: 'excel',
            title: 'Department mapping',
            className:  'btn btn-success btn-xs' ,
            exportOptions: {columns:[0,1,2,3,4,5,6,7],modifier: {page: 'current'} }
            },
            {
            extend: 'pdf',
            title: 'Department mapping',
            className: 'btn btn-danger btn-xs',
            exportOptions: { columns:[0,1,2,3,4,5,6,7],modifier: {page: 'current'} }
            },
            {
            extend: 'print', className:  'btn btn-info btn-xs',
            exportOptions: { columns:[0,1,2,3,4,5,6,7], modifier: { page: 'current'}}
            }
         ]
    });



} );


})( jQuery );

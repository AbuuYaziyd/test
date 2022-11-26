<script>
    var tableConstructor = $('.dataex-res-constructor').DataTable({
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/ar.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                extend: 'print',
            },
            {
                extend: 'excelHtml5',
            },
        ],
        responsive: true
    });
</script>
<?= $this->extend('layouts/fac-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Tasks</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">

<link href="<?= base_url('assets/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url('asssets/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="statbox widget box box-shadow">
    <div class="widget-content widget-content-area">
        <table id="style-2" class="table style-2 dt-table-hover">
            <thead>
                <tr>
                    <th class="checkbox-column dt-no-sorting"> Record Id </th>
                    <th>Full Name</th>
                    <th>Lorem ipsum</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="checkbox-column"> 1 </td>
                    <td>Jane</td>
                    <td>Lamb</td>
                    <td>1:43 AM</td>
                </tr>
                <tr>
                    <td class="checkbox-column"> 2 </td>
                    <td>Anne</td>
                    <td>IDK</td>
                    <td>2:43 AM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-start border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <h5 class="modal-title ms-3" id="exampleModalCenterTitle">Procurement Task</h5>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body d-flex justify-content-start align-items-center">
                <img src="<?= base_url('assets/images/user.png') ?>" alt="user" class="rounded-circle" width="60" height="60">
                <div class="ms-3">
                    <h6>Ron Eric Legaspi</h6>
                    <p>ronericlegaspi@tup.edu.ph <span class="fw-bold">06/10/2025</span> - 2:01 AM</p>
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body">
                <h6 class="mb-3">Dear Department Head,</h6>
                <p>
                I hope this message finds you well.
                I would like to request the procurement of the following laboratory equipment for the Biology Department:
                2x Digital Microscopes
                1x Centrifuge Machine
                3x Glassware Sets
                Please find the attached PR form with detailed specifications and justifications.
                Kindly let me know if further documentation or clarification is needed.
                </p>
                <h6 class="d-flex flex-column mt-3">
                <span>Best regards,</span>
                <span>Ron Eric Legaspi</span>
                Faculty, Biology Department
                </h6>
                <div class="text-center mt-5">
                    <button type="button" class="btn btn-sm" style="background-color: #7B7B7B; color: #FFFFFF">REJECT</button>
                    <button type="button" class="btn btn-sm" style="background-color: #C62742; color: #FFFFFF">APPROVE</button>
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-footer d-flex justify-content-start border-top-0">
                <div class="attachment file-pdf">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <div class="media-body">
                            <p class="file-name">Confirm File</p>
                            <p class="file-size">450kb</p>
                        </div>
                    </div>
                </div>
                <div class="attachment file-pdf">
                    <div class="media">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        <div class="media-body">
                            <p class="file-name">Confirm File</p>
                            <p class="file-size">450kb</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script>
    // var e;
    c2 = $('#style-2').DataTable({
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML=`
            <div class="form-check form-check-primary d-block new-control">
                <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
            </div>`
        },  
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return `
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                </div>`
            }
        }],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'f><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        },
        "pageLength": 10,
        initComplete: function () {
            var api = this.api();
            $(api.table().container()).find('.dt--top-section .row .col-sm-6:eq(1)').append('<button type="button" class="btn btn-md add" style="background-color: #C62742; color: #FFFFFF"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">'+
                '<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>'+
                '</svg></button>'
            );
        }
    });

    multiCheck(c2);

    $('#style-2 tbody').on('click', 'tr', function() {
        var rowData = c2.row(this).data();

        // Update modal body with row data
        var modalBodyContent = "";
        for (var i = 0; i < rowData.length; i++) {
            modalBodyContent += rowData[i] + "<br>";
        }
        $('.modal-body .modal-text').html(modalBodyContent);

        // Show the modal
        $('#exampleModalCenter').modal('show');
    });
</script>
<?= $this->endSection() ?>
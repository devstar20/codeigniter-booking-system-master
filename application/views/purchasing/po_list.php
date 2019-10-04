<?php $this->load->view('templates/header'); ?>

    <!-- ==================== WIDGETS CONTAINER ==================== -->
    <div class="container">
        <div class="row top10">
            <div class="col-md-12">
                <a href="<?php echo base_url() ?>purchasing/create_po" class="btn btn-primary pull-right mb clearform">
                    <i class="icon-plus-sign"></i> New P.O
                </a>
            </div>
        </div>
        <!-- ==================== TABLE ROW ==================== -->
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="widget-head">Purchase Orders</div>
                    <div class="widget-content">
                        <div id="datatable_wrapper" class="dataTables_wrapper" role="grid">
                            <table class="table table-bordered dataTable" id="membersTable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Supplier</th>
                                    <th></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==================== END OF BORDERED TABLE FLOATING BOX ==================== -->
    </div>
    <script>
        $(document).ready(function () {
            var oTable = $('#membersTable').dataTable({
                "bServerSide": true,
                "sPaginationType": "full_numbers",
                "sAjaxSource": "<?php echo base_url() ?>purchasing/getPOs",
                "sServerMethod": "POST",
                "aoColumns": [
                    {"aaData": "0", "sType": "numeric", 'sClass': "center"},
                    {"aaData": "1", 'sClass': "center"},
                    {"aaData": "2", 'sClass': "center"},
                    {"aaData": null, 'bSortable': false, 'bSearchable': false, 'sClass': "center", 'sWidth': '100px'}
                ],
                "fnRowCallback": function (nRow, aData, iDisplayIndex) {
                    var edit = '';
                    if (aData[3] <= 0) {
                        edit = '<a class="btn btn-xs btn-default" href="<?php echo base_url() ?>purchasing/create_po/' + aData['0'] + '"><i class="fa fa-pencil"></i></a>';
                    }
                    $('td:eq(3)', nRow).html('<a class="btn btn-xs btn-default" href="javascript:popup(\'<?php echo base_url() ?>documents/purchase_order/' + aData['0'] + '\')"><i class="fa fa-file"></i></a>' + edit);
                    return nRow;
                },
            });
        });
    </script>

<?php $this->load->view('templates/footer'); ?>
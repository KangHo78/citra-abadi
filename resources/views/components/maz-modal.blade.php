<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .modal-backdrop.show {
        /* Change background color */
        background-color: rgba(0, 0, 0, 0.5);
        /* Adjust opacity as needed */
    }

    .modal-backdrop.show {
        z-index: -1;
    }
    .invoice-head-top-right h5{
        font-size: 13px !important;
        margin-bottom: 1px !important;
        font-style: italic;
        font-weight: 400;
    }
</style>

<form id="stored" action="" method="GET">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group pb-1 parent">
                        <h6 class="form-label"><span>Date Start</span></h6>
                        <div class="input-group mb-1">
                            <span style=";" class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            @php
                            @endphp
                            @if (isset($date_start))
                            <input class="form-control datepicker" placeholder="Date" tabindex="0" type="text"
                                readonly="readonly" name="date_start" id="date_start" value = "{{ $date_start }}">
                            @else
                            <input class="form-control datepicker" placeholder="Date" tabindex="0" type="text"
                                readonly="readonly" name="date_start" id="date_start" value = "">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group pb-1 parent">
                        <h6 class="form-label"><span>Date End</span></h6>
                        <div class="input-group mb-1">
                            <span style=";" class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                            @if (isset($date_end))
                            <input class="form-control datepicker" placeholder="Date" tabindex="0" type="text"
                                readonly="readonly" name="date_end" id="date_end" value = "{{ $date_end }}">
                            @else
                            <input class="form-control datepicker" placeholder="Date" tabindex="0" type="text"
                                readonly="readonly" name="date_end" id="date_end" value = "">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Filter Data</button>
            </div>
        </div>
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<!-- Bootstrap Datepicker CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<!-- Bootstrap Datepicker JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>


<script>
       $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            todayHighlight: 'TRUE',
            autoclose: true
        });
    });
</script>
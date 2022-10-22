<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/assets/js/demo/datatables-demo.js"></script>

<!-- datetimepicker -->
<script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    const rupiah = (number) => {
        return (new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number)).replace(",00", "");
    }

    const rupiahToNumber = (rupiah) => {
        const pattern = /[Rp .]/g;
        if (rupiah.match(pattern)) {
            if (rupiah == "Rp "){
                return 0;
            }
            const number = rupiah.replace(pattern, '');
            return parseInt(number);
        }
        return rupiah;
    }
</script>

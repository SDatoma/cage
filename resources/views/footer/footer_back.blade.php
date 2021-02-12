<!-- Jquery Core Js --> 
<script src="{{asset('css_backend/assets/backend_bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{asset('css_backend/assets/backend_bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('css_backend/assets/backend_bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('css_backend/assets/backend_bundles/c3.bundle.js')}}"></script>

<script src="{{asset('css_backend/assets/backend_bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('css_backend/assets/js/pages/index.js')}}"></script>

<script src="{{asset('css_backend/assets/backend_bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('css_backend/assets/backend_bundles/data.js')}}"></script>

<script src="{{asset('css_backend/assets/backend_bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('css_backend/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('css_backend/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('css_backend/assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('css_backend/assets/js/pages/forms/dropify.js')}}"></script>
<script src="{{asset('css_backend/assets/js/pages/forms/basic-form-elements.js')}}"></script>
<script src="{{asset('css_backend/assets/plugins/summernote/dist/summernote.js')}}"></script>
<script src="{{asset('css_backend/assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
<script src="{{asset('css_backend/assets/js/pages/forms/advanced-form-elements.js')}}"></script>

<!-- Jquery Core Js --> 
<script src="{{asset('css_backend/assets/plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Jquery Validation Plugin Css --> 
<script src="{{asset('css_backend/assets/plugins/jquery-validatiassets/js/pages/forms/form-validation.js')}}"></script> 
<script src="{{asset('css_backend/assets/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>


<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

<script type="text/javascript">

        $(document).ready(function () {

            $('#check_all').on('click', function (e) {

                if ($(this).is(':checked', true)) {

                    $(".checkbox").prop('checked', true);

                } else {

                    $(".checkbox").prop('checked', false);

                }

            });

            $('.checkbox').on('click', function () {

                if ($('.checkbox:checked').length == $('.checkbox').length) {

                    $('#check_all').prop('checked', true);

                } else {

                    $('#check_all').prop('checked', false);

                }

            });

            $('#doaffect').on('submit', function (e) {
                var idsArr = [];
                $(".checkbox:checked").each(function () {
                    idsArr.push($(this).attr('data-id'));
                });
                if (idsArr.length <= 0) {
                    alert("Veuillez selectionner les clients concernées.");
                    return false;
                } else {
                    if (!confirm("Vous etes sur d'envoyer ce message a ce(s) clients ?")) {
                        return false
                    } else
                    {
                        $("#selectedids").val("["+idsArr+"]");

                        return true;
                    }
                }
            });

        });

    </script>

</body>


</html>
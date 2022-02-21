
<!-- <script type="text/javascript">
$(document).ready(function() {
    $("#submitBtn").click(function(e) {
        e.preventDefault();
        // $("#submitBtn").prop("disabled", true);


        let lastsubcat=$(".selectClass").eq($(".selectClass").length-1).val();

        if (lastsubcat==='')
        {
            lastsubcat=$(".selectClass").eq($(".selectClass").length-2).val();
        }

        console.log(lastsubcat);



        var createUrl = "<?php echo base_url().$CI->module_url_create.'/'; ?>" + lastsubcat;

        // console.log('Log: ' + createUrl);
        window.location.href=createUrl;

    });
});
</script> -->

<script type = "text/javascript" >
    $(function() {

        $(document).on("change", ".selectClass", function() {
            var index = $(this).index(".selectClass");
            var catboxlen = $(".selectClass").length;



            if (index < catboxlen) {
                for (var i = index; i < catboxlen; i++) {

                    $(".categorybx .col-sm-12").eq(index + 1).remove();
                }
            }

            // console.log('my message' + formData.get('pkg_id'));
            var subCatId = $(this).val();
            var pkgId = $("[name='pkg_id']").val();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url().version_prefix.'database/get-category-by-parent-id' ?>",
                data: {
                    sub_cat_id: subCatId,
                    pkg_id: pkgId
                },

            }).done(function(result) {
                var data = result.data;

                if (data != null && result.data.length) {
                    var html =
                        '<div class="col-sm-12 mb-3">' +
                        '<label for="sub_cat_id" class="formbuilder-number-label">Sub Category</label>' +
                        '<select class="form-control selectClass" name="sub_cat_id" id="sub_cat_id">' +
                        '<option value="">Select category</option>';

                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i]['cat_id'] + '">' + data[i]['title'] + '</option>';
                    }

                    html += '</select></div>';

                    $(".categorybx").append(html);

                }
            });
        });
    });
</script>

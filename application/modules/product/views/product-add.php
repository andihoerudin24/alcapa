<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">


<div class="row">

    <div class="col-12 py-4 px-5">
        <div class="row">
            <div class="col-12">

                <div class="card shadow">
                    <div class="card-body">
                        <h6 class="text-uppercase element-header">
                            <strong>Add Product</strong>
                        </h6>

                        <form action="<?php echo site_url(); ?>product/add/" method="post" enctype="multipart/form-data">
                        <div class="d-flex justify-content-end align-items-center">
                            <label class="pr-2" for="">Publish</label>
                            <label class="switch">
                                <input type="checkbox" id="togBtn" name="product_is_publish">
                                <span class="slider round"></span>
                            </label>
                        </div>

                    
                            <div class="row justify-content-between">
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input name="SKU" class="form-control" placeholder="Sku-004">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Title</label>
                                        <input name="product_title" class="form-control" placeholder="Product title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Image</label>
                                <div class='file file--upload'>
                                    <label class="mb-0" for='files'>
                                        <i class="fas fa-image"></i> Add Images
                                    </label>
                                    <input multiple name="images[]" id='files' type='file' />
                                </div>
                            </div>

                            <div id="selectedFiles" class="row"></div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Short Description</label>
                                <textarea name="product_short_description" id="editor1">
								</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="product_description" id="editor2">
								</textarea>
                            </div>


                            <!-- <div>
                                <label for="exampleInputEmail1">Product Size</label>
                                <select class="form-control" name="product_size[]" multiple="multiple">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div> -->



                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Category</label>
                                        <?php echo cmb_dinamis('category_id', 'category', 'category_name', 'category_id', null); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Sub Category</label>
                                        <input type="text" name="product_subcategory" class="form-control" placeholder="Product">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_subchild">Product Sub Category Child</label>
                                        <input type="text" name="product_subchild" class="form-control" placeholder="Product">
                                    </div>
                                </div>

                            </div>

                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" name="product_price" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock</label>
                                        <input type="number" name="product_stock" class="form-control" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationCustom01">Weight (gram)</label>
                                        <input type="number" class="form-control" placeholder="kg" required name="product_weight">
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Size</label>
                                        <select class="js-example-basic-multiple" name="product_size[]" multiple="multiple">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Varian Color</label>
                                        <input name="color[]" id='colorpicker1' />
                                        <input name="color[]" id='colorpicker2' />
                                        <input name="color[]" id='colorpicker3' />
                                        <input name="color[]" id='colorpicker4' />
                                        <input name="color[]" id='colorpicker5' />
                                    </div>
                                </div>
                            </div>




                            <!-- <div class="extra-fields-customer">Product Variant Color</div> -->
                            <!-- <div class="customer_records"> -->
                            <!-- <input name="customer_name" type="text" value="name"> -->

                            <!-- <div class="extra-fields-customer">Add More Customer</div> -->

                            <!-- </div> -->

                            <!-- <div class="customer_records_dynamic"></div> -->







                            <!-- <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom01">Weight (gram)</label>
                                    <input type="number" class="form-control" placeholder="kg" value="600" required
                                        name="product_weight">

                                </div>
                            </div> -->







                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">Short Description</label>
                                <textarea name="product_description" id="editor1">

								</textarea>
                            </div> -->
                            <!-- <div>
                                <label for="exampleInputEmail1">Product Image</label>
                                <input type="file" name="userfile" class="form-control" placeholder="Price">
                            </div> -->



                            <!-- <div class="form-group">
                                <label for="exampleInputEmail1">weight</label>
                                <input type="number" name="product_weight" class="form-control" placeholder="weight">
                            </div> -->


                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo site_url("product") ?>" class="btn btn-primary">Cancel</a>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".js-example-basic-multiple").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })
        $('.categori').select2();
        $('.subcategori').select2();
        $('.subcategorichild').select2();
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');





        // MULTIPLE IMAGE START
        var selDiv = "";
        var storedFiles = [];

        $(document).ready(function() {
            $("#files").on("change", handleFileSelect);

            selDiv = $("#selectedFiles");
            $("#myForm").on("submit", handleForm);

            $("body").on("click", ".selFile", removeFile);
        });

        function handleFileSelect(e) {
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            filesArr.forEach(function(f) {

                if (!f.type.match("image.*")) {
                    return;
                }
                storedFiles.push(f);

                var reader = new FileReader();
                reader.onload = function(e) {
                    var html = "<div class=\"col-md-2\"><div class=\"limit selFile\"><img src=\"" + e.target
                        .result +
                        "\" alt=\"\" /></div></div>";
                    // var html = "<div class=\"col-md-1\"><img src=\"" + e.target.result +
                    //     "\" class=\"img-thumbnail selFile\" alt=\"...\" /></div>";
                    // var html = "<div class=''><img src=\"" + e.target.result + "\" data-file='" + f.name +
                    //     "'class='selFile' title='Click to remove'>" + "</div>";

                    selDiv.append(html);


                }
                reader.readAsDataURL(f);
            });

        }

        function handleForm(e) {
            e.preventDefault();
            var data = new FormData();

            for (var i = 0, len = storedFiles.length; i < len; i++) {
                data.append('files', storedFiles[i]);
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'handler.cfm', true);

            xhr.onload = function(e) {
                if (this.status == 200) {
                    console.log(e.currentTarget.responseText);
                    alert(e.currentTarget.responseText + ' items uploaded.');
                }
            }

            xhr.send(data);
        }

        function removeFile(e) {
            var file = $(this).data("file");
            for (var i = 0; i < storedFiles.length; i++) {
                if (storedFiles[i].name === file) {
                    storedFiles.splice(i, 1);
                    break;
                }
            }
            $(this).parent().remove();
        }
        // MULTIPLE IMAGE END


        $('.extra-fields-customer').click(function() {

            $('.customer_records').clone().appendTo('.customer_records_dynamic');
            $('.customer_records_dynamic .customer_records').addClass('single remove');
            $('.single .extra-fields-customer').remove();
            $('.single').append('<div class="remove-field btn-remove-customer">Remove Fields</div>');
            $('.customer_records_dynamic > .single').attr("class", "remove");

            $('.customer_records_dynamic input').each(function() {
                var count = 0;
                var fieldname = $(this).attr("name");
                $(this).attr('name', fieldname + count);
                count++;
            });



        });

        $(document).on('click', '.remove-field', function(e) {
            $(this).parent('.remove').remove();
            e.preventDefault();
        });

        $("#colorpicker1").spectrum({
            color: "#f00"
        });
        $("#colorpicker2").spectrum({
            color: "#fff"
        });
        $("#colorpicker3").spectrum({
            color: "#fff"
        });
        $("#colorpicker4").spectrum({
            color: "#fff"
        });
        $("#colorpicker5").spectrum({
            color: "#fff"
        });
        var switchStatus = false;
        $("#togBtn").on('change', function() {
            if ($(this).is(':checked')) {
                switchStatus = $(this).is(':checked');
                $("#togBtn").val(switchStatus)
                //alert(switchStatus); // To verify
            } else {
                switchStatus = $(this).is(':checked');
                $("#togBtn").val(switchStatus)
                //alert(switchStatus); // To verify
            }
        });
    </script>
</div>
</div>
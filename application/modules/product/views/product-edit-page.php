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
                            <strong>Edit Product</strong>
                        </h6>

                        <form action="<?php echo site_url(); ?>product/update/" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                            <div class="d-flex justify-content-end align-items-center">
                                <label class="pr-2" for="">Publish</label>
                                <label class="switch">
                                    <input checked="<?php $product['product_is_publish'] === 1 ? 'checked' : '' ?>" type="checkbox" id="togBtn" name="product_is_publish">
                                    <span class="slider round"></span>
                                </label>
                            </div>



                            <div class="row justify-content-between">
                                <div class="col-md-5">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">SKU</label>
                                        <input name="SKU" class="form-control" readonly value="<?php echo $product['product_sku'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Title</label>
                                        <input name="product_title" class="form-control" value="<?php echo $product['product_title'] ?>" placeholder="Product title">
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
                            <?php if ($product_image) : ?>
                                <?php foreach ($product_image as $img) : ?>
                                    <img src="<?php echo $img['images'] ?>" width="50px" height="50px" alt="Italian Trulli">
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div id="selectedFiles" class="row"></div>
                            <?php endif; ?>
                            <div id="selectedFiles" class="row"></div>






                            <div class="form-group">
                                <label for="exampleInputEmail1">Short Description</label>
                                <textarea name="product_description" id="editor1">
								<?php if ($product) {
                                    echo $product['product_short_description'];
                                } else {
                                    echo "";
                                } ?>
								</textarea>
                            </div>






                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="product_description" id="editor2">
                                <?php if ($product) {
                                    echo $product['product_description'];
                                } else {
                                    echo "";
                                } ?>
								</textarea>
                            </div>






                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Category</label>
                                        <?php echo cmb_dinamis('category_id', 'category', 'category_name', 'category_id', $product['category_id']); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Sub Category</label>
                                        <input type="text" name="product_subcategory" class="form-control" placeholder="Product" value="<?php echo $product['product_subcategory'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_subchild">Product Sub Category Child</label>
                                        <input type="text" name="product_subchild" class="form-control" value="<?php echo $product['product_subchild'] ?>" placeholder="Product">
                                    </div>
                                </div>
                            </div>






                            <div class="row justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="number" name="product_price" class="form-control" value="<?php echo $product['product_price'] ?>" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Stock</label>
                                        <input type="number" name="product_stock" class="form-control" value="<?php echo $product['product_stock'] ?>" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="validationCustom01">Weight (gram)</label>
                                        <input type="number" class="form-control" placeholder="kg" required value="<?php echo $product['product_weight'] ?>" name="product_weight">
                                    </div>
                                </div>
                            </div>






                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Size</label>
                                        <select class="js-example-basic-multiple" name="product_size[]" multiple="multiple">
                                            <option value="S" selected="<?php $product_varian[0]['sizes'] === 'S' ? true : false ?>">S</option>
                                            <option value="M" selected="<?php $product_varian[1]['sizes'] === 'M' ? true : false ?>">M</option>
                                            <option value="L" selected="<?php $product_varian[2]['sizes'] === 'L' ? true : false ?>">L</option>
                                            <option value="XL" selected="<?php $product_varian[3]['sizes'] === 'XL' ? true : false ?>">XL</option>
                                            <option selected=="<?php $product_varian[4]['sizes'] === 'XXL' ? true : false ?>" value="XXL">XXL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Varian Color</label>
                                        <div>
                                            <input name="color[]" id='colorpicker1' />
                                            <input name="color[]" id='colorpicker2' />
                                            <input name="color[]" id='colorpicker3' />
                                            <input name="color[]" id='colorpicker4' />
                                            <input name="color[]" id='colorpicker5' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="<?php echo site_url("product") ?>" class="btn btn-primary">Cancel</a>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // $(".js-example-basic-multiple").val(["VAL3", "New tag"]).trigger("change");



        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');

        $("#colorpicker1").spectrum({
            color: "#fff",
            showInput: true,
            allowEmpty: true,
            showPalette: true,
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            palette: [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ]

        });
        $("#colorpicker2").spectrum({
            color: "#fff",
            showInput: true,
            allowEmpty: true,
            showPalette: true,
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            palette: [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ]

        });
        $("#colorpicker3").spectrum({
            color: "#fff",
            showInput: true,
            allowEmpty: true,
            showPalette: true,
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            palette: [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ]

        });
        $("#colorpicker4").spectrum({
            color: "#fff",
            showInput: true,
            allowEmpty: true,
            showPalette: true,
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            palette: [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ]

        });
        $("#colorpicker5").spectrum({
            color: "#fff",
            showInput: true,
            allowEmpty: true,
            showPalette: true,
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            palette: [
                ["#000", "#444", "#666", "#999", "#ccc", "#eee", "#f3f3f3", "#fff"],
                ["#f00", "#f90", "#ff0", "#0f0", "#0ff", "#00f", "#90f", "#f0f"],
                ["#f4cccc", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc"],
                ["#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd"],
                ["#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0"],
                ["#c00", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79"],
                ["#900", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47"],
                ["#600", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130"]
            ]

        });


        $(".js-example-basic-multiple").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })




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
    </script>

</div>
</div>
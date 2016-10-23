<!-- head -->
<?php $this->load->view('admin/product/head',$this->data); ?>
<!-- Content -->
<div class="wrapper">
    <div class="widget">
        <div class="title">
            <h6>Cập nhật sản phẩm</h6>
        </div>
        <!-- Form -->
        <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
            
            <fieldset>
                
                <div class="formRow">
                    <label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <input name="name" value="<?= $row_product->name ?>" id="param_name" _autocheck="true" type="text" style="width:250px;"/>
                        </span>
                        <span name="name_autocheck" class="autocheck"></span>
                        <div name="name_error" class="clear error"><?php echo form_error('name'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_name">Giá:<span class="req">*</span></label>
                    <div class="formRight">
                        <span class="oneTwo">
                            <input name="price" value="<?=(int)$row_product->price ?>" id="param_price" _autocheck="true" type="text" style="width: 100px;" class="format_number"/>
                            <img class='tipS' title='Giá bán sử dụng để giao dịch' style='margin-bottom:-8px'  src='<?= public_url('admin') ?>/crown/images/icons/notifications/vnd_3.jpg' width='30px' height='22px'/>
                        </span>
                        <span name="price_autocheck" class="autocheck"></span>
                        <div name="sort_price" class="clear error"><?php echo form_error('price'); ?></div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label class="formLeft" for="param_name">Loại Sản Phẩm:</label>
                    <div class="formRight">
                        <select name="catalog">
                            <!-- <option value="<?= $row_catalog->catalog_id ?>"><?= $row_catalog->name ?></option> -->
                        </select>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label class="formLeft" for="param_name">Hình ảnh:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input type= "file" name="image_link" value="" _autocheck="true" type="text" /></span>
                        <span name="image_link_autocheck" class="autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow">
                    <label class="formLeft" for="param_name">Hình ảnh kèm theo:</label>
                    <div class="formRight">
                        <span class="oneTwo"><input type= "file" name="image_list[]" id="param_image_list" _autocheck="true" type="text" multiple/></span>
                        <span name="image_list_autocheck" class="autocheck"></span>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formSubmit">
                    <input type="submit" value="Update" class="redB" />
                </div>
            </fieldset>
            

        </form>
    </div>
</div>
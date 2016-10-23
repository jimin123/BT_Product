        <!-- head -->
        <?php $this->load->view('admin/product/head',$this->data); ?>
        <!-- Content -->
        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <h6>Thêm mới sản phẩm</h6>
                </div>
                <!-- Form -->
                <form class="form" id="form" action="<?= admin_url('product/add_product') ?>" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên sản phẩm:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" value="<?php echo set_value('name') ?>" id="param_name" _autocheck="true" type="text" style="width:250px;"/></span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_price">
                                Giá :<span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input name="price" style='width:95px' value="<?php echo set_value('price') ?>" id="param_price" _autocheck="true" type="text" class="format_number" />
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
                                <option value="">Lựa chọn danh mục</option>
                                <select name="catalog">
                                    <option value=""></option>
                                    <?php foreach($list_catalog as $row) :?>
                                    <?php if(count($row->sub) > 1) :?>
                                    <optgroup label="<?= $row->name ?>">
                                        <?php foreach ($row->sub as $sub) :?>
                                        <option value="<?= $sub->catalog_id ?>"><?= $sub->name ?></option>
                                    <?php endforeach ;?>
                                    </optgroup>
                                    <?php else :?>
                                     <option value="<?= $row->catalog_id ?>"><?= $row->name ?></option>
                                    <?php endif ;?>
                                    <?php endforeach ;?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Hình ảnh:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input type= "file" name="image_link" value="<?php echo set_value('image_link') ?>" id="param_image_link" _autocheck="true" type="text" /></span>
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
                            <input type="submit" name="submit" value="Thêm mới" class="redB" />
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
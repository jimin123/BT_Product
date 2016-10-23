        <!-- head -->
        <?php $this->load->view('admin/catalog/head',$this->data); ?>
        <!-- Content -->
        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <h6>Thêm mới danh mục sản phẩm</h6>
                </div>
                <!-- Form -->
                <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên danh mục:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" value="<?php echo set_value('name') ?>" id="param_name" _autocheck="true" type="text" /></span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Danh mục cha:<span class="req">*</span></label>
                            <div class="formRight">
                                <option value="">Lựa chọn danh mục</option>
                                <select name="parent_id">
                                    <option value=""></option>
                                    <?php foreach($list_catalog as $row) :?>
                                    <option value="<?= $row->catalog_id ?>"><?= $row->name ?></option>
                                    <?php endforeach ;?>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Thứ tự hiển thị:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="sort_order" value="<?php echo set_value('sort_order') ?>" id="param_sort_order" _autocheck="true" type="text" /></span>
                                <span name="sort_order_autocheck" class="autocheck"></span>
                                <div name="sort_order_error" class="clear error"><?php echo form_error('sort_order'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Trạng thái:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <select name="active">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiện</option>
                                    </select>
                                </span>
                                <span name="sort_order_autocheck" class="autocheck"></span>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formSubmit">
                            <input type="submit" value="Thêm mới" class="redB" />
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
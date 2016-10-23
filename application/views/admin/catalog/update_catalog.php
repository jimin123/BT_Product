        <!-- head -->
        <?php $this->load->view('admin/catalog/head',$this->data); ?>
        <!-- Content -->
        <div class="wrapper">
            <div class="widget">
                <div class="title">
                    <h6>Cập nhật danh mục sản phẩm</h6>
                </div>
                <!-- Form -->
                <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <?php foreach($list_where as $row) :?>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên danh mục:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="name" value="<?= $row->name?>" id="param_name" _autocheck="true" type="text" /></span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('name'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Danh mục cha con:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="parent_id" value="<?= $row->parent_id; ?>" id="param_parent_id" _autocheck="true" type="text" /></span>
                                <span name="parent_id_autocheck" class="autocheck"></span>
                                <div name="parent_id_error" class="clear error"><?php echo form_error('parent_id'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Thứ tự hiển thị:</label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="sort_order" value="<?= $row->sort_order; ?>" id="param_sort_order" _autocheck="true" type="text" /></span>
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
                                        <option value="0" <?php echo ($row->active == 0) ? 'selected' : '' ?>>Ẩn</option>
                                        <option value="1" <?php echo ($row->active == 1) ? 'selected' : '' ?>>Hiện</option>
                                    </select>
                                </span>
                                <span name="sort_order_autocheck" class="autocheck"></span>
                                <div name="sort_order_error" class="clear error"><?php echo form_error('sort_order'); ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php endforeach ;?>

                        <div class="formSubmit">
                            <input type="submit" value="Cập nhật" class="redB" />
                        </div>
                    </fieldset>

                </form>
            </div>
        </div>
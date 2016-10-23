        <!-- head -->
        <?php $this->load->view('admin/catalog/head',$this->data)?>
        <!-- Content -->
        <div class="wrapper">
            <?php if(isset($message)) :?>
            <div class="nNote nInformation hideit">
            <p><strong>THÔNG BÁO: </strong><?= $message ?></p>
            <?php endif ;?>
            </div>
            <div class="widget">
                <div class="title">
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                    <h6>Danh sách danh mục sản phẩm</h6>
                    <div class="num f12">Tổng số: <b><?= $total ?></b></div>
                </div>
                <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll" style="text-align: center;">
                    <thead>
                
                        <tr>
                            <td style="width:10px;"><img src="<?= public_url('admin/images/icons/tableArrows.png') ?>" /></td>
                            <td style="width:80px;">Mã số</td>
                            <td>Tên danh mục</td>
                            <td>Danh mục cha con</td>
                            <td>Thứ tự hiển thị</td>
                            <td>Trạng thái</td>
                            <td style="width:100px;">Hành động</td>
                        </tr>

                    </thead>

                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class='pagination'>
                                    
                                 </div>
                            </td>
                        </tr>
                    </tfoot>
                    
                    <tbody>
                    
                        <!-- Filter -->
                            <?php foreach($list as $row) :?>
                            <tr>
                                <td><input type="checkbox" name="id[]" value="0" /></td>
                                <td class="textC"><?= $row->catalog_id ?></td>
                                <td><span title="panasonic" class="tipS">
                                    <?= $row->name ?></span></td>
                                 <td class="textC"><?= $row->parent_id ?></td>
                                <td class="textC"><?= $row->sort_order ?></td>
                                <td><?php if($row->active == 0){ echo 'Ẩn';}else{ echo 'Hiện';} ?></td>
                                <td class="option">
                                    <a href="<?= admin_url('catalog/update_catalog/'. $row->catalog_id) ?>" title="Chỉnh sửa" class="tipS ">
                                        <img src="<?= public_url('admin/images/icons/color/edit.png') ?>" />
                                    </a>
                                    
                                    <a href="<?= admin_url('catalog/delete_catalog/'. $row->catalog_id) ?>" title="Xóa" class="tipS verify_action" >
                                        <img src="<?= public_url('admin/images/icons/color/delete.png') ?>" />
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach ;?>
                    
                    </tbody>
                </table>
            </div>
        </div>
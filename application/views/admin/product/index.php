        <!-- head -->
        <?php $this->load->view('admin/product/head',$this->data); ?>
        <!-- Main content wrapper -->
        <div class="wrapper" id="main_product">
            <?php if(isset($message)) :?>
            <div class="nNote nInformation hideit">
                <p><strong>THÔNG BÁO: </strong><?= $message ?></p>
            </div>
            <?php endif ;?>
            <div class="widget">
                <div class="title">
                    <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
                    <h6>Danh sách sản phẩm</h6>
                    <div class="num f12">Số lượng: <b> <?= $total_rows ?> </b></div>
                </div>
                
    <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">
        <thead class="filter">
            <tr>
<td colspan="6">
<form class="list_filter form" action="" method="get">
<table cellpadding="0" cellspacing="0" width="80%">
    <tbody>
        <tr>
            <td class="label" style="width:40px;"><label for="filter_id">Mã số</label></td>
            <td class="item"><input name="id" value="" id="filter_id" type="text" style="width:55px;" /></td>
            <td class="label" style="width:40px;"><label for="filter_id">Tên</label></td>
            <td class="item" style="width:155px;" ><input name="name" value="" id="filter_iname" type="text" style="width:155px;" /></td>

            <td class="label" style="width:60px;"><label for="filter_status">Thể loại</label></td>
            <td class="item">
                <select name="catalog">
                    <option value=""></option>

                            <?php foreach($list_cate as $row) :?>
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
                                                </td>
                                                <td style='width:150px'>
                                                    <input type="submit" class="button blueB" value="Search" />
                                                </td>
                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td style="width:21px;"><img src="<?= public_url('admin') ?>/images/icons/tableArrows.png" /></td>
                            <td style="width:60px;">Mã số</td>
                            <td>Tên</td>
                            <td style="width:200px;">Giá</td>
                            <td style="width:120px;">Hành động</td>
                        </tr>
                    </thead>
                    
                    <tfoot class="auto_check_pages">
                        <tr>
                            <td colspan="7">
                                <div class='pagination'>
                                    <?= $this->pagination->create_links() ?>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                    
                    <tbody class="list_item">
                    <?php foreach($list_prod as $row) :?>
                        <tr class='row_9' style="text-align: center;">
                            <td><input type="checkbox" name="id[]" value="<?= $row->product_id ?>" /></td>
                    
                            <td class="textC"><?= $row->product_id ?></td>
                    
                            <td>
                                <div class="image_thumb">
                                    <img src="<?= base_url('uploads/'.$row->image_link)?>" height="50">
                                    <div class="clear"></div>
                                </div>
                    
                                <a href="product/view/9.html" class="tipS" title="" target="_blank">
                                <b><?= $row->name ?></b>
                                </a>
                                    
                            </td>
                    
                            <td class="textC"><?= (int)$row->price ?> VNĐ</td>
                    
                            <td class="option textC">
                                <a href="<?= admin_url('product/update_product/'.$row->product_id) ?>" title="Chỉnh sửa" class="tipS">
                                    <img src="<?= public_url('admin') ?>/images/icons/color/edit.png" />
                                </a>
                        
                                <a href="<?= admin_url('product/delete_product/'.$row->product_id) ?>" title="Xóa" class="tipS verify_action" >
                                    <img src="<?= public_url('admin') ?>/images/icons/color/delete.png" />
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ;?>
                    </tbody>
                </table>
            </div>
        </div>
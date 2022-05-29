<?php $CI =& get_instance(); ?>

<div>

    <table class="table">
      <tr>
        <th width="100" class="text-center">ItemType</th>
        <th>Title</th>
        <th width="100" class="text-center">Flavour</th>
        <th width="100" class="text-center">Status</th>
        <th width="160" class="text-center">Action</th>
      </tr>

      <?php if(!empty($itemtypes)) {?>
          <?php foreach ($itemtypes as $itemRow) {?>
              <tr>
                <td class="text-center"><?php echo $itemRow['item_type'];?></td>
                <td><?php echo $itemRow['title'];?></td>
                <td class="text-center"><?php echo $itemRow['flavour'];?></td>

                <td class="text-center">
                    <?php if($itemRow['visibility'] == 1) {?>
                      <span class="badge badge-success">Active</span>
                    <?php } else { ?>
                      <span class="badge badge-danger">Block</span>
                    <?php } ?>
                </td>

                <td class="text-center">
                    <a href="<?php echo base_url().$CI->module_url_edit.'/'.$itemRow['id']; ?>" class="btn btn-primary btn-sm">
                      <i class="far fa-edit"></i> Edit
                    </a>
                    <a href="javascript:void(0);" onclick="deleteItemType('<?php echo $itemRow['id'] ?>')" class="btn btn-danger btn-sm">
                      <i class="far fa-trash-alt"></i> Delete
                    </a>
                </td>
              </tr>
          <?php } ?>
      <?php } else { ?>
        <tr>
          <td colspan="4">Record not found</td>
        </tr>
      <?php } ?>
    </table>
</div>

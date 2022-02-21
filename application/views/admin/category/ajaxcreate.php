<div class="row">

    <div class="col-sm-4 mb-3">
        <label for="item_type" class="formbuilder-number-label">Item Type</label>
        <select class="form-control" name="item_type" id="item_type">
            <option value="0">Select Item Type</option>
            <?php
                if(!empty($itemTypes)){
                    foreach ($itemTypes as $item) {
                        $selected = ($itemTypeSelected == $item['item_type']) ? true : false;
                        ?>
                         <option <?php echo set_select('item_type', $item['item_type'], $selected); ?> value="<?php echo $item['item_type'];?>"><?php echo $item['title'];?></option>
                         <?php
                    }
                }
             ?>
        </select>
    </div>
    <div class="col-sm-4 mb-3">
        <label for="ranking" class="formbuilder-number-label">Ranking</label>
        <input type="number" placeholder="Enter Ranking" class="form-control" name="ranking" access="false" value="0" id="ranking">
    </div>
</div>

 <div class="formbuilder-text form-group field-title">
     <label for="title" class="formbuilder-text-label">Category Name <span style="color:red">*</span></label>
     <input type="text" placeholder="Enter Category Name" class="form-control <?php echo (form_error('title') != "") ? 'is-invalid' : ''; ?>" name="title" access="false" id="title">
 </div>

 <div class="row">
      <div class="col-sm-6 mb-3">
          <label for="image" class="formbuilder-file-label">Image</label>
          <input type="file" class="form-control" name="image" access="false" multiple="false" id="image">
      </div>
      <div class="col-sm-6 mb-3">
          <label for="radio-group-1642854908703" class="formbuilder-radio-group-label">Visibility</label>
          <div class="radio-group row">
              <div class="ml-3">
                  <input name="visibility"  class="radio_active" value="1" type="radio" checked="checked">
                  <label for="radio_active">Active</label>
              </div>
              <div class="ml-3">
                  <input name="visibility"  class="radio-deactive" value="2" type="radio" >
                  <label for="radio-deactive">Deactive</label>
              </div>
          </div>
      </div>
 </div>


 <div class="row">
     <div class="col-sm-6 mb-3">
         <label for="json_data" class="formbuilder-text-label">Json Data</label>
         <textarea type="textarea" rows="1" placeholder="Enter Json Data" class="form-control" name="json_data" access="false" id="json_data"></textarea>
     </div>
     <div class="col-sm-6 mb-3">
         <label for="other_property" class="formbuilder-text-label">Other Property</label>
         <textarea type="textarea" rows="1" placeholder="Enter Other Property" class="form-control" name="other_property" access="false" id="other_property"></textarea>
     </div>
 </div>

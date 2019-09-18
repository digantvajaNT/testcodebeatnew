<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row option" id="item_<?php echo $iListId;?>">
    <input type="hidden" name="option_img_json[]" id="option_img_json<?php echo $iListId;?>"/>
    <div class="col-md-3">
        <div class="form-group">
            <label>Option Title</label>
            <input type="text" name="tb_opttitle[]" style="width: 100%;" id="tb_opttitle"  class="form-control"/>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Description</label>
            <textarea name="tb_optdesc[]" id="tb_optdesc<?php echo $iListId;?>" class="editor form-control"></textarea>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label></label>
            <div id="opUploader<?php echo $iListId;?>" class="feature_upload">Upload</div>
        </div>
    </div>
    <div class="col-md-1">
        <a class="btn btn-xs btn-danger" href="javascript:void(0);" onclick="removeRow('item_<?php echo $iListId;?>')"><i class="fa fa-minus"></i> </a>
    </div>
</div>


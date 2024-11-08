<form id="create{{ isset($enableParentCategory) && $enableParentCategory? 'Subcategory': '' }}Form" action="{{ url('series/categories/create') }}" method="post" enctype="multipart/form-data">
    @csrf
    @if (isset($enableParentCategory) && $enableParentCategory)
        <input type="hidden" name="showCreateSubcategoryFormModal" value="1">
    @else
        <input type="hidden" name="showCreateFormModal" value="1">
    @endif
   

    <div class="row">
                    
                   
                    
                    <div class="col-md-12">
                    
                    	
                    	<div class="details">
                            <h4><b>Category Name</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Name</b></label>
                                    <input class="form-control" name="cat_name" placeholder="Type Category Name" required="required" />
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Description</b></label>
                                    <input class="form-control" name="cat_descr" placeholder="Type Category Description"  />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="details"
                            <h4><b>Allowed Portals</b></h4>
                           
                            <div class="row form-switch">
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <div>Yekbun
                                            <input class="form-check-input closetogglebtn toggl-input" name="yekbun" type="checkbox">
                                          </div>
                                        </div>
                                   
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="yahala">Yahala</label>
                                            <input class="form-check-input closetogglebtn toggl-input" checked="checked" id="yahala" name="yahala" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="facebook">Facebook</label>
                                            <input class="form-check-input closetogglebtn toggl-input" checked="checked" id="facebook" name="facebook" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="tiktok">TikTok</label>
                                            <input class="form-check-input closetogglebtn toggl-input" id="tiktok" name="tiktok" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="insta">Instagram</label>
                                            <input class="form-check-input closetogglebtn toggl-input" checked="checked" id="insta" name="insta" type="checkbox">
                                          
                                        </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="bordered ">
                                          <label for="twitter">Twitter</label>
                                            <input class="form-check-input closetogglebtn toggl-input" id="twitter" name="twitter" type="checkbox">
                                          
                                        </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                       
                    
                    </div>
                    
                    
                    
                    
                   
                    
                   <!-- row -->
                    </div>
               


</form>
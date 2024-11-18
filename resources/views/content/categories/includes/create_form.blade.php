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
                        
                
                       
                    
                    </div>
                    
                    
                    
                    
                   
                    
                   <!-- row -->
                    </div>
               


</form>
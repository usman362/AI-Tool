<form id="create{{ isset($enableParentCategory) && $enableParentCategory? 'Subcategory': '' }}Form" action="{{ route('sounds.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
                    <div class="col-md-12">
                    	<div class="details">
                            <h4><b>Category Name</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Category Name</b></label>
                                    <input class="form-control" name="cat_name" placeholder="Type Category Name" required="required" />
                                </div>
                            `</div>
                            
                        </div>

                        <div class="details">
                            <h4><b>Description</b></h4>
                            
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Description</b></label>
                                    <input class="form-control" name="cat_descr" placeholder="Type Description"  />
                                </div>
                            `</div>
                            
                        </div>
                        
                        
                    </div>
                    
                   <!-- row -->
                    </div>
               
</form>
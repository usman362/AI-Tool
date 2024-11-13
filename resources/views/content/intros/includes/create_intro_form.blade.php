<form id="create{{ isset($enableParentCategory) && $enableParentCategory? 'Subcategory': '' }}Form" action="{{ url('intros-manage') }}" method="post" enctype="multipart/form-data">
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
                            </div>

                            
                            
                        </div>

                        <div class="details">
                            <div class="row">
                                <div class="col-md-12">
                                	<label><b>Sharing Options</b></label>
                                    <div>Who can see the Post </div>
                                    <input type="file" id="fileInput" name="file" class="custom-file-input" accept=".mp4" required>
                                    
                                    <div class="col-md-6 text-center custom-btn-div">
                                        <label for="fileInput" class="custom-button">
                                            Upload Files
                                            <div>PDF, JPG, PNG</div></label>
                                        
                                    </div>
                                    

                                                        <!-- Display file name -->
                                                        <p id="fileName" class="text-center">No file chosen</p>
                                </div>
                            </div>

                        </div>
                        
                        
                        
                    </div>
                    
                   <!-- row -->
                    </div>
              
</form>
<style>	
	.generate:hover{
		background: #c0c0c0;
	}
	.avatar_details{
		background: #f3f3f3;
	  	padding: 10px;
	  	border-radius: 10px;
	  	padding-bottom: 10px;
	  	margin-top: 5px;
	}
	.w-px-40{
		height:40px !important;
	} 
	.upper{
		text-transform:uppercase;
	}
	.text-rigth{
		float:right;
	}
	.av_image{
		width:100%;
		border-radius:5px;
	}
	.card{
		padding-top:10px;
		padding-bottom:20px;
	}
	.heading {
		font-weight:bold;
		font-size:18px;
		color:#1c274c;
	}
	.details{
		margin-bottom:10px;
	}
	.dashhr{
		width: 60%;
		  text-align: center;
		  margin: auto;
		  color:#fff !important;
		  border-top: 4px solid;
	}
	.postshr{
		margin-bottom:20px !important;
		  text-align: center;
		  margin: auto;
		  color:#fff !important;
		  border-top: 4px solid;
	}
	.del_feed{
		cursor:pointer;
	}
	.feeds_div{
		margin:auto;
		
	}
	.feeds_container{
		padding:10px;
	}
	.w-px-30{
		height:30px;
		width:30px;
		float:left;
		margin-right:5px;
	}
	.post_avatar{
		width:100px;
		float:left;
		font-size:11px;
		
	}
	.post_time{
		float:right;
		color:#44Af74;
		font-weight:bold;	
	}

	.post_schedule .post_time{
		width:calc(100% - 140px);
		margin-top:10px;
		font-size:10px;
		text-align:right;
	}

	.heading_post{
		font-weight:bold;
	}
	.post_img{
		position:relative;
		cursor:pointer;
	}
	.overlay {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		height: 40px; /* Adjust the height of the overlay */
		background: rgba(0, 0, 0, 0.4); /* Transparent black */
		margin-bottom: 5px;
		box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.7);
	}
	.post_img img{
		width:100%;
		border-radius:5px;
        border-bottom-right-radius:0px;
        border-bottom-left-radius:0px;
	}
	.feeds{
		background:#fff;
		padding:5px;
		border-radius:10px;
	}
	.folors{
		margin-top:10px;
	}
	.fol_img{
		height:30px;
		width:30px;
		border-radius:50%;
		position: relative;
  margin-left: -15px;
	}
	.z-100{
		z-index:100;
	}
	.z-90{
		z-index:90;
	}
	.z-80{
		z-index:80;
	}
	.z-70{
		z-index:70;
	}
	.z-60{
		z-index:60;
	}
	.z-50{
		z-index:50;
	}
	.z-40{
		z-index:40;
	}
	.z-30{
		z-index:30;
	}
	
	.postbox{
		background:#fff;
		padding:5px;
		border-radius:5px;
		margin-bottom: 15px;
	}
	.article_txt{
		width:100%;
		font-size:11px;
	}
	.artilce_title{
		float:left;
		width:60%;
		font-size:13px;
	}
	.article_time{
		
		float:right;
		text-align:right;
		font-size:10px;	
	}
	.article_btn{
		width:50% !important;
	}
	.article_details{
		background:#f3f3f3;
		border-radius:5px;
		margin-top: -12px;
		padding:5px;
	}
	.btn-share{
		font-size:11px;
		padding: 1px 8px;
	}
	.btn-share-like{
		background:#44Af74;
		
	}
	.btn-share-denied{
		
		background:#F2555B;
	}
	.btn-share-like span{
		font-size: 18px;
  		margin-right: 5px;
  		margin-top: -2px;
	}
	.btn-share-denied span{
		font-size: 18px;
  		margin-left: 5px;
  		margin-top: -2px;
	}
	.articles_btns{
		text-align:center;
	}
	.emojies{
		background: #f3f3f3;
		  width: 70px;
		  border-radius: 5px;
		  float:left;
		  text-align:center;
	}
	.margin-t-10{
		margin-top:10px;
	}
	.shares_options{
		background: #f3f3f3;
		border-radius: 5px;
		width:calc(100% - 90px);
		margin-left:20px;
		float:right;
		text-align:center;
	}
	.shareimg{
		width:100%;
	}
	.show_details{
		cursor:pointer;
	}
    .post-innter{
        border-radius:10px;
    }
    .play-bar{
        background:#000;
        height:30px;
        padding:5px;
        color:#fff;
        font-size:12px;
    }
    .play-btn{
        float:left;
		padding-left: 5px;
  		margin-left: 10px;
		color: #fff;
		background: #050607;
		text-align: center;
		font-size: 20px;
		border-radius: 50%;
		height: 35px;
  		width: 35px;
		  background: rgba(0, 0, 0, 0.7);
		  z-index:1;
		  position:relative;
		  cursor:pointer;
    }
	.play-btn .menu-icon{
		font-size:30px;
		font-weight: bold;
	}
	.delbtn{
		cursor: pointer;
  z-index: 1;
  position: relative;
	}
	.bot-div{
		position: absolute;
  bottom: 15px;
  color: #fff;
  width: 100%;
  
	}
    .play-time{
        float:right;
		color: #fff;
		margin-right: 10px;
		margin-top: 15px;
		font-size: 11px;
		z-index: 1;
  		position: relative;
    }
	.selection-box{
		padding:15px !important;
		text-align:center;
		max-width:260px;
		margin:auto;
	}
	.m-10{
		margin-top:5px;
		margin-bottom:5px;
	}
	.m-15{
		margin-top:15px;
		margin-bottom:15px;
	}
	.slider-div{
		padding:20px !important;
		padding-top:5px !important;
		background:#fff !important;
	}
	.popped2{
		top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
	}
	.popped video {
            max-width: 100%;
            max-height: 75vh;
			
            object-fit: contains; /* Ensures the video scales without distortion */
        }
	.option-icon{
		font-size:70px !important;
	}
    .description{
        height:70px;
    }
    .play-span{
        padding: 2px;
        background: #fff;
        margin-left: 5px;
        color: #000;
        border-radius: 5px;
    }
	.generate{
		float:right;
		margin:5px;
		background:#c0c0c0;
		border-color:#c0c0c0;
	}
	.regenerate{
		margin:15px;
		background:#c0c0c0;
		border-color:#c0c0c0;
	}
	.card{
		padding:20px;
	}
	.details{
		background: #EBEBEF;
	  	padding: 10px;
	  	border-radius: 10px;
	  	padding-bottom: 10px;
	  	margin-top: 10px;
		margin-bottom:10px;
	}
	.bordered{
		background: #fff;
		  padding: 8px;
		  border-radius: 10px;
		  margin-top:5px;
	}
	.details b{
		color:#1c274c !important;
	}
	.bordered input{
		float: right;
  		margin-top: 5px;
	}
	.form-check-input{
		float:right !important;
	}
	.form-switch{
		padding-left:0px !important;
	}
	.righ-check-option{
		float:right;
		width:100px;
	}
	
	.source_list{
		width:calc(100% - 50px);
		float:left;
		margin-bottom:10px;
	}
	.sources{
		
	}
	.source_btn{
		width:40px;
		margin-left: 10px;
  		margin-top: 5px;
		background:#DDDDDD;
	}
	#avatar_image{
		height:120px;
		border-radius:50%;
		width:120px;
		cursor:pointer;
	}
	#uploadimage{
		display:none;
	}
	.removebtn{
		position: absolute;
		  margin-top: 15px;
		  margin-right: 10px;
		  margin-left: -30px;
		  height: 30px;
		  width: 30px;
		  max-width: 30px;
		  padding: 5px;
		  display:none;
	}
	.m-t-10{
		margin-top:10px !important;
	}
	.bg-font{
		font-size:50px !important;
	}
	.md-font{
		font-size:30px !important;
	}
	.bg-brown{
		background:#F2F2F2 !important;
	}
	.toggl-input{
		background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
	}
	
	.art-image img{
		border-radius:10px;
	}
	

	.art-image {
		position: relative;
		display: inline-block;
	}

.art-image img {
    display: block;
    width: 100%;
    height: auto;
	cursor:pointer;
}

.art-image::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 25%; /* Adjust as needed */
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
    pointer-events: none; /* Ensures clicks pass through this overlay */
	border-radius: 10px;
}
.bordered h4{
	font-size: 1.175rem !important;
}
.forfile{
	cursor:pointer;
}
#imagePreviewContainer{
	margin-top:10px;
	margin-bottom:10px;
	
}
#imagePreviewContainer img{
	width:80px;
	margin:10px;
	height:80px;
	object-fit: cover;
	border-radius: 10px;
}
.image-preview-container{
	position:relative;
	width:23%;
	padding:1%;
	float:left;
}
.image-preview-main{
	position:relative;
}
.remove-btn {
      position: absolute;
      top: 5px;
      right: 5px;
      background-color: #ED1C24;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 14px;
      padding: 2px 6px;
      cursor: pointer;
	  height: 25px;
  width: 25px;
    }

	/* Style the custom button */
.custom-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ECECEC;
    color: #1c274c !important;
    font-size: 16px;
    
    border-radius: 5px;
    text-align: center;
    border: dashed #8c8c8c 4px;
    width: 250px;
    margin-top:10px;
    z-index: 1;
  position: relative;
  cursor: pointer !important;
  
}
#fileName{
    margin-top:5px;
}
#own_image_div{
	display:none;
}
.select_ai_visual{
	cursor:pointer;
}
.image-preview-container{
	cursor:pointer;
}

.custom-button:hover {
    background-color: #ECECEC;
}
.custom-button div{
	color:#84899C;
}
.custom-button:active {
    background-color: #ECECEC;
}
.custom-btn-div{
    margin:auto;
    cursor: pointer;
}

	.upload-btn{
		cursor:pointer;
	}
	.img-active{
		border:solid 5px #696CFF;
	}
    .remove-btn:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

	.audio-preview-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
	  margin-top:10px;
    }

    /* Style for individual audio preview container */
    .audio-preview {
      position: relative;
      width: 100%; /* Width for audio player container */
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: #f9f9f9;
    }
	audio{
		width:100%;
	}


.art-txt {
    position: absolute;
    bottom: 10px; /* Adjust for positioning */
    left: 10px;
    color: #fff;
    font-size: 0.6em;
    font-weight: bold;
    padding: 5px;
	z-index:1;
	cursor:pointer;
}
.m-b-20{
	margin-bottom:20px;
}
.link_section{
	display:none;
}


.m-t-10{
		margin-top:10px;
	}
	.card{
		padding:20px;
	}
	.details{
		background: #F5F5F5;
	  	padding: 5px;
	  	border-radius: 10px;
	  	padding-bottom: 10px;
	  	margin-top: 10px;
		margin-bottom:10px;
	}
	.bordered{
		background: #fff;
		  padding: 8px;
		  border-radius: 10px;
		  margin-top:5px;
	}
	.details b{
		color:#1c274c !important;
	}
	.bordered input{
		float: right;
  		margin-top: 5px;
	}
	.form-check-input{
		float:right !important;
	}
	.form-switch{
		padding-left:0px !important;
	}
	.righ-check-option{
		float:right;
		width:100px;
	}
	
	.source_list{
		width:calc(100% - 50px);
		float:left;
		margin-bottom:10px;
	}
	.sources{
		
	}
	.source_btn{
		width:40px;
		margin-left: 10px;
  		margin-top: 5px;
		background:#DDDDDD;
	}
	#avatar_image{
		height:120px;
		border-radius:50%;
		width:120px;
		cursor:pointer;
	}
	#uploadimage{
		display:none;
	}
	.removebtn{
		position: absolute;
		  margin-top: 15px;
		  margin-right: 10px;
		  margin-left: -30px;
		  height: 30px;
		  width: 30px;
		  max-width: 30px;
		  padding: 5px;
		  display:none;
	}

.modal-content {
    position: relative;
    max-height: 80%; /* Optional: limits the height of the video */
}

/* Video styling */

.download_img, .btn-sm{
	z-index:1;
	position:relative;
}


.select_ai_music{
	cursor:pointer;
}
#own_music{
	display:none;
}

.play_div{
	position: absolute;
  top: 50%;
  left: 50%;
  font-size: 14px;
  z-index: 1;
  cursor: pointer;
  text-align: center;
  transform: translate(-50%, -50%);
  opacity: 0.8;
  color: #fff;
  width: 25px;
  background: #45241F;
  border-radius: 50%;
  height: 25px;
  
}
.play_div i{
	font-size:20px;
}


/* audio player started */
/*
.audio-player {
  text-align: center;
  position: relative;
}

.audio-image {
  width: 200px;
  height: 200px;
  object-fit: cover;
  margin-bottom: 20px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.audio-image:hover {
  transform: scale(1.1);
}

.play-pause-btn {
  font-size: 18px;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

.play-pause-btn:hover {
  background-color: #45a049;
}

.play-pause-btn:focus {
  outline: none;
}

.track-list {
  margin-top: 20px;
}

.track-btn {
  font-size: 16px;
  padding: 8px 16px;
  background-color: #007BFF;
  color: white;
  border: none;
  border-radius: 5px;
  margin: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.track-btn:hover {
  background-color: #0056b3;
}
  */
  /*audio player ended */

</style>

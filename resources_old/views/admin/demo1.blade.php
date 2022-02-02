<html>
<head>
	<title>
	</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style type="text/css">
	.container{
		width: 100%;
		height: 100%;
		
	}
	
.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
 
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}.card{
	margin-top: 20px;
}
#confirm{
	padding:15px;
	background-color:green;
	color:white;
		margin-top: 15px;
		border-radius: 40px;
		text-decoration: none;
}
#confirm:hover{
	background-color: 	#009E60;
}
#mainpart{
	margin-left: 40%;
	margin-bottom: 100px;
}
#cancel{
	padding:15px;
	background-color:red;
	color:white;
	margin-top: 15px;
	border-radius: 40px;
	text-decoration: none;

}
#cancel:hover{
	background-color: 	#AA4A44;
}
.buttons{
    margin-left: -21px;

}

.radio {
  margin: 0.5rem;
}
.radio input[type=radio] {
  position: absolute;
  opacity: 0;
}
.radio input[type=radio] + .radio-label:before {
  content: "";
  background: #f4f4f4;
  border-radius: 100%;
  border: 1px solid #b4b4b4;
  display: inline-block;
  width: 1.4em;
  height: 1.4em;
  position: relative;
  top: -0.2em;
  margin-right: 1em;
  vertical-align: top;
  cursor: pointer;
  text-align: center;
  transition: all 250ms ease;
}
.radio input[type=radio]:checked + .radio-label:before {
  background-color:#28a745;
  box-shadow: inset 0 0 0 4px #f4f4f4;
}
.radio input[type=radio]:focus + .radio-label:before {
  outline: none;
  border-color: #3197EE;
}
.radio input[type=radio]:disabled + .radio-label:before {
  box-shadow: inset 0 0 0 4px #f4f4f4;
  border-color: #b4b4b4;
  background: #b4b4b4;
}
.radio input[type=radio] + .radio-label:empty:before {
  margin-right: 0;
}
@media (min-width: 576px) { 
.card{
	margin-top: 70px;
	margin-left: -120px;
 }
 
}

</style>
</head>
<body>
	<div class="container">

		<div class="card">
			<div class="card-body">

<div id="popup1" class="overlay">
	<div id="mainpart">
		<h4>Hello Vendor Name</h4>

			<h5>Are You Sure You want to </h5>
			<br>
			<div class="buttons">
			<a href="#"  id="confirm">Confirm Booking</a>
			<a href="#" id="cancel" data-toggle="modal" data-target="#myModal">Cancel Booking</a>
		</div>
	</div>

</div>

			</div>

		</div>

	</div>
	 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
        	 <h4 class="modal-title">
          Reason
      </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <div class="radio">
    <input id="radio-1" name="radio" type="radio">
    <label for="radio-1" class="radio-label">Reason 1</label>
  </div>
  <div class="radio">
    <input id="radio-2" name="radio" type="radio">
    <label for="radio-2" class="radio-label">Reason 2</label>
  </div>

  <div class="radio">
    <input id="radio-3" name="radio" type="radio">
    <label for="radio-3" class="radio-label">Reason 3</label>
  </div>

    <div class="radio">
    <input id="radio-4" name="radio" type="radio">
    <label for="radio-4" class="radio-label">Reason 4</label>
  </div>

    <div class="radio">
    <input id="radio-5" name="radio" type="radio" value="reason4">
    <label for="radio-5" class="radio-label">Reason 5</label>
  </div>

    <div class="radio">
    <input id="radio-6" name="radio" type="radio" id="radio6" value="other">
    <label for="radio-6" class="radio-label">Other</label>
    <br>
    <input type="text" class="form-control" name="otherreason" id="otherreason"  style="display: none;">
  </div>
        </div>
        <div class="modal-footer">
        	  <a href="#" class="btn btn-danger cancel">Cancel Booking</a>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cancel").on('click',function(){
			$("#myModal").modal();
		});
   		$('input[type=radio][name=radio]').change(function() {
   		
    if (this.value == 'other') {
        //alert("Allot Thai Gayo Bhai");
        $("#otherreason").css('display','block');
    }
    else{
    	$("#otherreason").val("");
       $("#otherreason").css('display','none');
    }
});
});
</script>
</body>
</html>
<?php
session_start(); 
?>

<!DOCTYPE html>
<html>
<head>

<script src="../jquery/jquery-2.2.1.js" type="text/javascript" charset="utf-8"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../jquery/bootstrap.min.js"></script>
<style>
.modal {
}
.vertical-alignment-helper {
display:table;
height: 100%;
width: 100%;
}
.vertical-align-center {
	/* To center vertically */
display: table-cell;
	 vertical-align: middle;
}
.modal-content {
	/* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
width:inherit;
height:inherit;
       /* To center horizontally */
margin: 0 auto;
}
</style>
<style>
.error {color: #FF0000;}

input.iw {
width: 40%;
height: 10%
}
input.iw[placeholder]
{
	font-family: "Times New Roman", Times, serif;
	line-height:30px;
	font-size:32px;
}

</style>

<script type="text/javascript">


$(document).ready(function(){

		function showComment(){
		$.ajax({
type:"post",
url:"show.php",
data:"action=showcomment",
success:function(data){
console.log(data);

$("#comment").html(data);

}
});
		}

		showComment();


		$("#bu").click(function(){

			alert("clicked");
			var msg=$("#msg").val();

			$.ajax({
type:"post",
url:"db_post_msg.php",
data:"msg="+msg+"&action=addcomment",
success:function(data){
$("#comment").prepend(data);

}

});
			$("#msg").val('');
			});



setInterval(function(){

		$.ajax({
type:"post",
url:"show.php",
data:"action=addcomment2",
success:function(data){
console.log($(data).filter('#comm').html());

$("#info").prepend($(data).filter('#comm').html());
//$("#p_118").append("<li><b></b> : man</li></div><li>");

}
});




		}, 3000);




});

/*
   $(document).delegate(".com_bu","click",function(e){

   var p_id=$("#value").val();
   var msg=$("#comment_msg").val();
   alert(p_id);



   });
 */


function apply_post(id){

	var p_id=id;
	var msg="#comment_"+id;
	var msg1=$(msg).val();                   

	$.ajax({
type:"post",
url:"db_post_msg.php",
data:"msg1="+msg1+"&p_id="+p_id+"&action=addcomment2",
success:function(data){
console.log(data);

}


}).done(function() { //use this

	alert("DONE!");
	});
$("#msg").val('');
}



</script>


<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) 
{
	include 'db_login.php';
}

include 'db_check_submit.php';

?>

</head>
<body>
<div id=info></div>

<?php include 'textarea.php' ; ?>



<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#secondModal">Comment</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="vertical-alignment-helper">
<div class="modal-dialog vertical-align-center">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

</button>
<h4 class="modal-title" id="myModalLabel">Modal title</h4>

</div>
<div class="modal-body">


<?php include 'signup.php' ; ?>


</div>

</div>
</div>
</div>
</div>


<!-- second Modal -->
<?php
if(isset($_SESSION["email"])){  echo $_SESSION['email'];?>

	inside html  we will  write comment  code.
		<?php } else{ ?>

			<div class="modal fade" id="secondModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="vertical-alignment-helper">
				<div class="modal-dialog vertical-align-center">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

				</button>
				<h4 class="modal-title" id="myModalLabel">Modal title</h4>

				</div>
				<div class="modal-body"> 
				<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="form-group" >
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email" name=email>
				</div>
				<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name=pass>
				</div>
				<div class="checkbox">
				<label><input type="checkbox"> Remember me</label>
				</div>
				<input type="submit" class="btn btn-default" name=login value=login></button>

				</form>
				<button class="btn btn-primary btn-lg" data-toggle="modal"  data-dismiss="modal" data-target="#myModal">signup</button>
				</div>

				</div>
				</div>
				</div>
				</div>
				<?php } ?>

				</body>
				</html>

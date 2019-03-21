<!DOCTYPE html>
<html>
<head>
	<title>Reucuperar Conta</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
</head>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	.container{
			width: 100vw;
			height: 100vh;
			background-image: url(../img/background-login.png);
			display: flex;
			flex-direction: column;
			justify-content: center;;
			align-items: center;
		}
	.box{
			width: 400px;
			height: 380px;
			background: transparent;


		}
	.box-recovery input[type="email"]{
			width: 295px;
			height:48px;
			border: 1px solid #14f5fb;
			background: transparent;
			color: #fff;
			padding-left: 5px;

		}
			.box-recovery button{
			width: 303px;
			height:48px;
			border: 1px solid #14f5fb;
			background: #082e2f;
			margin-top: 5px;
			cursor: pointer;

		}
		.box-recovery p{
			color: #fff;
			margin-bottom: 5px;
			margin-left: 17%;
		}
</style>
<body>
<div class="container">
		<div class="box">
			<div class="tabela">
				<p style="color: green">R$1,00 = 2 Créditos</p>
			</div>
			<form  action="api.php" method="POST" name="form_logar" onsubmit="return false">
				<div class="box-recovery">
					<p>Compre créditos aqui</p>
					<input type="email" name="quant" id="quant" placeholder="R$1,00">
					<button type="submit" name="recuperar" id="recuperar">Recuperar</button>
					<input type="hidden" name="login">
				</div>

			</form>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#recuperar").click(function(){
			var quant = $("#quant").val();
            $.ajax({
                url: 'response.php',
                type: 'GET',
                data: '	quant=' + quant,
                beforeSend: function () {
                    alert("Enviando...");
                },
                success: function (data) {
                    alert(data);
                }
            });
		});	

	});
</script>
</body>
</html>
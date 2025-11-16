<!DOCTYPE html>
<html>
<head>
	<title>BUMDES Kotakan | Halaman Login</title>
	<!--Made with love by Mutiullah Samim -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('') }}client/assets/img/partner/bumdes-logo.png">

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}admin/login/styles.css">

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Login</h3>
				</div>
				<div class="card-body">
					<form action="{{ route('admin.login.process') }}" method="post">
						@csrf
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="username" name="username">
							
						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" placeholder="password" name="password">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" class="btn float-right login_btn">
						</div>
					</form>
				</div>
				<div class="card-footer">
					<a href="{{ route('client.home') }}" class="btn float-left login_btn">Kembali</a>
				</div>
			</div>
		</div>
	</div>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script>
        let pesan = "{{session()->get("message")}}";
        let type = "{{session()->get("typeError")}}";
        
        function notification( type, message ) {
            toastr.options.positionClass = 'toast-top-right';
            if( type == 'success' ) {
                toastr.success(message,'<i>Success</i>');
            } else if( type == 'error' ) {
                toastr.error(message,'Error');
            } else if( type == 'warning' ) {
                toastr.warning(message,'Warning');
            } else {
                toastr.info(message,'Information');
            }   
        }
        if (pesan) {
            notification(type,pesan);
        }
    </script>

</body>
</html>
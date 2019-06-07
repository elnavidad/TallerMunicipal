<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8" />
		<title app-name></title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Titillium Web:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>
		<meta http-equiv="X-UA-Compatible" content="IE=11" />
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    	<link href="assets/theme/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="assets/theme/media/img/logo/favicon.ico" />
	</head>

	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="assets/theme/media/img/logo/logo-vert-invert.png" style="width: 40%">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">Inicio de Sesion</h3>
							</div>
							<form class="m-login__form m-form" id="loginForm">
								{{ csrf_field() }}
								<div class="form-group m-form__group">
									<div class="input-group m-input-group m-input-group--pill">
										<input type="text" tabindex="1" class="form-control m-input" style="margin-top: 0; border-top-right-radius: 0; border-bottom-right-radius: 0;" placeholder="Usuario" name="username" id="username_input" autocomplete="off" aria-describedby="basic-addon2">
										<div class="input-group-append">
											<span class="input-group-text" id="basic-addon2" style="border: 0; padding:0" tabindex="3">
												<select name="company" class="form-control m-input" id="company_input" style="padding:0; margin:0">
													<option value="@nogalessonora.gob.mx">@nogalessonora.gob.mx</option>
													<option value="@oomapasnogales.gob.mx">@oomapasnogales.gob.mx</option>
													<option value="@miprepanogales.mx">@miprepanogales.mx</option>
													<option value="@difnogales.org.mx">@difnogales.org.mx</option>
												</select>
											</span>
										</div>
									</div>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" tabindex="2" type="password" placeholder="Contraseña" name="password"id="password_input" >
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox  m-checkbox--brand">
											<input type="checkbox" name="remember" tabindex="4"> Recordar
											<span></span>
										</label>
									</div>
								</div>
								<div class="m-login__form-action">
									<button type="submit" class="btn btn-brand m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Iniciar Sesión</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/theme/base/scripts.bundle.js" type="text/javascript"></script>
		<script src="js/common.js" type="text/javascript"></script>
		<script src="js/login.js" type="text/javascript"></script>
	</body>
</html>
var Login=function(){function n(){var n={url:"login",success:r,error:o,rules:{username:{required:!0},password:{required:!0}}};Common.validator($("#loginForm"),n)}function r(){window.location.replace("/admin/")}function o(n){Common.error("Error!",n.responseJSON.msg)}return{init:function(){$("[app-name]").text("Iniciar Sesión"),n()}}}();$(document).ready(function(){Login.init()});

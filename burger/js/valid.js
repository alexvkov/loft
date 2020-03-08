$(function(){
	var name = $('.form__name').val();
	var phone = $('.form__phone').val();
	var email = $('.form__email').val();
	var street = $('.form__street').val();
	var home = $('.form__home').val();
	var apartment = $('.form__korp').val();
	var flat = $('.form__flat').val();
	var floor = $('.form__floor').val();
	var comment = $('.form__comment').val();
	var change = $('.form__change').val();
	var card = $('.form__card').val();
	var call = $('.form__call').val();


	function validName(){
	    var testName = $('.form__name').val();
	    var re = /^^\s*[а-яА-яa-zA-z]+(?:\s+[а-яА-яa-zA-z]+){0,2}\s*$/;
	    var valid = testName.match(re);
	    if (valid){
	        return true;
	    }
	    else{
	       $('.form__name').val('').addClass('form__error').attr('placeholder','Пожалуйста введите имя!');
	       return false;
	    }
	}

    function ValidPhone() {
        if ($('.form__phone').val()==0) {
			$('.form__phone').val('').addClass('form__error').attr('placeholder','Пожалуйста введите улицу!');
			return false;
		}else{
			return true;
		}
    }

	function validEmail() {
	    var testEmail = $('.form__email').val();
	    var re = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	    var valid = testEmail.match(re);
	    if (valid){
	        return true;
	    }
	    else{
	       $('.form__email').val('').addClass('form__error').attr('placeholder','Email введён некорректно!');
	       return false;
	    }
	}

	function validStreet(){
		if ($('.form__street').val()==0) {
			$('.form__street').val('').addClass('form__error').attr('placeholder','Пожалуйста введите улицу!');
			return false;
		}else{
			return true;
		}
	}

	function validHome(){
		if ($('.form__home').val()==0) {
			$('.form__home').val('').addClass('form__error').attr('placeholder','Error!');
			return false;
		}else{
			return true;
		}
	}

	function validPayment(){
		if(!$('.form__change').prop("checked") && !$('.form__card').prop("checked")){
			$('.form__pay').addClass('text_error');
			return false
		}else {
			$('.form__pay').removeClass('text_error');
			return true;
		}
	}


	$('.form__btn').click(function(e) {
		e.preventDefault();
		var name = $('.form__name').val();
		var phone = $('.form__phone').val();
		var email = $('.form__email').val();
		var street = $('.form__street').val();
		var home = $('.form__home').val();
		var structure = $('.form__korp').val();
		var flat = $('.form__flat').val();
		var floor = $('.form__floor').val();
		var comment = $('.form__comment').val();
		if ($('.form__change').prop("checked")==true) {
			var payment = $('.form__change').val();
		}else if($('.form__card').prop("checked")==true){
			var payment = $('.form__card').val();
		}
		if ($('.form__call').prop("checked")==true) {
			var call = "Не перезванивать";
		}else{
			var call = "Перезвонить";
		}
        if(validName() == true && ValidPhone() == true  && validEmail() == true  && validStreet() == true && validHome() == true && validPayment() == true){
            $.ajax({
                type: "POST",
                url: "success.php",
                data: {name :name, phone :phone, email:email, street:street, home:home, structure:structure, flat:flat, floor:floor, comment:comment, call:call, payment:payment},
                success: function(msg){
                    console.log(msg);
                    console.log('ура');
                    $('#exampleModal1').arcticmodal();
                    $('.form__name').val('');
					$('.form__phone').val('');
					$('.form__email').val('');
					$('.form__street').val('');
					$('.form__home').val('');
					$('.form__korp').val('');
					$('.form__flat').val('');
					$('.form__floor').val('');
					$('.form__comment').val('');
                },
                error: function(response) { // Данные не отправлены
                    console.log(response);
                    console.log('ппц');
                }
            });
        }
    });

});
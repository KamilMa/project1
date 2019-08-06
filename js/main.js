/*============ Paralax ==========*/
$('.parallax-window').parallax();

/*============ Tabs ==========*/
$('.ui.pointing.secondary.menu .item').tab();

/*============ Title tabs changing ============*/
$('.tabs-title').html('<i class="icon lock"></i> Logowanie');
$('.ui.pointing.secondary.menu .login').click(function () {
    $('.tabs-title').html('<i class="icon lock"></i> Logowanie');
});
$('.ui.pointing.secondary.menu .register').click(function () {
    $('.tabs-title').html('<i class="icon registered"></i> Rejestracja');
});

/*======= Dropdown =======*/
$('select.dropdown')
    .dropdown();

/*======= Mobile menu =======*/
$('#mobile-menu').click(function () {
    $('.ui.sidebar.menu').sidebar('toggle');
});


/*=============== Content scripts ================*/

/*======= Get posts =======*/
function getPosts() {
    $.post('api/content.php', {
        type: 0
    }, function (data) {
        $('.posty').html(data);
    });
}

getPosts();

/*======== Add new post ========*/
$('#add-post').submit(function (e) {
    $.ajax({
        type: "POST",
        url: "api/content.php",
        data: $('#add-post').serialize(),
        success: function (data) {
            if (data == 0) {
                getPosts();
            }
        }
    });
    e.preventDefault();
});

/*======= Delete post =======*/
function deletePost(id) {
    $.post('api/content.php', {
        type: 2,
        id: id
    }, function () {
        getPosts();
    });
};

/*======= Load modal to edit post =======*/
function loadModal(id) {
    $.post('api/content.php', {
        type: 3,
        id: id
    }, function (data) {
        data = JSON.parse(data);
        $('#post-title').val(data.post_title);
        $('#post-date').val(data.post_date);
        // $('#post-author').val(data.post_date);
        $('#post-image').val('test');
        $('#post-content').val(data.post_content);
        $('#post-id').val(data.id);
        $('.ui.modal').modal('show');
    });
}

/*========= Submiy edited post =========*/
$('.ui.modal.editt').click(function () {
    
    $('#edit-post').submit(function (e) {
        $.ajax({
            type: "POST",
            url: "api/content.php",
            data: $('#edit-post').serialize(),
            success: function (res) {
                $('.ui.modal.editt').modal('hide');
                getPosts();
            }
        });
        e.preventDefault();
    });
});

/*========= Edit home, contact page =========*/
$('#form-save-content').submit(function (e) {
    $(this).addClass('loading');
    $.ajax({
        type: "POST",
        url: "api/content.php",
        data: $('#form-save-content').serialize(),
        success: function (res) {
            if (res == 0) {
                setTimeout(function () {
                    $(this).removeClass('loadng');
                }, 2500);
            }
        }
    });
    e.preventDefault();
});

/*============== Food menu =================*/

/*====== Get food_menu ======*/
function getFoodMenu(typeDish) {
    // Jeśli nie ma argumentu pobiera całe menu
    if (typeDish == false) {
        $.post('api/content.php', {
            type: 6,
            allDishes: true
        }, function (data) {
            data = JSON.parse(data);
            $('.startery').prepend(data.startery_content);
            $('.zupy').prepend(data.zupy_content);
            $('.glowne').prepend(data.glowne_content);
            $('.salatki').prepend(data.salatki_content);
            $('.makarony').prepend(data.makarony_content);
            $('.napoje').prepend(data.napoje_content);
        });
    // Jeśli jest argument, pobiera pojedyncze menu, nazwa menu w parametrze
    } else {
        $.post('api/content.php', {
            type: 6,
            allDishes: false,
            type_dish: typeDish
        }, function (data) {
            data = JSON.parse(data);
            // $('.startery').empty("");
            // $('.zupy').empty("");
            // $('.glowne').empty("");
            // $('.salatki').empty("");
            // $('.makaron').empty("");
            // $('.napoje').empty("");

            var ele2 = typeDish+"_content";
            
            $('.'+typeDish).empty("");
            $('.'+typeDish).prepend(data[ele2]);

            // alert(typeDish);

            // $('.'+typeDish).prepend(data.ele2);
            // $('.startery').prepend(data.starter_content);
            // $('.zupy').prepend(data.zupy_content);
            // $('.glowne').prepend(data.glowne_content);
            // $('.salatki').prepend(data.salatki_content);
            // $('.makaron').prepend(data.makarony_content);
            // $('.napoje').prepend(data.napoje_content);
        });
    }
}

var typeDish = false;
getFoodMenu(typeDish);
if($('#type-form').val() == 8 || $('#type-form').val() == 10) {
   var aaa = 10;
} else {


};

/*============ Edit food menu ============*/
$('.edit-menu').click(function (e) {
    e.preventDefault();
});
  /*===== Load modal ====*/
function editMenu(id) {
    $.post('api/content.php', {
        type: 7,
        id: id
    }, function (data) {
        data = JSON.parse(data);
        $('#name-dish').val(data.name);
        $('#price-dish').val(data.price);
        $('#description-dish').val(data.description);
        $('#id-dish').val(data.id);
        $('#type-dish').val(data.type_dish);
        $('#type-form').val(8);
        $('.ui.modal').modal('show');
    });
};



/*===== Delete food_menu item =====*/
$('.delete-menu').click(function (e) {
    e.preventDefault();
});
function deleteMenu(id, typeDish) {
    $.post('api/content.php', {
        type: 9,
        id: id
    }, function () {
        getFoodMenu(typeDish);
    });
}

/*===== Start new food_menu item modal and load typeDish ====*/
function addMenu(typeDish) {
    $('#type-dish').val(typeDish);
    $('#type-form').val(10);
    $('.ui.modal').modal('show');
}

/*===== Upload food_menu item =====*/
$('#form-edit-menu').submit(function (e) {
    $(this).addClass('loading');
    $.ajax({
        type: "POST",
        url: "api/content.php",
        data: $('#form-edit-menu').serialize(),
        success: function (res) {
            if (res == 0) {
            } else {
                var typeDishh = res;
                getFoodMenu(typeDishh);
                setTimeout(function () {
                    $('#form-edit-menu').removeClass('loading');
                }, 800);
                $('.ui.modal').modal('hide');
                // alert(res);
            }
        }
    });
    e.preventDefault();
});
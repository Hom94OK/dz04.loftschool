$("#login-submit").on("click", function (e) {
    e.preventDefault();
    $(this).closest("body").find("#f-order").css({
        'display': 'flex'
    });

    $.ajax({
        type: "POST",
        url: "http://home-work04/func/form-handler.php",
        data: $("#form-login").serialize() // serializes the form's elements.
        // success:
    }).done(function (data) {
        $("#f-order").find(".f-popup__content").html(data);
    });


    $(this).closest("body").find("#f-order .f-popup__close").on("click", function (e) {
        e.preventDefault();
        $(this).closest("#f-order").hide();
    });
    // $(this).closest("body").find("#popup-btn-warning").on("click", function (e) {
    //     e.preventDefault();
    //     $(this).closest("body").find("#f-order").hide();
    // })
});


$("#reg-submit").on("click", function (e) {
    e.preventDefault();
    $(this).closest("body").find("#f-order").css({
        'display': 'flex'
    });

    // $.post("form-handler.php", $("#form-reg").serialize()).done(function(data) {
    //     $("#f-order").find(".f-popup__content").html(data);
    // });
    var fd = new FormData;

    fd.append('login', $("#inputLogin").val());
    fd.append('password1', $("#inputPassword1").val());
    fd.append('password2', $("#inputPassword2").val());
    fd.append('name', $("#inputName").val());
    fd.append('age', $("#inputAge").val());
    fd.append('description', $("#inputDescription").val());
    fd.append('photo', $("#inputPhoto").prop('files')[0]);

    $.ajax({
        type: 'POST',
        url: 'http://home-work04/func/reg-handler.php',
        processData: false,
        contentType: false,
        data: fd,
        success: function (data) {
            $("#f-order").find(".f-popup__content").html(data);
        }
    });
    //     .done(function (data) {
    //     $("#f-order").find(".f-popup__content").html(data);
    // });


    $("#f-order").find(".f-popup__close").on("click", function (e) {
        e.preventDefault();
        $(this).closest("#f-order").hide();
    })
});
//
$(document).ready(function () {
    function action(container_class, action_content) {
        if (action_content !== "#profile") {
            return $(container_class).closest('body').find("a:contains(" + action_content + ")").parent().addClass('active');
        } else {
            return $(container_class).closest('body').find(action_content).parent().addClass('active');
        }
    }
    action('#index', 'Авторизация');
    action('#reg', 'Регистрация');
    action('#index', '#profile');
    action("#list", "Список пользователей");
    action("#list", "Список пользователей");
    action("#filelist", "Список файлов");
});


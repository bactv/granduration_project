/**
 * Created by bactv on 03/04/2017.
 */

/**
 * Tìm kiếm giáo viên theo các khóa học đã mở
 */
function search_teacher() {
    var class_id = $("#class_id").val();
    var subject_id = $("#subject_id").val();

    window.location = '/teacher/index.html?class_id=' + class_id + '&subject_id=' + subject_id;
}

/**
 * Tìm kiếm khóa học
 */
function search_course() {
    var class_id = $("#class_id").val();
    var subject_id = $("#subject_id").val();

    window.location = '/course/search-course.html?class_id=' + class_id + '&subject_id=' + subject_id;
}

/**
 * Tìm kiếm đề thi
 */
function search_list_quiz() {
    var class_id = $("#class_id").val();
    var subject_id = $("#subject_id").val();

    window.location = '/quiz/list-contest.html?class_id=' + class_id + '&subject_id=' + subject_id;
}

/**
 * Cập nhật thông tin tài khoản học sinh
 */
function update_account_student() {
    var password = $("#password").val() != undefined ? $("#password").val() : '';
    var new_password = $("#new_password").val() != undefined ? $("#new_password").val() : '';
    var re_new_password = $("#re_new_password").val() != undefined ? $("#re_new_password").val() : '';
    var full_name = $("#full_name").val() != undefined ? $("#full_name").val() : '';
    var phone = $("#phone").val() != undefined ? $("#phone").val() : '';
    var birthday = $("#birthday").val() != undefined ? $("#birthday").val() : '';
    var school_name = $("#school_name").val() != undefined ? $("#school_name").val() : '';

    // validate
    if (new_password != '') {
        if (re_new_password == '') {
            $("div.field-re_new_password").addClass('has-error');
            $("div.field-re_new_password > div.help-block").text('Vui lòng nhập lại mật khẩu');
            return false;
        } else if (re_new_password !== new_password) {
            $("div.field-re_new_password").addClass('has-error');
            $("div.field-re_new_password > div.help-block").text('Mật khẩu không khớp. Vui lòng nhập lại');
            return false;
        }
    }
    if (re_new_password != '') {
        if (new_password == '') {
            $("div.field-new_password").addClass('has-error');
            $("div.field-new_password > div.help-block").text('Vui lòng nhập lại mật khẩu');
            return false;
        } else if (re_new_password !== new_password) {
            $("div.field-re_new_password").addClass('has-error');
            $("div.field-re_new_password > div.help-block").text('Mật khẩu không khớp. Vui lòng nhập lại');
            return false;
        }
    }

    // validate birthday
    var pattern =/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/;
    if (birthday != '' && !pattern.test(birthday)) {
        $("div.field-birthday").addClass('has-error');
        $("div.field-birthday > div.help-block").text('Vui lòng nhập đúng định dạng dd//mm/yyyy');
        return false;
    }

    // validate fullname
    if (full_name == '') {
        $("div.field-full_name").addClass('has-error');
        $("div.field-full_name > div.help-block").text('Họ và tên không được để trống.');
        return false;
    }

    if (password == '') {
        $("div.field-password").addClass('has-error');
        $("div.field-password > div.help-block").text('Mật khẩu không được để trống.');
        return false;
    }

    var data = {'new_password' : new_password, 'full_name' : full_name, 'phone' : phone, 'birthday' : birthday, 'school_name' : school_name};

    $.ajax({
        method: 'POST',
        data: data,
        url: '/account/update-account.html',
        success: function (data) {
            var response = JSON.parse(data);
            alert(response.message);
            window.location.reload();
        }
    })
}
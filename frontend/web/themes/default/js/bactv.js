/**
 * Created by bactv on 03/04/2017.
 */

/**
 * Tìm kiếm khóa học
 */
function search_course() {
    var classses = $("#class").val();
    var subject = $("#subject").val();

    window.location = '/course/search-course.html?classes=' + classses + '&subject=' + subject;
}

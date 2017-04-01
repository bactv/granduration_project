<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/04/2017
 * Time: 11:59 CH
 */
use frontend\components\widgets\ListCourseWidget;
use common\components\AssetApp;
use kartik\icons\Icon;

$this->title = $this->params['title'] = 'Luyện thi ĐH, CĐ';
$this->params['breadcrumbs'][] = $this->title;

Icon::map($this, Icon::FA);
?>

<?php AssetApp::regJsFile('jquery.sticky-kit.min.js') ?>

<style>
    .course_detail {

    }
    .course_detail p#course_name {
        font-size: 20px;
        color: blueviolet;
    }
    .course_detail p#tch_name {

    }
    .course_detail .video-intro {
        position: relative;
        height: 420px;
        margin-bottom: 20px;
    }
    .course_detail .video-intro video {
        position: absolute;
        width: 100%;
        height: 420px;
    }
    .course_detail .course_description {
        margin-bottom: 10px;
        text-align: justify;
    }
    .course_detail .course_description p#title {

    }
    .course_detail .course_lecture {
        margin-bottom: 10px;
    }
    .course_detail .join_course {
        padding-left: 30px;
    }
    .course_detail .join_course .num_std {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .num_std i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    .course_detail .join_course .signed_date {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .signed_date i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    .course_detail .join_course .course_fee {
        margin-bottom: 15px;
        font-size: 16px;
    }
    .course_detail .join_course .course_fee i {
        font-size: 25px;
        margin-right: 10px;
        color: #1ba7bf;
    }
    span#spe {
        font-style: italic;
        color: #b57338;
    }
    .btn-join a {
        width: 100%;
        padding: 10px;
        font-size: 17px;
        text-transform: uppercase;
        font-weight: bold;
    }
</style>

<div class="row course_detail">
    <div class="row">
        <p id="course_name">LUYỆN THI THPT QUỐC GIA PEN-I: MÔN VẬT LÍ</p>
        <p id="tch_name">Giáo viên: <a href="#">Đỗ Ngọc Hà</a></p>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="video-intro">
                <video controls>
                    <source src="<?php echo AssetApp::getImageBaseUrl() . '/video/Tim-Mot-Nua-Co-Don-Hoa-Minzy.mp4' ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="course_description">
                <p id="title"><b>Mô tả khóa học</b></p>
                <div class="detail">
                    "Hạ gục" mọi dạng bài thường gặp trong đề thi THPT quốc gia là mục tiêu của PEN-I 2017, và điều này được PEN-I thể hiện rất rõ ra 2 thành phần liên quan mật thiết trong khóa học là Đề, bài giảng chữa đề và Phòng luyện.

                    15 đề thi nhận diện tất cả các dạng bài có thể gặp trong đề thi:
                    15 đề thi được xây dựng theo ma trận dạng bài của đề thi THPT quốc gia, đảm bảo phủ hết ít nhất 1 lượt các dạng bài thường gặp.
                    10 đề đầu được biên soạn tương đương với đề chính thức, các đề này sẽ cho học sinh thấy những góc cạnh dạng bài khi đi thi, từ đó làm quen và nắm được phương pháp giải của các dạng bài thường gặp.
                    5 đề tiếp theo được biên soạn khó hơn với đề chính thức (giảm số câu nhận biết, thông hiểu tăng các câu vận dụng, vận dụng cao) sẽ giúp học sinh thử thách và gia tăng cơ hội đạt điểm cao trong đề thi THPT quốc gia.
                    Bài giảng chữa đề vô cùng xúc tích, ngắn gọn, giáo viên sẽ khái quát thành dấu hiệu nhận biết, cũng như phương pháp giải tổng quát cho từng dạng bài. Bài giảng được chia thành nhiều clip nhỏ, mỗi clip sẽ chữa 1 câu hỏi trong đề thi, học sinh có thể lựa chọn câu hỏi muốn xem để có thời gian học hợp lí và hiệu quả.
                    20000+ câu rèn phương pháp và kĩ năng làm bài
                    Luyện theo chuyên đề hoặc luyện theo đề ở từng môn sẽ giúp Bạn kiểm tra lại lỗ hổng kiến thức hoặc rèn kĩ năng, thời gian làm đề như đề thật.
                    100% câu hỏi trong phòng luyện đều có hướng dẫn giải sau khi Bạn làm bài xong, từ đó Bạn có thể xem lại cách làm cũng như đối chiếu lại phương pháp, cách làm.
                    Hãy tham gia PEN-I để quá trình rèn luyện của Bạn thực sự hiệu quả nhé!
                    Thông tin chi tiết »
                    Các yêu cầu là gì?

                    - Học sinh làm đề trước khi xem video, chú trọng các câu hỏi bị sai và tìm nguyên nhân.
                    - Xem video giải đề, ghi lại những lưu ý cho từng dạng bài giáo viên đưa ra.
                    - Luyện tập với phòng luyện thường xuyên để theo dõi sự tiến bộ và khả năng 'sửa chữa' lỗi sai.
                    - Khi luyện đề, với các phần kiến thức chưa nắm vững học sinh cần phải củng cố lại để đảm bảo không bị vấp khi học các đề tiếp theo.
                    Sẽ được gì khi tham gia học?

                    - Thực hành những kiến thức đã học trong chương trình lớp 12
                    - Từng bước rèn luyện kĩ năng làm bài thi, phát hiện và dần khắc phục nhược điểm, từ đó đạt được điểm mục tiêu theo năng lực.
                    Đối tượng của khóa học là ai?

                    Học sinh dự thi THPT quốc gia có học lực khá - giỏi.
                </div>
            </div>
            <div class="course_lecture">
                <p id="title"><b>Đề cương khóa học</b></p>
            </div>
            <div class="course_teacher">
                <p id="title"><b>Giáo viên</b></p>
            </div>
        </div>
        <div class="col-md-4 left">
            <div class="join_course">
                <div class="signed_date"><?php echo Icon::show('calendar') ?> Mở đăng ký: <span id="spe">30/04/2015 - 5/07/2015</span></div>
                <div class="num_std"><?php echo Icon::show('users') ?> Đã đăng ký: <span id="spe">3000 học sinh</span></div>
                <div class="course_fee"><?php echo Icon::show('money') ?> Học phí: <span id="spe">Miễn phí</span></div>
                <div class="btn-join">
                    <a href="javascript:void(0)" class="btn btn-warning">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row course_relation">
    <?php echo ListCourseWidget::widget() ?>
</div>

<script>
    $(document).ready(function () {
        $(".left").stick_in_parent();
    });
</script>

<?php require_once APPROOT . '/src/views/include/header.php'; ?>
<?php
    use Models\SessionModel;
    SessionModel::lazyInit();
?>
<?php if (!SessionModel::isLoggedIn()): ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2 class="text-center">카우 미슐랭</h2>
                <h3 class="text-center">로그인</h3>

                <form action="<?= URLROOT; ?>/api/users/login" method="post">
                    <div class="form-group mb-3">
                        <label for="id">아이디: <sup>*</sup></label>
                        <input type="text" name="id" class="form-control form-control-lg" value="">
                        <span class="invalid-feedback id"></span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">비밀번호: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg">
                        <span class="invalid-feedback pw"></span>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" value="로그인" class="btn btn-success">
                        <div class="text-end mt-3">
                            아직 회원이 아니신가요? <a style="color: #00008b;" href="<?= URLROOT; ?>/register">회원가입</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= URLROOT; ?>/js/login.js"></script>

<?php else: ?>

<div class="container-fluid d-flex justify-content-center  vh-80">
    <div>
        <h1 class="mb-4">리뷰 쓰기</h1>
        <!-- 리뷰 작성 -->
        <form action="<?= URLROOT; ?>/api/reviews" method="post">
            <!-- Your form fields here -->
            <div class="form-group mb-3">
                <label for="title">제목: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg" value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group mb-3">
                <label for="content">내용: <sup>*</sup></label>
                <input type="text" name="content" class="form-control form-control-lg">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group mb-3">
                <label for="image_path">이미지: <sup>*</sup></label>
                <input type="file" name="image_path" class="form-control form-control-lg">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group mb-3">
                <label for="address">주소: <sup>*</sup></label>
                <input type="text" name="address" class="form-control form-control-lg">
                <span class="invalid-feedback"></span>
            </div>
            <div class="d-grid gap-2">
                <input type="submit" value="리뷰 작성" class="btn btn-success">
            </div>
        </form>
    </div>
</div>

<div class="container-fluid">
    <h1 class="mb-4">리뷰 목록</h1>
    <div class="row review-list">
        <?php $reviews = json_decode(file_get_contents(URLROOT . '/api/reviews')); ?>
        <?php foreach ($reviews as $review): ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <img src="<?= "https://source.unsplash.com/random/?" . $review->review_title //$review->review_image;?>"
                    class="card-img-top square-image" alt="Review Image">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="card-title">Title</p>
                            <p class="card-text">Content</p>
                            <p class="card-text">Address</p>
                            <p class="card-text">Author ID</p>
                            <p class="card-text">Created At</p>
                            <p class="card-text">Updated At</p>
                        </div>
                        <div class="col-6 text-end">
                            <p class="card-title">
                                <?= $review->review_title; ?>
                            </p>
                            <p class="card-text">
                                <?= $review->review_content; ?>
                            </p>
                            <p class="card-text">
                                <?= $review->review_address; ?>
                            </p>
                            <p class="card-text">
                                <?= $review->author_id; ?>
                            </p>
                            <p class="card-text">
                                <?= $review->created_at; ?>
                            </p>
                            <p class="card-text">
                                <?= $review->updated_at; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<style>
.square-image {
    height: 300px;
    /* Adjust the height as per your design */
    object-fit: cover;
}
</style>
<?php endif; ?>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>
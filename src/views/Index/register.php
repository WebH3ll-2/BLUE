<?php require_once APPROOT . '/src/views/include/header.php'; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-light mt-5">
                    <h2 class="text-center">카우 미슐랭</h2>
                    <h3 class="text-center">회원가입</h3>
                
                    <form action="<?= URLROOT; ?>/api/users/register" method="post">
                        <div class="form-group mb-3">
                            <label for="profile">프로필 이미지: <sup>*</sup></label>
                            <input type="file" name="profile" class="form-control form-control-lg <?php echo (!empty($data['profile_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['profile']; ?>">
                            <span class="invalid-feedback"><?= $data['profile_err']; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="id">아이디: <sup>*</sup></label>
                            <input type="text" name="id" class="form-control form-control-lg <?php echo (!empty($data['id_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['id']; ?>">
                            <span class="invalid-feedback"><?= $data['id_err']; ?></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">비밀번호: <sup>*</sup></label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['password']; ?>">
                            <span class="invalid-feedback"><?= $data['password_err']; ?></span>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="submit" value="회원가입" class="btn btn-success btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>
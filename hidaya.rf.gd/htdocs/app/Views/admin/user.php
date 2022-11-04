<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="card col-md-4 col-sm-12">
                    <div class="text-center">
                        <div class="card-body">
                            <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['name'] ?>&background=random&length=1&font-size=0.7" class="rounded-circle  height-150" alt=" avatar">
                        </div>
                        <div class="card-body">
                            <h1><?= sprintf('%04s', $user['malaf']) ?></h1>
                            <h4><b><?= $user['name'] ?></b></h4>
                            <p><?= $user['iqama'] ?></p>
                            <p><?= $user['jamia'] ?> - <?= $user['nationality'] ?></p>
                            <p><a href="mailto:<?= $user['email'] ?>" class="badge badge-glow badge-info badge-pill"><?= $user['email'] ?></a></p>
                            <p>
                                <div class="btn-group">
                                    <a href="tel:+966<?= $user['phone'] ?>" class="btn btn-sm round btn-secondary"><i class="la la-mobile"></i></a><a href="https://wa.me/966<?= $user['phone'] ?>" target="_blank" class="btn btn-success btn-sm round"><i class="la la-whatsapp"></i></a>
                                </div>
                            </p>
                        </div>
                        <div class="text-center">
                            <div class="btn-group mb-1" role="group" aria-label="Basic example">
                                <a href="#" class="btn round btn-warning"><i class="la la-edit"></i></a>
                                <a href="<?= base_url('admin/delete/' . $user['id']) ?>" id="delete" class="btn round btn-danger"> <i class="la la-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="recent-transactions" class="col-md-8 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><b><?= lang('app.tanfidh') ?> - <?= $user['name'] ?></b>
                                <?php if ($_SESSION['role'] == 'admin' && $user['role'] == 'user') : ?>
                                    <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('admin/add-mushrif/'.$user['id']) ?>"><?= lang('app.addMushrif') ?></a>
                                <?php endif ?>
                            </h3>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0"><?= lang('app.umrano') ?></th>
                                            <th class="border-top-0"><?= lang('app.donefor') ?></th>
                                            <th class="border-top-0"><?= lang('app.status') ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">INV-001001</a></td>
                                            <td><span>Elizabeth W.</span></td>
                                            <td><button type="button" class="btn btn-sm btn-outline-success round"><?= lang('app.done') ?></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection() ?>
<?= $this->section('scripts') ?>
<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        url = $(this).attr('href');
        Swal.fire({
            // title: <?= lang('app.graduated?') ?>,
            title: 'أمتخرج هو؟',
            text: "بعد الحذف خلاص فهو محذوف!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'نعم!',
            cancelButtonText: 'لا!',
            confirmButtonClass: 'btn btn-warning',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
        }).then(function(result) {
            if (result.value) {
                window.location.href = url;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    title: 'تمام',
                    text: 'لا تحذف أي واحد إلا متخرجون :)',
                    type: 'error',
                    showConfirmButton: false,
                })
            }
        })
    });
</script>
<?= $this->endsection() ?>
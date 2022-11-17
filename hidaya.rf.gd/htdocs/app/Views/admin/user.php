<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="card col-md-4">
                    <div class="text-center">
                        <div class="card-body">
                            <img src="https://ui-avatars.com/api/?name=<?= sprintf('%04s', $user['malaf']) ?>&background=random&length=4" class="rounded-circle  height-150" alt=" avatar">
                        </div>
                        <div class="card-body">
                            <!-- <h1><?= sprintf('%04s', $user['malaf']) ?></h1> -->
                            <h4><b><?= $user['name'] ?></b></h4>
                            <p><?= $user['iqama'] ?></p>
                            <p><?= $user['country_arName'] ?></p>
                            <p><?= $user['uni_name'] ?> </p>
                            <p><a href="mailto:<?= $user['email'] ?>" class="badge badge-info badge-pill"><?= $user['email'] ?></a></p>
                            <p>
                                <div class="btn-group">
                                    <a href="tel:+966<?= $user['phone'] ?>" class="btn btn-sm round btn-secondary"><i class="la la-mobile"></i> 966<?= $user['phone'] ?></a><a href="https://wa.me/966<?= $user['phone'] ?>" target="_blank" class="btn btn-success btn-sm round"> 966<?= $user['phone'] ?> <i class="la la-whatsapp"></i></a>
                                </div>
                            </p>
                        </div>
                        <a href="<?= base_url('admin/delete/' . $user['id']) ?>" id="delete" class="btn round btn-danger btn-block p-1 mb-1"> <i class="la la-trash"></i> <?= lang('app.delete') ?></a>
                    </div>
                </div>
                
                <div id="recent-transactions" class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3><b><?= lang('app.tanfidh') ?> - <?= $user['name'] ?></b>
                                <?php if (session('role') == 'admin' && $user['role'] == 'user') : ?>
                                    <!-- <a class="btn btn-outline-success box-shadow-2 round pull-right" href="<?= base_url('admin/add-mushrif/'.$user['id']) ?>"><?= lang('app.addMushrif') ?></a> -->
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
                                        <?php foreach ($mashruu as $key => $dt) : ?>
                                        <tr>
                                            <td><a href="#"><?= $key+1 ?></a></td>
                                            <td><span><?= $dt['ism'] ?> - <span class="badge badge-info badge-pill"><?= $dt['sabab'] ?></span></span></td>
                                            <td>
                                                <?php if ($dt['status'] == 0) : ?>
                                                <button type="button" class="btn btn-sm btn-outline-danger round"><?= lang('app.notdone') ?></button>
                                                <?php elseif ($dt['status'] == 1) : ?>
                                                <button type="button" class="btn btn-sm btn-outline-success round"><?= lang('app.done') ?></button>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if ($img > 0) :?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgIqama') ?></h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIqama'] == null ? 'demo/iqama.jpg' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgIqama']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['iqama'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgPass') ?>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgPass'] == null ? 'demo/passp.jpg' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgPass']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['passport'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title"><?= lang('app.imgStu') ?></h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgStu'] == null ? 'demo/stu.jpg' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgStu']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['bitaqa'] ?></b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body"><h4 class="card-title">
                                        <?= lang('app.imgIban') ?></h4>
                                    </div>
                                    <img class="img-fluid" src="<?= base_url('app-assets/images/' . ($img['imgIban'] == null ? 'demo/iban.png' : 'malaf/'.($user['malaf']=='----'?'new':$user['malaf']).'/') . $img['imgIban']) ?>" alt="img">
                                </div>
                                <div style="text-align: center;" class="my-1">
                                    <span><b><?= $user['iban'] ?></b></span>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif ?>
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
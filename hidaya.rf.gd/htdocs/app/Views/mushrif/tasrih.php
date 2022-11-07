<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <?php foreach ($tasrih as $dt) : ?>
                            <?php if ($dt['tasrih']!=null) : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-content">
                                            <div style="text-align: center;">
                                                <h3 class="m-1"><?= $dt['name'] ?></h3>
                                            </div>
                                            <img class="card-img-top img-fluid px-1" src="<?= base_url('app-assets/images/'.($dt['tasrih']==null?'demo/no-image.png':'tasrih/'.$loc.'/'.$dt['tasrih'])) ?>" alt="img">
                                            <div class="card-body" style="text-align: center;">
                                                <h3 class="mb-1"><b><?= date('d/m/Y', strtotime($dt['tnfdhDate'])) ?></b></h3>
                                                <div class="text-center">
                                                    <div class="btn-group mb-1 btn-block" role="group" aria-label="Basic example">
                                                        <a href="<?= base_url('mushrif/send-tasrih/'.$dt['tnfdhId']) ?>" class="btn btn-outline-success btn-glow round"><?= lang('app.send') ?></a>
                                                        <a href="<?= base_url('mushrif/tasrih-delete/'.$dt['tnfdhId']) ?>" id="delete" class="btn btn-outline-danger btn-glow round "><?= lang('app.delete') ?></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </section>
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
            title: 'فيه ملاحضة؟',
            text: "يحذف التصريح من الموقع تماما لا تنسى أن تنبه الطالب أن يجدد التصريح!",
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
                    text: 'ما حذفت شيء! :)',
                    type: 'error',
                    showConfirmButton: false,
                })
            }
        })
    });
</script>
<?= $this->endsection() ?>
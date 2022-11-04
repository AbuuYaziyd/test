<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2>
                                        <?= $title ?>
                                    </h2>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <?= form_open('tanfidh/create') ?>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="addNew">
                                                        <div class="row m-1">
                                                            <div class="col-md-5">
                                                                <label for=""><b><?= lang('app.tanfidhDate') ?></b></label>
                                                                <input type="date" name="tasrih_date[]" class="form-control" min="<?= date('Y-m-d') ?>">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for=""><b><?= lang('app.tanfidhEndDate') ?></b></label>
                                                                <input type="date" name="tanfidh_date[]" class="form-control" min="<?= date('Y-m-d') ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <span class="btn btn-outline-success addEvent round mt-2"><?= lang('app.add') ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <button type="submit" class="btn btn-block btn-primary btn-lg round mt-2"><?= lang('app.send') ?></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div style="visibility: hidden;">
    <div class="itemAdd" id="itemAdd">
        <div class="itemDelete" id="itemDelete">
            <div class="form-row">
                <div class="col-md-5">
                    <label for=""><b><?= lang('app.tanfidhDate') ?></b></label>
                    <input type="date" name="tasrih_date[]" class="form-control" min="<?= date('Y-m-d') ?>">
                </div>
                <div class="col-md-5">
                    <label for=""><b><?= lang('app.tanfidhEndDate') ?></b></label>
                    <input type="date" name="tanfidh_date[]" class="form-control" min="<?= date('Y-m-d') ?>">
                    </div>
                <div class="col-md-2">
                    <span class="btn btn-outline-danger removeEvent round mt-2"><?= lang('app.delete') ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addEvent", function() {
            var newItem = $('#itemAdd').html();
            $(this).closest(".addNew").append(newItem);
            counter++;
        });
        $(document).on("click", ".removeEvent", function(event) {
            $(this).closest(".itemDelete").remove();
            counter--;
        });
    });
</script>
<?= $this->endsection() ?>
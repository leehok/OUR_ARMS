

<?php $__env->startSection('content'); ?>
    <h3 class="page-title"><?php echo app('translator')->get('quickadmin.files.title'); ?></h3>
    <?php echo Form::open(['method' => 'POST', 'route' => ['admin.files.store'], 'files' => true,]); ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <?php echo app('translator')->get('quickadmin.qa_create'); ?>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('folder_id', trans('quickadmin.files.fields.folder').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::select('folder_id', $folders, request()->has('folder_id') ? request()->has('folder_id') : old('folder_id'), ['class' => 'form-control select2', 'required' => '']); ?>

                    <p class="help-block"></p>
                    <?php if($errors->has('folder_id')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('folder_id')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('description', 'Description', ['class' => 'control-label']); ?>

                    <textarea class="form-control" name="description"><?php echo e(old('description')); ?></textarea>
                    <p class="help-block"></p>
                    <?php if($errors->has('description')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('description')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <?php echo Form::label('filename', trans('quickadmin.files.fields.filename').'*', ['class' => 'control-label']); ?>

                    <?php echo Form::file('filename[]', [
                        'multiple',
                        'class' => 'form-control file-upload',
                        'data-url' => route('admin.media.upload'),
                        'data-bucket' => 'filename',
                        'data-filekey' => 'filename',
                        'id' => 'my_id'
                        ]); ?>

                    <p class="help-block"></p>
                    <div class="photo-block">
                        <div class="progress-bar form-group">&nbsp;</div>
                        <div class="files-list"></div>
                    </div>
                    <?php if($errors->has('filename')): ?>
                        <p class="help-block">
                            <?php echo e($errors->first('filename')); ?>

                        </p>
                    <?php endif; ?>
                </div>
            </div>
                        
        </div>
    </div>

    <?php echo Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger', 'id' => 'submitBtn']); ?>

    <?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('javascript'); ?>

    <script src="<?php echo e(asset('quickadmin/plugins/fileUpload/js/jquery.iframe-transport.js')); ?>"></script>
    <script src="<?php echo e(asset('quickadmin/plugins/fileUpload/js/jquery.fileupload.js')); ?>"></script>
    <script>
        $(function () {
            var exfiles = '<?php echo $userFilesCount; ?>';
            var existingFiles = Number(exfiles);


            $('input#my_id').change(function () {
                var uploadingFiles = $(this)[0].files;
                var totalCount = uploadingFiles.length + existingFiles;

                var Id = '<?php echo $roleId; ?>';
                var roleId = Number(Id);
                console.log(roleId);
console.log(totalCount);
                if (totalCount > 5 && roleId == 2) {
                    alert("your upload limit is 5 files." +
                            "Upgrade to Premium and upload as many files you want");
                    $('.file-upload').each(function () {
                        var $this = $(this);

                        $(this).fileupload({
                            dataType: 'json',
                            formData: {
                                model_name: 'File',
                                bucket: $this.data('bucket'),
                                file_key: $this.data('filekey'),
                                _token: '<?php echo e(csrf_token()); ?>'

                            },

                            add: function (e, data) {
                                data.abort();
                            }
                        })
                    });
                    document.getElementById("submitBtn").classList.add('disabled');
                }
            });

            $('.file-upload').each(function () {
                var $this = $(this);
                var $parent = $(this).parent();

                $(this).fileupload({
                    dataType: 'json',
                    formData: {
                        model_name: 'File',
                        bucket: $this.data('bucket'),
                        file_key: $this.data('filekey'),
                        _token: '<?php echo e(csrf_token()); ?>'

                    },

                    add: function (e, data) {
                        data.submit();
                    },
                    done: function (e, data) {
                        $.each(data.result.files, function (index, file) {
                            var $line = $($('<p/>', {class: "form-group"}).html(file.name + ' (' + file.size + ' bytes)').appendTo($parent.find('.files-list')));
                            $line.append('<a href="#" class="btn btn-xs btn-danger remove-file">Remove</a>');
                            $line.append('<input type="hidden" name="' + $this.data('bucket') + '_id[]" value="' + file.id + '"/>');
                            if ($parent.find('.' + $this.data('bucket') + '-ids').val() != '') {
                                $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + ',');
                            }
                            $parent.find('.' + $this.data('bucket') + '-ids').val($parent.find('.' + $this.data('bucket') + '-ids').val() + file.id);
                        });
                        $parent.find('.progress-bar').hide().css(
                                'width',
                                '0%'
                        );
                    }

                }).on('fileuploadprogressall', function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $parent.find('.progress-bar').show().css(
                            'width',
                            progress + '%'
                    );
                });

            });
            $(document).on('click', '.remove-file', function () {
                var $parent = $(this).parent();
                $parent.remove();
                return false;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\dev-ams\resources\views/admin/files/create.blade.php ENDPATH**/ ?>